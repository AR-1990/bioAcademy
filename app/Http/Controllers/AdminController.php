<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ExamName;
use App\Models\AddModule;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
    
        $totalStudentsCount = User::where('is_enrolled', 1)->count();
        $unenrolledStudents = User::where('is_enrolled', 0)->count();
        $totalQuizzes = ExamName::count();
        $totalModules = AddModule::count();
        return view('admin.index', compact('totalStudentsCount','unenrolledStudents','totalQuizzes','totalModules'));
    }
   
    public function showStudentProfile($id)
    {
        $details = User::where('id', $id)->get();
        $comments = Comment::where('user_id', $id)->with('admin')->latest()->get();
        return view('admin.student_profile', compact('details', 'comments'));
    }

    public function updateStudentProfile(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->address_line = $request->address_line;
        $user->city = $request->city;
        $user->status = $request->status;
        $user->save();

        // Save comment if provided
        if ($request->comment) {
            Comment::create([
                'user_id' => $user->id,
                'admin_id' => Auth::id(),
                'comment' => $request->comment,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Profile updated!']);
    }

    public function changeStudentPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|string|min:6',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Password changed successfully!']);
    }
}
