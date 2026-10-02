<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

class EditAccountController extends Controller
{
    public function index()
    {
        $admin = User::find(1);
        return view('admin.edit_account', compact('admin'));
    }
    
    public function AdminEditAccount(Request $request, $id){
        $request->validate([
            'password' => 'nullable|confirmed',
        ]);
        $admin = User::find($id);
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }
        if ($request->hasFile('image')) {
            if ($admin->image) {
                Storage::delete($admin->image);
            }
            $imagePath = $request->file('image')->store('admin_images', 'public');
            $admin->image = $imagePath;
        }
        $admin->save();
        return redirect()->route('edit-account')->with('success', 'Account updated successfully!');
    }

public function editStudent(){
    $student = Auth::user();
    return view('student.edit_profile', compact('student'));
}
public function StudentEditAccount(Request $request, $id)
{
    $request->validate([
        'password' => 'nullable|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $student = User::find($id);
    if ($request->filled('new_password')) {
        $student->password = Hash::make($request->input('new_password'));
    }
    if ($request->hasFile('image')) {
        if ($student->image) {
            Storage::delete($student->image);
        }
        $imagePath = $request->file('image')->store('profile_images', 'public');
        $student->image = $imagePath;
    }
    $student->save();
    return redirect()->route('edit-account')->with('success', 'Account updated successfully!');
}
}