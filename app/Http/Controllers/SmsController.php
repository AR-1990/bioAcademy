<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SmsMessage;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\InboundSmsNotification;
class SmsController extends Controller
{
    protected $sms;

    public function __construct(SmsService $sms)
    {
        $this->sms = $sms;
    }

    public function index(Request $request)
    {
        $inquiries = User::where('role', 2)->where('is_enrolled', 0)->orderBy('id', 'desc')->get(['id','first_name','last_name','phone_number']);
        $students = User::where('role', 2)->where('is_enrolled', 1)->orderBy('id', 'desc')->get(['id','first_name','last_name','phone_number']);

        $inbox = SmsMessage::with('user')->where('direction','inbound')->latest()->limit(50)->get();
        $outbox = SmsMessage::with('user')->where('direction','outbound')->latest()->limit(50)->get();
        $mass = SmsMessage::with('user')->where('direction','outbound')->whereIn('category',['inquiries','students'])->latest()->limit(50)->get();

        return view('admin.mass-text', compact('inquiries','students','inbox','outbox','mass'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'phone' => 'nullable|string|max:30',
            'use_individual' => 'nullable|boolean',
            'audiences' => 'nullable|array',
            'audiences.*' => 'in:inquiries,students',
            'statuses' => 'nullable|array',
            'statuses.*' => 'in:Not contacted,Contact Attempt 1,Contact Attempt 2,Contact Attempt 3,Followup-Required,Not-Interested',
        ]);

        $body = $request->input('message');
        $audiences = (array) $request->input('audiences', []);
        $statuses = (array) $request->input('statuses', []);
        $useIndividual = (bool) $request->input('use_individual', false);

        $recipients = collect();

        if ($useIndividual) {
            $number = trim((string) $request->input('phone'));
            if (!empty($number)) {
                $recipients->push(['id' => null, 'phone_number' => $number, 'category' => 'individual']);
            }
        }

        if (in_array('inquiries', $audiences, true)) {
            $q = User::where('role', 2)->where('is_enrolled', 0);
            if (!empty($statuses)) { $q->whereIn('status', $statuses); }
            $recipients = $recipients->merge(
                $q->pluck('phone_number','id')->map(fn($phone, $id) => ['id' => $id, 'phone_number' => $phone, 'category' => 'inquiries'])
            );
        }
        if (in_array('students', $audiences, true)) {
            $q = User::where('role', 2)->where('is_enrolled', 1);
            if (!empty($statuses)) { $q->whereIn('status', $statuses); }
            $recipients = $recipients->merge(
                $q->pluck('phone_number','id')->map(fn($phone, $id) => ['id' => $id, 'phone_number' => $phone, 'category' => 'students'])
            );
        }

        // Backward compatibility: allow single category usage
        if (empty($audiences) && !$useIndividual && $request->has('category')) {
            $category = $request->input('category');
            if ($category === 'individual') {
                $number = trim((string) $request->input('phone'));
                if (!empty($number)) {
                    $recipients->push(['id' => null, 'phone_number' => $number, 'category' => 'individual']);
                }
            } elseif ($category === 'inquiries' || $category === 'students') {
                $q = User::where('role', 2)->where('is_enrolled', $category === 'inquiries' ? 0 : 1);
                if (!empty($statuses)) { $q->whereIn('status', $statuses); }
                $recipients = $recipients->merge(
                    $q->pluck('phone_number','id')->map(fn($phone, $id) => ['id' => $id, 'phone_number' => $phone, 'category' => $category])
                );
            }
        }

        // Deduplicate by last 10 digits
        $unique = [];
        $finalRecipients = [];
        foreach ($recipients as $rec) {
            $normalized = $this->sms->normalizePhoneNumber($rec['phone_number']) ?? $rec['phone_number'];
            $digits = preg_replace('/\D+/', '', (string) $normalized);
            $key = substr($digits, -10) ?: $digits;
            if (!$key) { continue; }
            if (!isset($unique[$key])) {
                $unique[$key] = true;
                $finalRecipients[] = $rec;
            }
        }

        $results = [];
        foreach ($finalRecipients as $rec) {
            $to = $rec['phone_number'];
            if (empty($to)) { continue; }
            $sendResult = $this->sms->sendSms($to, $body);

            SmsMessage::create([
                'user_id' => $rec['id'],
                'recipient_number' => $sendResult['normalized_phone'] ?? $to,
                'sender_number' => config('services.twilio.phone_number'),
                'direction' => 'outbound',
                'category' => $rec['category'] ?? null,
                'twilio_message_sid' => $sendResult['message_sid'] ?? null,
                'status' => $sendResult['status'] ?? ($sendResult['success'] ? 'sent' : 'failed'),
                'body' => $body,
                'error' => $sendResult['success'] ? null : ($sendResult['error'] ?? 'Unknown error'),
            ]);

            $results[] = [
                'user_id' => $rec['id'],
                'to' => $to,
                'success' => $sendResult['success'] ?? false,
                'sid' => $sendResult['message_sid'] ?? null,
                'status' => $sendResult['status'] ?? null,
            ];
        }

        return back()->with('status', 'Messages processed: '.count($results));
    }

