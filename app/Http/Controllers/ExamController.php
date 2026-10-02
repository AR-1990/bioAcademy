<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ExamName;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Attemptquiz;
use App\Models\Result;
use App\Models\User;
use App\Models\exam;
use DB;
class ExamController extends Controller
{
    public function showaddquiz (){
        return view('admin.add_quiz');
    }
    public function show_quiz()
    {     
        $userId = Auth::id();
        $count = AttemptQuiz::where('user_id', $userId)->count();
            if($count==0){
                $data['data'] = exam::inRandomOrder()->get();
                $data['count'] = $data['data']->count();
                return view('admin.quiz', $data);
            }else{
                $data['date'] = AttemptQuiz::where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->first()
                ?->created_at->format('Y-m-d H:i:s'); 
                return view('admin.no-exam-found', ['date' => $data['date']]);
            }
      
    }
    
    public function index(Request $request, $id)
    {
        $questions = Question::where('exam_id', $id)->get();
        return view('admin.quiz_show', compact('questions'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'quiz-name' => 'required|string',
            'numOfQuestions' => 'required|numeric|min:1',
        ]);
    
        $exam = ExamName::create([
            'QuizName' => $request->input('quiz-name'),
            'NoOfQuestions' => $request->input('numOfQuestions'),
        ]);
    
        $correctAnswers = []; 
    
        for ($i = 1; $i <= $request->input('numOfQuestions'); $i++) {
            $request->validate([
                "question{$i}" => 'required|string',
                "question{$i}Choice" => 'required|string',
            ]);
    
            $question = Question::create([
                'question' => $request->input("question{$i}"),
                'option_one' => $request->input("question{$i}Choice1"),
                'option_two' => $request->input("question{$i}Choice2"),
                'option_three' => $request->input("question{$i}Choice3"),
                'option_four' => $request->input("question{$i}Choice4"),
                'exam_id' => $exam->id,
            ]);
    
            $selectedOption = $request->input("question{$i}Choice");
    
            Answer::create([
                'question_id' => $question->id,
                'correct_answer' => $selectedOption,
            ]);
            $correctAnswers[$question->id] = $selectedOption;
        }

        session(['correctAnswers' => $correctAnswers]);

        return redirect()->route('quiz')->with('success', 'Quiz created successfully!');
    }
    
    public function submitQuiz(Request $request)
    {

        $answers = $request->input('answers'); // Retrieve submitted answers
    $userId = Auth::id(); // Get the authenticated user's ID

    // Loop through the answers and insert into the database
    foreach ($answers as $questionId => $selectedOption) {
        AttemptQuiz::create([
            'user_id' => $userId,
            'question_id' => $questionId,
            'selected_options' => $selectedOption,
        ]);
    }

    return response()->json(['success' => true, 'message' => 'Quiz submitted successfully.']);
    
}
public function studentQuiz()
{
    $userId = Auth::id();
    $count = AttemptQuiz::where('user_id', $userId)->count();
  $existing = DB::table('exam_schedule')
    ->where('student_id', $userId)
    ->value('exam_stautus'); // only get exam_stautus value

if ($existing != 1) {
  
    return 'No Exam Found'; 
}else{
        if($count==0){
            $data['data'] = exam::inRandomOrder()->get();
            $data['count'] = $data['data']->count();
            // return view('admin.quiz', $data);
            return view('student.quiz', $data);
        }else{
            $data['date'] = AttemptQuiz::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first()
            ?->created_at->format('Y-m-d H:i:s'); 
        
        return view('student.no-exam-found', ['date' => $data['date']]); // Pass 'date' explicitly
        
        }
    }
}
    // public function studentQuiz() {
    //     $quizzes = ExamName::all();
    //     $attemptedQuizzes = Result::where('user_id', Auth::id())->pluck('exam_id');
    //     $availableQuizzes = $quizzes->reject(function ($quiz) use ($attemptedQuizzes) {
    //         return $attemptedQuizzes->contains($quiz->id);
    //     });
    
