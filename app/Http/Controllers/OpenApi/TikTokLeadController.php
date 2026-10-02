<?php

namespace App\Http\Controllers\OpenApi;

use App\Http\Controllers\Controller;
use App\Mail\StudentEnrolled;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TikTokLeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'nullable|string|max:190',
            'phone_number' => 'required|string|max:30',
            'postal' => 'nullable|string|max:20',
        ]);

        try {
            $firstName = trim((string) ($validated['first_name'] ?? ''));
            $lastName = trim((string) ($validated['last_name'] ?? ''));
            $phoneNumber = trim((string) ($validated['phone_number'] ?? ''));

            $emailRaw = trim((string) ($validated['email'] ?? ''));
            $email = $emailRaw !== '' ? $emailRaw : null;
            if ($email !== null && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Invalid email format.',
                ], 422);
            }

            $existingUser = null;
            if ($email !== null) {
                $existingUser = User::where('email', $email)->first();
            }
            if (!$existingUser && $phoneNumber !== '') {
                $existingUser = User::where('phone_number', $phoneNumber)->first();
            }

            if ($existingUser) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Lead already exists!',
                    'id' => $existingUser->id,
                ]);
            }

            if ($email === null) {
                $digits = preg_replace('/\D+/', '', $phoneNumber);
                $suffix = $digits !== '' ? $digits : uniqid();
                $email = 'tiktok_' . $suffix . '_' . time() . '@lead.local';
            }

            $user = new User();
            $user->first_name = $firstName !== '' ? $firstName : '-';
            $user->last_name = $lastName !== '' ? $lastName : '-';
            $user->email = $email;
            $user->phone_number = $phoneNumber;
            $user->status = 'Not contacted';
            $user->gender = '-';
            $user->address_line = '-';
            $user->city = '-';
            $user->source = User::SOURCE_TIKTOK;
            $user->country = '-';
            $user->postal_code = !empty($validated['postal']) ? $validated['postal'] : 0;
            $user->is_enrolled = 0;
            $user->role = 2;
            $user->save();

            $mailData = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'postal' => $validated['postal'] ?? null,
                'source' => $user->source,
                'source_label' => User::getSourceLabel($user->source),
            ];

            Mail::to([
                'rkoenning@biopharmainfo.net',
                'abdurrehmanashraf.ghazitech@gmail.com',
                'navaid@biopharmainfo.net',
            ])->send(new StudentEnrolled($mailData));

            $smsService = new SmsService();
            $smsService->sendStudentGreeting($user->phone_number, $user->first_name);

            return response()->json([
                'status' => 201,
                'message' => 'Lead saved successfully.',
                'id' => $user->id,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('TikTok lead save failed', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => 500,
                'message' => 'Failed to save lead. Please try again.',
            ], 500);
        }
    }
}