    public function inbound(Request $request)
    {
        $from = $request->input('From');
        $to = $request->input('To');
        $body = $request->input('Body');
        $sid = $request->input('MessageSid');

        try {
            $user = $this->findUserByPhoneFlexible($from);
            if (!$user) {
                $normalizedFrom = $this->sms->normalizePhoneNumber($from);
                if ($normalizedFrom) {
                    $user = $this->findUserByPhoneFlexible($normalizedFrom);
                }
            }
            SmsMessage::create([
                'user_id' => $user?->id,
                'recipient_number' => $to,
                'sender_number' => $from,
                'direction' => 'inbound',
                'category' => null,
                'twilio_message_sid' => $sid,
                'status' => 'received',
                'body' => $body ?? '',
            ]);

            // STOP keyword detection (case-insensitive)
            $isStop = false;
            if (!empty($body)) {
                $trimmed = trim($body);
                $isStop = (bool) preg_match('/^STOP\b/i', $trimmed);
            }

            if ($isStop && !empty($from)) {
                $unsubscribeMsg = 'You have been unsubscribed from our mailing list';
                $replyResult = $this->sms->sendSms($from, $unsubscribeMsg);

                SmsMessage::create([
                    'user_id' => $user?->id,
                    'recipient_number' => $replyResult['normalized_phone'] ?? $from,
                    'sender_number' => config('services.twilio.phone_number'),
                    'direction' => 'outbound',
                    'category' => 'unsubscribe',
                    'twilio_message_sid' => $replyResult['message_sid'] ?? null,
                    'status' => $replyResult['status'] ?? ($replyResult['success'] ? 'sent' : 'failed'),
                    'body' => $unsubscribeMsg,
                    'error' => $replyResult['success'] ? null : ($replyResult['error'] ?? 'Unknown error'),
                ]);

                Log::info('STOP unsubscribe reply sent', [
                    'to' => $from,
                    'success' => $replyResult['success'] ?? false,
                    'sid' => $replyResult['message_sid'] ?? null,
                ]);
            }
            
            // Send Email Notification
            try {
                $smsDetails = [
                    'from' => $from,
                    'student_name' => $user ? $user->first_name . ' ' . $user->last_name : null,
                    'body' => $body ?? ''
                ];
                
                Mail::to(['rkoenning@biopharmainfo.net','navaid@biopharmainfo.net','abdurrehmanashraf.ghazitech@gmail.com'])
                    ->send(new InboundSmsNotification($smsDetails));
            } catch (\Throwable $e) {
                Log::error('Inbound SMS email notification failed', ['error' => $e->getMessage()]);
            }
            
            return response('OK', 200);
        } catch (\Throwable $e) {
            Log::error('Inbound SMS save failed', ['error' => $e->getMessage()]);
            return response('ERROR', 500);
        }
    }

    private function findUserByPhoneFlexible(?string $raw): ?User
    {
        if (!$raw) return null;
        $digits = preg_replace('/\D+/', '', (string) $raw);
        if (!$digits) return null;
        $last10 = substr($digits, -10);
        if (!$last10) return null;

        $candidates = User::whereNotNull('phone_number')->get(['id','phone_number','first_name','last_name']);
        foreach ($candidates as $u) {
            $ud = preg_replace('/\D+/', '', (string) $u->phone_number);
            if ($last10 && substr($ud, -10) === $last10) {
                return $u;
            }
        }
        return null;
    }

    public function logs(Request $request)
    {
        $inbox = SmsMessage::with('user')->where('direction','inbound')->latest()->limit(200)->get();
        $outbox = SmsMessage::with('user')->where('direction','outbound')->latest()->limit(200)->get();
        $mass = SmsMessage::with('user')->where('direction','outbound')->whereIn('category',['inquiries','students'])->latest()->limit(200)->get();
        return view('admin.sms-logs', compact('inbox','outbox','mass'));
    }
}
