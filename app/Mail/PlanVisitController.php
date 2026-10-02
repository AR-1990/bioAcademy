<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanVisit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitRequest;


use DataTables;
use DB;
use Session;

class PlanVisitController extends Controller
{
    public function index(){
        $visit_data=PlanVisit::all();
        return view("admin.visits",compact('visit_data'));
    }
    public function create(){
        return view("university.plan_visit");
    }
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
           "visit_date"=>"required",
            "visit_time"=>"required",
         
        ]);
        // Save visit request
        PlanVisit::create($validatedData);

        // Send Visit Request email to admins
        try {
            $recipients = [
                // 'info@biopharmaacademy.com',
                'abdurrehmanashraf.ghazitech@gmail.com',
            ];

            Mail::to($recipients)->send(new VisitRequest([
                'first_name'   => $validatedData['first_name'],
                'last_name'    => $validatedData['last_name'],
                'email'        => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'visit_date'   => $validatedData['visit_date'],
                'visit_time'   => $validatedData['visit_time'],
            ]));
        } catch (\Throwable $e) {
            // Optionally log the error; keep UX simple with a generic message
            \Log::error('VisitRequest mail failed: '.$e->getMessage());
        }

        $message = "Visit request submitted successfully";

        Session::flash("success_message", $message);
        return redirect()->back();

        // return redirect()->route("university_login")->with("Success", "Data inserted Successfully");
    }
    public function update(Request $request, PlanVisit $visit)
    {
        // Validation rules for the request
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:20',
            'visit_date' => 'required|date',
            'visit_time' => 'required|string|max:20',
        ]);

        // Update the visit record
        $visit->update($validatedData);

        return redirect()->route('visits')->with('success', 'Visit updated successfully!');
    }

    // Remove the specified visit from storage
    public function destroy(PlanVisit $visit)
    {
        // Delete the visit record
        $visit->delete();

        //return redirect()->route('visits')->with('success', 'Visit deleted successfully!');
    }

}
