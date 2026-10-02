<?php

namespace App\Http\Controllers;

use App\Models\ModuleData;
use App\Models\AdminAnswer;
use App\Models\AddModule;

use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    // public function show_module($lessonId)
    // {
        
    //     $lesson = AddModule::findOrFail($lessonId);
    //     // Retrieve questions with admin replies and student replies
    //     $questions = ModuleData::with(['user','adminAnswer', 'replies.user'])
    //         ->where('lesson_id', $lesson->id)
    //         ->whereNull('parent_comment_id')
    //         ->get();
    
    //     return view('admin.lesson', compact('lesson', 'questions'));
    // }
    // public function showLesson(Request $request, $lessonId)
    // {
    //     $lesson = AddModule::find($lessonId);
    //     $studentQuestions = ModuleData::with(['user','replies', 'adminAnswer', 'replies.user'])->where('lesson_id', $lessonId)->whereNull('parent_comment_id')->get();
    //     $adminReplies = AdminAnswer::whereIn('comment_id', $studentQuestions->pluck('id'))->get();
    //     return view('student.lesson', compact('lesson', 'studentQuestions', 'adminReplies'));
    // } 
    // public function askQuestion(Request $request)
    // {
       
    //     $request->validate([
    //         'question' => 'required|string',
    //     ]);
    //     $lessonNumber = $request->input('lesson_number');
       
    //     $lesson = AddModule::where('lesson_number', $lessonNumber)->first();
    //     if (!$lesson) {
    //         return redirect()->back()->with('error', 'Lesson not found.');
    //     }
       
    //     $userId = auth()->id();
    //     $question = ModuleData::create([
    //         'comment' => $request->input('question'),
    //         'user_id' => $userId,
    //         'lesson_id' => $lesson->id,
    //     ]);
    //     return redirect()->route('module', compact('lesson'))->with('success', 'Student doubt added');
    // }
    // public function adminReply(Request $request)
    // {
    //      dd($request->all());
    //     $commentId = $request->input('comment_id');
    //     $lessonId = ModuleData::find($commentId)->lesson_id;
    //     ModuleData::create([
    //         'comment_id' => $commentId,
    //         'lesson_id' => $lessonId,
    //         'comment' => $request->input('reply'),
    //         'parent_comment_id' => $request->input('parent_comment_id'),
    //         'user_id' => auth()->user()->id, 
    //     ]);
    
    
    //     return redirect()->back()->with('success', 'Reply given successfully');
    // }
    

    
    // public function studentReply(Request $request)
    // {
        
    //     $request->validate([
    //         'reply' => 'required',
    //         'parent_comment_id' => 'required',
    //         'lesson_number' => 'required|numeric',
    //     ]);

    //     $lessonNumber = $request->input('lesson_number');
    //     $lesson = AddModule::where('lesson_number', $lessonNumber)->first();

    //     if (!$lesson) {
    //         return redirect()->back()->with('error', 'Lesson not found');
    //     }

    //     $userId = Auth::id();
    //     ModuleData::create([
    //         'lesson_id' => $lesson->id,
    //         'comment' => $request->input('reply'),
    //         'user_id' => $userId,
    //         'parent_comment_id' => $request->input('parent_comment_id'),
    //     ]);

    //     return redirect()->back()->with('success', 'Reply posted successfully');
    // }
 
    
    // public function deleteQuestion($id)
    // {
    //     $question = ModuleData::findOrFail($id);
    //     $question->adminAnswer()->delete();
    //     $question->delete();

    //     return redirect()->back()->with('success', 'Question deleted successfully');
    // }

}
