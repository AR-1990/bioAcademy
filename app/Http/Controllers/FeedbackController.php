<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackFormSubmitted;
use App\Models\FeedbackResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'respondent_name' => ['required', 'string', 'max:255'],
            'enrolled' => ['required', Rule::in(['Yes', 'No'])],
            'convinced' => ['nullable', 'array'],
            'convinced.*' => ['string', Rule::in(['Content', 'Hands-on training', 'Affordable fee', 'Flexibility', 'Other'])],
            'convinced_other' => ['nullable', 'string', 'max:255'],
            'not_enrolled_reason' => ['nullable', 'string', Rule::in(['Cost', 'Not sure if it\'s right for me', 'Not ready to start yet', 'Looking for other programs', 'Other'])],
            'not_enrolled_other' => ['nullable', 'string', 'max:255'],
            'likely_to_enroll' => ['nullable', 'array'],
            'likely_to_enroll.*' => ['string', Rule::in([
                'More affordable pricing/payment options',
                'More information about the program',
                'Career/job placement support',
                'More details about the hands-on training',
                'Student/graduate success stories',
                'Other',
            ])],
            'likely_to_enroll_other' => ['nullable', 'string', 'max:255'],
            'program_clarity' => ['required', Rule::in(['Very clear', 'Somewhat clear', 'Not clear'])],
            'shadow_day' => ['required', Rule::in(['Yes', 'No'])],
            'contact_method' => ['nullable', Rule::in(['Phone', 'Email', 'Text Message'])],
            'contact_information' => ['nullable', 'string', 'max:255'],
            'team_contact' => ['required', Rule::in(['Yes', 'No'])],
            'comments' => ['nullable', 'string', 'max:4000'],
        ], [
            'respondent_name.required' => 'Name is required.',
            'enrolled.required' => 'Please tell us whether you decided to enroll.',
            'program_clarity.required' => 'Please select your understanding of the program.',
            'shadow_day.required' => 'Please tell us whether you are interested in a shadow day.',
            'team_contact.required' => 'Please tell us whether our team may contact you.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $convinced = array_values(array_filter((array) $request->input('convinced', [])));
            $likelyToEnroll = array_values(array_filter((array) $request->input('likely_to_enroll', [])));

            if ($request->input('enrolled') === 'No' && !$request->filled('not_enrolled_reason')) {
                $validator->errors()->add('not_enrolled_reason', 'Please select the main reason you have not enrolled.');
            }

            if (in_array('Other', $convinced, true) && !$request->filled('convinced_other')) {
                $validator->errors()->add('convinced_other', 'Please specify the other reason that convinced you.');
            }

            if ($request->input('not_enrolled_reason') === 'Other' && !$request->filled('not_enrolled_other')) {
                $validator->errors()->add('not_enrolled_other', 'Please specify the other reason for not enrolling.');
            }

            if (in_array('Other', $likelyToEnroll, true) && !$request->filled('likely_to_enroll_other')) {
                $validator->errors()->add('likely_to_enroll_other', 'Please specify what else would make you more likely to enroll.');
            }

            if ($request->input('shadow_day') === 'Yes') {
                if (!$request->filled('contact_method')) {
                    $validator->errors()->add('contact_method', 'Please select the best contact method.');
                }

                if (!$request->filled('contact_information')) {
                    $validator->errors()->add('contact_information', 'Please provide your contact information for the shadow day.');
                }
            }
        });

        $validated = $validator->validate();

        $mailData = [
            'respondent_name' => $validated['respondent_name'],
            'enrolled' => $validated['enrolled'],
            'convinced' => array_values(array_filter($validated['convinced'] ?? [])),
            'convinced_other' => $validated['convinced_other'] ?? null,
            'not_enrolled_reason' => $validated['not_enrolled_reason'] ?? null,
            'not_enrolled_other' => $validated['not_enrolled_other'] ?? null,
            'likely_to_enroll' => array_values(array_filter($validated['likely_to_enroll'] ?? [])),
            'likely_to_enroll_other' => $validated['likely_to_enroll_other'] ?? null,
            'program_clarity' => $validated['program_clarity'],
            'shadow_day' => $validated['shadow_day'],
            'contact_method' => $validated['contact_method'] ?? null,
            'contact_information' => $validated['contact_information'] ?? null,
            'team_contact' => $validated['team_contact'],
            'comments' => $validated['comments'] ?? null,
        ];

        FeedbackResponse::create($mailData);

        try {
            Mail::to([
                'rkoenning@biopharmainfo.net',
                'navaid@biopharmainfo.net',
                'abdurrehmanashraf.ghazitech@gmail.com',
            ])->send(new FeedbackFormSubmitted($mailData));
        } catch (\Throwable $e) {
            Log::error('Feedback form email failed', ['error' => $e->getMessage()]);
        }

        return redirect()
            ->route('feedback-form')
            ->with('success', 'Thank you! Your feedback has been submitted successfully.');
    }

    public function index()
    {
        $feedbackResponses = FeedbackResponse::latest()->get();
        $feedbackMap = $feedbackResponses->mapWithKeys(function ($feedback) {
            return [(string) $feedback->id => $feedback->toArray()];
        });

        return view('admin.feedbacks', compact('feedbackResponses', 'feedbackMap'));
    }
}
