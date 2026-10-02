<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;

use App\Models\AttemptQuiz;
use App\Models\Answer;



class AttemptQuizController extends Controller
{


    public function submitQuiz(Request $request)
    {
        \Log::info('Quiz Submission Data:', $request->all()); // Log incoming request

        // Convert answers to an array if it's null
        $answers = $request->input('answers', []);

        // Ensure it's an array
        if (!is_array($answers)) {
            $answers = [];
        }

        // Check if no questions were attempted
        if (empty($answers)) {
            \Log::info("No answers submitted, recording empty attempt for user: " . auth()->id());

            // Save an empty attempt without question_id
            AttemptQuiz::create([
                'user_id' => auth()->id(),
                'question_id' => null, // NULL instead of an invalid integer
                'selected_options' => null, // NULL because no option was selected
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Quiz submitted with no answers.'
            ]);
        }

        // Process submitted answers
        foreach ($answers as $questionId => $answer) {
            AttemptQuiz::create([
                'user_id' => auth()->id(),
                'question_id' => (int) $questionId, // Ensure it's an integer
                'selected_options' => $answer,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Quiz submitted successfully.'
        ]);
    }
}