    //     return view('student.quiz', compact('availableQuizzes'));
    // }

   
    public function showQuiz(Request $request, $id){
        $questions = Question::where('exam_id', $id)->get();
        
        return view('student.quiz_show', compact('questions'));
       
    }
    public function showResultDetails(){
         $userId = Auth::id();
        $data['ExamDetails'] = exam::join('attempt_quizzes', 'exams.id', '=', 'attempt_quizzes.question_id')->where('attempt_quizzes.user_id',$userId)->get();
        return view('student.student-result-details',$data);
    }
    public function showStudentsResult($id){
        //  $userId = Auth::id();
        $data['ExamDetails'] = exam::join('attempt_quizzes', 'exams.id', '=', 'attempt_quizzes.question_id')->where('attempt_quizzes.user_id',$id)->get();
        return view('admin.student-result-details',$data);
    }
    public function StudentSubmitQuiz(Request $request)
    {
                    

                        $answers = $request->input('answers'); // Retrieve submitted answers
                    $userId = Auth::id(); // Get the authenticated user's ID

                    // Loop through the answers and insert into the database
                    foreach ($answers as $questionId => $selectedOption) {
                        AttemptQuiz::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_options' => $selectedOption,
                        ]);
                    }

                    return response()->json(['success' => true, 'message' => 'Quiz submitted successfully.']);
                    
               
        // try {
        //     $userId = Auth::id();

        //     $quizId = null;
        //     $adminAnswers = [];
        //     $studentAnswers = [];
    
        //     foreach ($request->input('answers') as $questionId => $selectedOptions) {
        //         try {
         
        //             $adminAnswerModel = Answer::where('question_id', $questionId)->firstOrFail();
        //             $adminAnswer = $adminAnswerModel->correct_answer;
        //             $question = Question::findOrFail($questionId);
        //             $quizId = $question->exam_id;
        //             $adminAnswers[$questionId] = $adminAnswer;
        //             $studentAnswers[$questionId] = $selectedOptions;
        //             Attemptquiz::create([
        //                 'user_id' => $userId,
        //                 'question_id' => $questionId,
        //                 'is_attempted'=>1,
        //                 'selected_options' => json_encode($selectedOptions),
        //             ]);
        //         } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
        //             continue;
        //         }
        //     }

        //     $score = 0;
        //     $totalQuestions = count($adminAnswers);
    
        //     foreach ($adminAnswers as $questionId => $correctAnswer) {

        //         if (isset($studentAnswers[$questionId])) {

        //             if ($correctAnswer === null) {

        //                 echo "Warning: Correct answer is NULL for question ID $questionId\n";
        //                 continue; 
        //             }
    
        //             $isCorrect = ($studentAnswers[$questionId] === $correctAnswer);

        //             if ($isCorrect) {
        //                 $score++;
        //             }

        //             echo "Question ID: $questionId\n";
        //             echo "Correct Answer: " . ($correctAnswer ?? 'NULL') . "\n";
        //             echo "Student's Answer: {$studentAnswers[$questionId]}\n";
        //             echo "Is Correct: " . ($isCorrect ? 'Yes' : 'No') . "\n";
        //             echo "Score: $score\n\n";
        //         }
        //     }
    
   
        //     $percentageScore = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;
    
      
        //     $exam = ExamName::find($quizId);
        //     $quizname = $exam->QuizName;
        //     $user = User::find($userId);
        //     $firstName = $user->first_name;
        //     $result = new Result();
        //     $result->user_id = $userId;
        //     $result->first_name = $firstName;
        //     $result->QuizName = $quizname;
        //     $result->exam_id = $quizId;
        //     $result->score = $score;
        //     $result->NoOfQuestions = $totalQuestions;
        //     $result->Percentage = $percentageScore;
        //     $result->save();    
        //     return redirect()->route('student-quiz-show')->with('success', 'Quiz submitted successfully!');
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
}
    // public function results()
    // {
    //     $data = User::join('attempt_quizzes', 'users.id', '=', 'attempt_quizzes.user_id')
    //         ->select('users.id as user_id', 'users.first_name', 'attempt_quizzes.question_id', 'attempt_quizzes.selected_options')
    //         ->get();
    //     $questionIds = $data->pluck('question_id');
    //     $examData = exam::whereIn('id', $questionIds)->select('id', 'correctanswer')->get();
    //     $groupedData = $data->groupBy('user_id');
    //     $results = [];

    //     foreach ($groupedData as $userId => $attempts) {
    //         $studentName = $attempts->first()->first_name ?? 'Unknown'; 
    //         $correctCount = 0;
    //         foreach ($attempts as $attempt) {
    //             $correctAnswer = $examData->firstWhere('id', $attempt->question_id)->correctanswer ?? null;
    //             if ($correctAnswer && $correctAnswer == $attempt->selected_options) {
    //                 $correctCount++;
    //             }
    //         }
    //         $results[] = [
    //             'student_name' => $studentName,
    //             'correct_answers' => $correctCount,
    //             'total_questions' => $attempts->count(),
    //         ];
    //     }
    //     // dd($results);
    //     return view('admin.results', ['results' => $results]);
    // }

    public function results()
{
    $data = User::join('attempt_quizzes', 'users.id', '=', 'attempt_quizzes.user_id')
        ->select(
            'users.id as user_id',
            'users.first_name',
            'users.last_name',
            'attempt_quizzes.question_id',
            'attempt_quizzes.selected_options',
            DB::raw("DATE_FORMAT(attempt_quizzes.created_at, '%Y-%m-%d %H:%i:%s') as quiz_date_time") // Get formatted datetime
        )
        ->orderBy('attempt_quizzes.created_at', 'desc') // Sort by latest attempt
        ->get();

    $questionIds = $data->pluck('question_id');
    $user_id = $data->pluck('user_id');
    $examData = Exam::whereIn('id', $questionIds)->pluck('correctanswer', 'id'); // Optimize using pluck
    $groupedData = $data->groupBy('user_id');

    $results = [];

    foreach ($groupedData as $userId => $attempts) {
        $firstAttempt = $attempts->first();
        $studentName = trim(($firstAttempt->first_name ?? '') . ' ' . ($firstAttempt->last_name ?? ''));
        $studentName = $studentName !== '' ? $studentName : 'Unknown';
        $id = $firstAttempt->user_id ?? '0';
        $latestAttempts = $attempts->unique('question_id')->values();
        $correctCount = 0;
        $totalQuestions = $latestAttempts->count();
        $lastQuizDate = $attempts->first()->quiz_date_time ?? null; // Get the latest attempt date

        foreach ($latestAttempts as $attempt) {
            $correctAnswer = $examData[$attempt->question_id] ?? null;

            if (!is_null($correctAnswer) && trim($correctAnswer) == trim($attempt->selected_options)) {
                $correctCount++;
            }
        }

        $results[] = [
            'full_name' => $studentName,
            'correct_answers' => $correctCount,
            'total_questions' => $totalQuestions,
            'last_quiz_attempt_date' => $lastQuizDate, // Store only the last attempt date
            'user_id' => $id,
        ];
    }
// dd( $results);
    return view('admin.results', ['results' => $results]);
}

    
}   
