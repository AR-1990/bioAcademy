<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\AddModule;
use App\Models\ModuleData;
use App\Models\AdminAnswer;
use Illuminate\Http\Request;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    protected const LESSON_COMPLETION_THRESHOLD = 90;

    public function show_module($lessonId)
    {
        $lesson = AddModule::find($lessonId);
        $adminChats = Chat::with('user')->latest()->get();
        $questions = ModuleData::with(['user','adminAnswer', 'replies.user'])
                ->where('lesson_id', $lesson->id)
                ->whereNull('parent_comment_id')
                ->get();
        return view('admin.lesson', compact('lesson', 'adminChats','questions'));
    }

    public function showLesson($lessonId)
    {
        $lesson = AddModule::findOrFail($lessonId);
        // $chats = Chat::with('user')->latest()->get();
        // $studentQuestions = ModuleData::with(['user','replies', 'adminAnswer', 'replies.user'])->where('lesson_id', $lessonId)->whereNull('parent_comment_id')->get();
        // $adminReplies = AdminAnswer::whereIn('comment_id', $studentQuestions->pluck('id'))->get();
        // return view('student.lesson', compact('lesson', 'studentQuestions', 'adminReplies','chats'));
        return view('student.lesson', compact('lesson'));
    }

    public function lessonPlayed(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication required.',
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'lesson_id' => 'required|integer|exists:add_modules,id',
            'event_type' => 'nullable|in:play,progress,pause,ended,pagehide,seeking,seeked',
            'session_key' => 'nullable|string|max:120',
            'current_time' => 'nullable|numeric|min:0',
            'duration' => 'nullable|numeric|min:0',
            'watch_delta' => 'nullable|numeric|min:0',
            'watched_ranges' => 'nullable|string',
            'from_time' => 'nullable|numeric|min:0',
            'seek_direction' => 'nullable|in:forward,backward',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $eventType = $request->input('event_type', 'progress');
        $lessonId = (int) $request->input('lesson_id');
        $currentTime = $this->normalizeSeconds($request->input('current_time', 0));
        $duration = $this->normalizeSeconds($request->input('duration', 0), true);
        $watchDelta = $this->normalizeSeconds($request->input('watch_delta', 0), true);
        $fromTime = $this->normalizeSeconds($request->input('from_time', 0), true);
        $sessionKey = $request->input('session_key');
        $seekDirection = $request->input('seek_direction');
        $incomingRanges = $this->decodeRanges($request->input('watched_ranges', '[]'), $duration);
        $now = now();

        $summary = DB::transaction(function () use (
            $user,
            $lessonId,
            $eventType,
            $currentTime,
            $duration,
            $watchDelta,
            $fromTime,
            $sessionKey,
            $seekDirection,
            $incomingRanges,
            $now
        ) {
            $existingSummary = DB::table('lesson_watch_progress')
                ->where('user_id', $user->id)
                ->where('lesson_id', $lessonId)
                ->first();

            $storedRanges = $existingSummary?->watched_ranges
                ? $this->decodeRanges($existingSummary->watched_ranges, $duration)
                : [];

            $mergedRanges = $this->mergeRanges(array_merge($storedRanges, $incomingRanges), $duration);
            $uniqueWatchSeconds = $this->sumRanges($mergedRanges);
            $completionPercent = $duration > 0
                ? round(min(100, ($uniqueWatchSeconds / $duration) * 100), 2)
                : 0;

            $summaryPayload = [
                'last_position_seconds' => $currentTime,
                'max_position_seconds' => max((float) ($existingSummary->max_position_seconds ?? 0), $currentTime),
                'total_watch_seconds' => round((float) ($existingSummary->total_watch_seconds ?? 0) + $watchDelta, 2),
                'unique_watch_seconds' => round($uniqueWatchSeconds, 2),
                'video_duration_seconds' => $duration > 0 ? $duration : ($existingSummary->video_duration_seconds ?? null),
                'watched_ranges' => json_encode($mergedRanges),
                'completion_percent' => $completionPercent,
                'updated_at' => $now,
            ];

            if (!$existingSummary) {
                $summaryPayload['user_id'] = $user->id;
                $summaryPayload['lesson_id'] = $lessonId;
                $summaryPayload['first_started_at'] = $now;
                $summaryPayload['created_at'] = $now;
            }

            if ($eventType === 'play') {
                $summaryPayload['last_started_at'] = $now;
                $summaryPayload['first_started_at'] = $existingSummary->first_started_at ?? $now;
                $summaryPayload['play_count'] = (int) ($existingSummary->play_count ?? 0) + 1;
            }

            if ($eventType === 'pause') {
                $summaryPayload['pause_count'] = (int) ($existingSummary->pause_count ?? 0) + 1;
            }

            if ($this->isTerminalEvent($eventType)) {
                $summaryPayload['last_ended_at'] = $now;
            }

            if (
                $completionPercent >= self::LESSON_COMPLETION_THRESHOLD &&
                empty($existingSummary?->completed_at)
            ) {
                $summaryPayload['completed_at'] = $now;
            }

            DB::table('lesson_watch_progress')->updateOrInsert(
                [
                    'user_id' => $user->id,
                    'lesson_id' => $lessonId,
                ],
                $summaryPayload
            );

            if (!empty($sessionKey)) {
                $this->upsertSession(
                    $sessionKey,
                    $user->id,
                    $lessonId,
                    $eventType,
                    $currentTime,
                    $duration,
                    $watchDelta,
                    $completionPercent,
                    $now
                );
            }

            $this->logWatchEvent(
                $user->id,
                $lessonId,
                $sessionKey,
                $eventType,
                $fromTime,
                $currentTime,
                $watchDelta,
                $duration,
                $seekDirection,
                $now
            );

            $freshSummary = DB::table('lesson_watch_progress')
                ->where('user_id', $user->id)
                ->where('lesson_id', $lessonId)
                ->first();

            $this->syncLessonCompletion($user->id, $lessonId, $freshSummary);

            return $freshSummary;
        });

        return response()->json([
            'success' => true,
            'data' => [
                'completion_percent' => (float) ($summary->completion_percent ?? 0),
                'total_watch_seconds' => (float) ($summary->total_watch_seconds ?? 0),
                'unique_watch_seconds' => (float) ($summary->unique_watch_seconds ?? 0),
                'last_position_seconds' => (float) ($summary->last_position_seconds ?? 0),
                'completed_at' => $summary->completed_at,
            ],
        ]);
    }

    protected function upsertSession(
        string $sessionKey,
        int $userId,
        int $lessonId,
        string $eventType,
        float $currentTime,
        float $duration,
        float $watchDelta,
        float $completionPercent,
        $now
    ): void {
        $existingSession = DB::table('lesson_watch_sessions')
            ->where('session_key', $sessionKey)
            ->first();

        $sessionPayload = [
            'user_id' => $userId,
            'lesson_id' => $lessonId,
            'last_position_seconds' => $currentTime,
            'max_position_seconds' => max((float) ($existingSession->max_position_seconds ?? 0), $currentTime),
            'watch_seconds' => round((float) ($existingSession->watch_seconds ?? 0) + $watchDelta, 2),
            'video_duration_seconds' => $duration > 0 ? $duration : ($existingSession->video_duration_seconds ?? null),
            'completion_percent' => $completionPercent,
            'updated_at' => $now,
        ];

        if (!$existingSession) {
            $sessionPayload['session_key'] = $sessionKey;
            $sessionPayload['started_at'] = $now;
            $sessionPayload['started_position_seconds'] = $currentTime;
            $sessionPayload['created_at'] = $now;
        }

        if ($this->isTerminalEvent($eventType)) {
            $sessionPayload['ended_at'] = $now;
            $sessionPayload['end_reason'] = $eventType;
        }

        DB::table('lesson_watch_sessions')->updateOrInsert(
            ['session_key' => $sessionKey],
            $sessionPayload
        );
    }

    protected function syncLessonCompletion(int $userId, int $lessonId, $summary): void
    {
        if (!$summary || (float) ($summary->completion_percent ?? 0) < self::LESSON_COMPLETION_THRESHOLD) {
            return;
        }

        DB::table('lesson_completion')->updateOrInsert(
            [
                'user_id' => $userId,
                'lesson_id' => $lessonId,
            ],
            [
                'created_at' => $summary->completed_at ?? now(),
                'updated_at' => now(),
            ]
        );
    }

    protected function isTerminalEvent(string $eventType): bool
    {
        return in_array($eventType, ['pause', 'ended', 'pagehide'], true);
    }

    protected function logWatchEvent(
        int $userId,
        int $lessonId,
        ?string $sessionKey,
        string $eventType,
        float $fromTime,
        float $toTime,
        float $watchDelta,
        float $duration,
        ?string $seekDirection,
        $now
    ): void {
        if (in_array($eventType, ['progress', 'seeking'], true)) {
            return;
        }

        DB::table('lesson_watch_events')->insert([
            'session_key' => $sessionKey,
            'user_id' => $userId,
            'lesson_id' => $lessonId,
            'event_type' => $eventType,
            'event_at' => $now,
            'from_position_seconds' => $fromTime,
            'to_position_seconds' => $toTime,
            'watch_delta_seconds' => $watchDelta,
            'video_duration_seconds' => $duration > 0 ? $duration : null,
            'meta_json' => $seekDirection ? json_encode(['seek_direction' => $seekDirection]) : null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    protected function normalizeSeconds($value, bool $allowZero = false): float
    {
        $seconds = round(max(0, (float) $value), 2);

        if (!$allowZero && $seconds < 0) {
            return 0;
        }

        return $seconds;
    }

    protected function decodeRanges(?string $rangesJson, float $duration = 0): array
    {
        if (empty($rangesJson)) {
            return [];
        }

        $decoded = json_decode($rangesJson, true);
        if (!is_array($decoded)) {
            return [];
        }

        $ranges = [];
        foreach ($decoded as $range) {
            if (!is_array($range) || count($range) < 2) {
                continue;
            }

            $start = max(0, (float) $range[0]);
            $end = max(0, (float) $range[1]);

            if ($duration > 0) {
                $start = min($start, $duration);
                $end = min($end, $duration);
            }

            if ($end <= $start) {
                continue;
            }

            $ranges[] = [round($start, 2), round($end, 2)];
        }

        return $this->mergeRanges($ranges, $duration);
    }

    protected function mergeRanges(array $ranges, float $duration = 0): array
    {
        if (empty($ranges)) {
            return [];
        }

        usort($ranges, fn ($a, $b) => $a[0] <=> $b[0]);

        $merged = [];
        foreach ($ranges as $range) {
            $start = max(0, (float) $range[0]);
            $end = max(0, (float) $range[1]);

            if ($duration > 0) {
                $start = min($start, $duration);
                $end = min($end, $duration);
            }

            if ($end <= $start) {
                continue;
            }

            if (empty($merged) || $start > $merged[count($merged) - 1][1]) {
                $merged[] = [round($start, 2), round($end, 2)];
                continue;
            }

            $merged[count($merged) - 1][1] = round(max($merged[count($merged) - 1][1], $end), 2);
        }

        return $merged;
    }

    protected function sumRanges(array $ranges): float
    {
        $total = 0;

        foreach ($ranges as $range) {
            $total += max(0, (float) $range[1] - (float) $range[0]);
        }

        return round($total, 2);
    }

 // AdminController.php

// AdminController.php

public function adminReply(Request $request)
{
    $user = auth()->user();
    $message = $request->input('message');
    $parentChatId = $request->input('parent_chat_id');

    // Validate input if needed

    $replyChat = $user->chats()->create([
        'message' => $message,
        'parent_id' => $parentChatId,
        'is_admin' => true,
    ]);

    broadcast(new \App\Events\NewChatMessage($replyChat));

    return redirect()->back();
}


public function studentReply(Request $request)
{
    $user = auth()->user();
    $message = $request->input('message');
    $parentChatId = $request->input('parent_chat_id');

    $replyChat = $user->chats()->create([
        'message' => $message,
        'parent_chat_id' => $parentChatId,
    ]);

    broadcast(new \App\Events\NewChatMessage($replyChat));


    
      return redirect()->back()->with('success', 'Reply posted successfully');
}

}
