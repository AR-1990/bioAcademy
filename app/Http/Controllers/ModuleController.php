<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AddModule;
use App\Models\AdminAnswer;
use App\Models\ModuleData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ModuleController extends Controller
{
    // public function index()
    // {
    //     $lessons = AddModule::all();
    //     $user = Auth::user();
    //     return view('admin.module', compact('lessons'));
    // }
  public function index()
    {
        $user = Auth::user();
        
        
        if ($user->role == 2) {
            $assignedModuleIds = DB::table('assign_modules')
                ->where('student_id', $user->id)
                ->pluck('module_id')
                ->toArray();
            
            $lessons = AddModule::whereIn('id', $assignedModuleIds)->get();
        } else {
            // For other roles (admin/staff), show all modules
            $lessons = AddModule::all();
        }
        
        return view('admin.module', compact('lessons'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'lesson_number' => 'required',
            'lesson_name' => 'required',
            'description' => 'nullable',
            'url' => 'required|file|mimes:mp4,mov,avi',
        ]);
    
        try {
            DB::beginTransaction();
    
            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('videos', $fileName, 'public');
                AddModule::create([
                    'lesson_number' => $request->lesson_number,
                    'lesson_name' => $request->lesson_name,
                    'description' => $request->description,
                    'url' => $fileName,
                ]);
    
                DB::commit();
    
                return redirect()->back()->with('success', 'Lesson Added Successfully.');
            } else {
                DB::rollback();
                return redirect()->back()->with('error', 'Error: File not provided.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error during lesson addition: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error during lesson addition.');
        }
    }
    

}