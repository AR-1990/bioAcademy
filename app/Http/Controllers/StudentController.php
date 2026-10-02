<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\User;
use App\Models\AddModule;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentEnrolled;
use App\Models\AdminAnswer;
use App\Models\ModuleData;
use App\Models\Result;
use App\Models\exam;
use DataTables;
use DB;
use Session;
use App\Models\Comment;
use App\Models\SmsMessage;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    protected function applyCreatedAtDateRange($query, Request $request)
    {
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        return $query;
    }

    protected function formatCreatedAt($value)
    {
        return $value ? $value->format('M/d/Y') : '';
    }

    public function index(Request $request)
{
    if ($request->ajax()) {
        $data = User::select('*')
            ->where('is_enrolled', '0')
            ->where('role', 2)
            ->orderBy('id', 'desc');

        $this->applyCreatedAtDateRange($data, $request);

        return Datatables::of($data)
            ->addIndexColumn()

            // ✅ Convert source numeric to readable text
            ->editColumn('source', function ($row) {
                return User::getSourceLabel($row->source);
            })
            ->editColumn('created_at', function ($row) {
                return $this->formatCreatedAt($row->created_at);
            })

            ->addColumn('action', function ($row) {
                $btn2 = "<button class='btn btn-sm btn-primary changeStatus' data-id='" . $row->id . "'>  
                            <i class='fas fa-exchange-alt arrow-icon'></i>
                         </button>";
                return $btn2;
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    return view('admin.inquiries');
}

    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::select('*')->where('is_enrolled', '0')->where('role', 2)->orderBy('id', 'desc'); ;
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $btn = "<button class='btn btn-sm btn-primary updateUser' data-id='" . $row->id . "' data-bs-toggle='modal' data-bs-target='#updateModal' ><i class='fa-solid fa-pen-to-square'></i></button>";
    //                 // $btn1 = "<button class='btn btn-sm btn-danger deleteUser' data-id='" . $row->id . "'><i class='fa-solid fa-trash'></i></button>";
    //                 $btn2 = "<button class='btn btn-sm btn-primary changeStatus' data-id='" . $row->id . "'>  <i class='fas fa-exchange-alt arrow-icon'></i></button>";
    //                  $btn3 = "<a href='/student_profile/" . $row->id . "' class='btn btn-sm btn-primary' id='thumbsup'><i class='fas fa-eye'></i></a>";

    //                 //  $btn4 = "<button class='btn btn-sm btn-primary ' data-id='" . $row->id . "' id='thumbdown'>  <i class='fas fa-thumbs-down'></i></button>";
    //                 return $btn2.$btn3 ;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('admin.inquiries');
    // }
                        function student_profile($id){
                $data['details'] = User::select('*')->where('id', $id)->get();
                $data['comments'] = Comment::where('user_id', $id)->with('admin')->latest()->get();

                $phone = $data['details'][0]->phone_number ?? null;
                $digits = $phone ? preg_replace('/\D+/', '', (string) $phone) : null;
                $last10 = $digits ? substr($digits, -10) : null;

                $smsQuery = SmsMessage::with('user')->orderBy('created_at', 'desc');
                $smsQuery->where('user_id', $id);
                if ($last10) {
                    $smsQuery->orWhere('recipient_number', 'like', "%$last10")
                             ->orWhere('sender_number', 'like', "%$last10");
                }
                $data['sms'] = $smsQuery->limit(200)->get();

                return view('admin.student_profile', $data);

            }
    // public function reg_student(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::select('*')->where('is_enrolled', '1')->orderBy('id', 'desc'); ;
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 // $btn = "<button class='btn btn-sm btn-primary updateUser' data-id='" . $row->id . "' data-bs-toggle='modal' data-bs-target='#updateModal' ><i class='fa-solid fa-pen-to-square'></i></button>";
    //                 // $btn1 = "<button class='btn btn-sm btn-danger deleteUser' data-id='" . $row->id . "'><i class='fa-solid fa-trash'></i></button>";
    //                   $btn3 = "<a href='/student_profile/" . $row->id . "' class='btn btn-sm btn-primary' id='thumbsup'><i class='fas fa-eye'></i></a>";
    //                 return $btn3 . " " ;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('admin.students');
    // }
    
    public function reg_student(Request $request)
{
    if ($request->ajax()) {
        $data = User::select('*')
            ->where('is_enrolled', '1')
            ->orderBy('id', 'desc');

        $this->applyCreatedAtDateRange($data, $request);

        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('source', function ($row) {
                return User::getSourceLabel($row->source);
            })
            ->editColumn('created_at', function ($row) {
                return $this->formatCreatedAt($row->created_at);
            })
            ->make(true);
    }

    return view('admin.students');
}


    public function ChangeStatus(Request $request)
    {
        try {
            $userId = $request->input('id');

            $user = User::find($userId);
            if ($user) {
                $user->is_enrolled = ($user->is_enrolled == 1) ? 0 : 1;
                $user->save();

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateStatus(Request $request){
        // dd($request->all());
            $update = User::where('id', $request->user_id)->first();
           if ($update) {
        $update->status = $request->status;
        $update->save();

                return response()->json([
                    'success' => true,
                    'id' => $update->id,
                    'message' => 'Status updated successfully.'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
    }

    public function updateStudent(Request $request)
    {
        $id = $request->post('id');
        $stdata = User::find($id);

        return response()->json([
            'status' => 200,
            'stdata' => $stdata,
        ]);
    }

    public function updateData(Request $request)
    {
        $update = User::where('id', $request->id)->first();

        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->email = $request->email;
        $update->phone_number = $request->phone_number;
        $update->dob = $request->dob;
        $update->gender = $request->gender;
        $update->address_line = $request->address_line;
        $update->city = $request->city;
        $update->country = $request->country;
        $update->postal_code = $request->postal_code;
        $update->password = bcrypt($request->password);
        $update->save();

        return response()->json([
            'status' => 200,
            'message' => 'Data Updated Successfully!',
        ]);
    }
    
    
    public function SaveMyLeadHook(Request $request)
        {
           
            // Normalize email
            $email = trim($request->email);
    
            if (empty($email)) {
                 return response()->json([
                     'status' => 400,
                     'message' => 'Email is required!',
                 ]);
            }
    
            // Check if lead already exists
            $existingUser = User::where('email', $email)->first();
            if ($existingUser) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Lead already exists!',
                    'sms_sent' => false,
                ]);
            }
            
            $User = new User();
            $User->first_name = $request->first_name;
            $User->last_name = $request->last_name;
            $User->email = $email;
            $User->phone_number = $request->phone_number;
            // $User->dob = $request->dob;
            $User->status = 'Not contacted';
            $User->gender = '-';
            $User->address_line = '-';
            $User->city = $request->city;
            $User->source = User::SOURCE_FACEBOOK;
            $User->country = '-';
            $User->postal_code = 0;
            $User->is_enrolled = 0;
            $User->role = 2;
            // $User->password = bcrypt($request->password);
            $User->save();
            
            // Send email notification
            $mailData = array_merge($request->all(), [
                'source' => $User->source,
                'source_label' => User::getSourceLabel($User->source),
            ]);
            Mail::to(['rkoenning@biopharmainfo.net','abdurrehmanashraf.ghazitech@gmail.com','navaid@biopharmainfo.net'])->send(new StudentEnrolled($mailData));
            // Mail::to(['abdurrehmanashraf.ghazitech@gmail.com'])->send(new StudentEnrolled($request->all()));
            
            // Send SMS greeting to student
            $smsService = new SmsService();
            $smsResult = $smsService->sendStudentGreeting($request->phone_number, $request->first_name);
            
            return response()->json([
                'status' => 200,
                'message' => 'Data Updated Successfully!',
                'sms_sent' => $smsResult['success'] ?? false,
            ]);
        }
    
    public function LinkDinLeadHook(Request $request)
    {
        $validated = $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|max:190',
            'phone_number' => 'required|string|max:30',
            'source'       => 'required|in:1,2,3',
            'postal'       => 'required|string|max:20',
        ]);

        try {
             // Normalize email
             $email = trim($validated['email']);

             // Check if lead already exists
             $existingUser = User::where('email', $email)->first();
             if ($existingUser) {
                 return back()->with('error', 'Lead already exists!');
             }

            $user = new User();
            $user->first_name  = $validated['first_name'];
            $user->last_name   = $validated['last_name'];
            $user->email       = $email;
            $user->phone_number= $validated['phone_number'];
            $user->status      = 'Not contacted';
            $user->gender      = '-';
            $user->address_line= '-';
            $user->city        = '-';
            $user->source      = (int) $validated['source'];
            $user->country     = '-';
            $user->postal_code = $validated['postal'];
            $user->is_enrolled = 0;
            $user->role        = 2;
            $user->save();

            // Email notification to admins
            $mailData = array_merge($validated, [
                'source' => $user->source,
                'source_label' => User::getSourceLabel($user->source),
            ]);
            Mail::to([
                 'rkoenning@biopharmainfo.net',
                  'navaid@biopharmainfo.net',
                'abdurrehmanashraf.ghazitech@gmail.com'
            ])->send(new StudentEnrolled($mailData));

             //Optional: SMS Greeting (re-enable when needed)
             $smsService = new SmsService();
             $smsService->sendStudentGreeting($user->phone_number, $user->first_name);

            return redirect()->route('admin.linkedin-lead')
                ->with('success', 'Lead saved successfully.');
        } catch (\Throwable $e) {
            Log::error('LinkedIn lead save failed', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to save lead. Please try again.']);
        }
    }

    public function showLinkedInLeadForm()
    {
        return view('admin.linkedin_lead', [
            'sourceOptions' => User::socialSourceOptions(),
            'defaultSource' => User::SOURCE_LINKEDIN,
        ]);
    }
    public function deleteStudent(Request $request)
    {
        $id = $request->post('id');
        $stdata = User::find($id);

        $response = array();
        if (!empty ($stdata)) {
            if ($stdata->delete()) {
                $response['success'] = 1;
                $response['msg'] = 'Delete successfully';
            } else {
                $response['success'] = 0;
                $response['msg'] = 'Error deleting record';
            }
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }

    public function login()
    {
        return view('university.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
             'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 1) {

                session(['role' => 'admin']);
                return redirect()->route('admin_dashboard')->withSuccess('You have Successfully logged in');
            } elseif ($user->role == 2) {

                session(['role' => 'student']);
                return redirect()->route('student_dashboard')->withSuccess('You have Successfully logged in');
            }
        }

      return redirect()
             ->route('university_login')
             ->withErrors(['login' => 'Oops! You have entered invalid email or password.'])
             ->withInput($request->only('email'));
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('university_login')->with('success', 'You have been logged out successfully.');
    }

    public function show()
    {
        $countries = DB::table('countries')->get()->toArray();
        $countries = json_decode(json_encode($countries), true);

        // echo "<PRE>";print_r($countries);exit;

        // if (!empty ($countries)) {
        //     foreach ($countries as $countrie) {

        //         $countryName = $countrie['name'];
        //         $countryID = $countrie['id'];

        //         echo "countryName " . $countryName;
        //         echo "countryID " . $countryID;
        //         echo "<BR>";
        //         echo "---------------------------------------";

        //         $states = DB::table('states')->where('country_id', $countryID)->get()->toArray();
        //         $states = json_decode(json_encode($states), true);

        //         if (!empty ($states)) {
        //             foreach ($states as $state) {

        //                 $stateName = $state['name'];
        //                 $stateID = $state['id'];

        //                 echo "stateName " . $stateName;
        //                 echo "stateID " . $stateID;
        //                 echo "<BR>";

        //                 DB::table('cities')
        //                     ->where('state_id', $stateID) 
        //                     ->update([
        //                         'country_id' => $countryID,
        //                     ]);
        //             }

        //             echo "---------------------------------------";

        //         }
        //     }
        // }

        // exit;

        return view('university.get_enrolled')->with(compact('countries'));
    }

    public function store(Request $request)
    {
        // echo "<PRE>";
        // print_r($request->all());
        // exit;

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'dob' => 'required|date_format:Y-m-d',
            'gender' => 'required',
            'address_line' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        // Normalize email
        $email = trim($request->email);

        // Check if lead already exists
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            Session::flash("error_message", "Lead already exists!");
            return redirect()->back();
        }

        $data = $validatedData;
        $data['email'] = $email;
        $data['status'] = 'Not contacted';
        $data['source'] = User::SOURCE_WEBSITE;
        $data['is_enrolled'] = 0;
        $data['role'] = 2;

        User::create($data);

        try {
            Mail::to(['rkoenning@biopharmainfo.net','navaid@biopharmainfo.net','abdurrehmanashraf.ghazitech@gmail.com'])->send(new StudentEnrolled($request->all()));
        } catch (\Throwable $e) {
            Log::error('Student enrollment email failed', ['error' => $e->getMessage()]);
        }

        $message = "Your form has been submitted. One of our team member will get in touch with you";

        Session::flash("success_message", $message);
        return redirect()->back();
    }

    public function cities(Request $request)
    {
        
        // echo "<PRE>";
        // print_r($request->all());
        // exit;


        $states = DB::table('states')->where('name', $request->post('id'))->first();
        if (!empty ($states)) {
            $statesID = $states->id;

            $cities = DB::table('cities')->where('state_id', $statesID)->get()->toArray();
            if (!empty ($cities)) {
                $cities = json_decode(json_encode($cities), true);

                return response()->json(
                    array(
                        'status' => true,
                        'message' => "data found",
                        'cities' => $cities
                    )
                );
            } else {
                return response()->json(
                    array(
                        'status' => false,
                        'message' => "data not available",
                    )
                );
            }

        } else {
            return response()->json(
                array(
                    'status' => false,
                    'message' => "data not available",
                )
            );

        }



    }

    /* states */
    public function states(Request $request)
    {
        
        // echo "<PRE>";
        // print_r($request->all());
        // exit;


        $countries = DB::table('countries')->where('name', $request->post('id'))->first();
        if (!empty ($countries)) {
            $countriesID = $countries->id;

            $states = DB::table('states')->where('country_id', $countriesID)->get()->toArray();
            if (!empty ($states)) {
                $states = json_decode(json_encode($states), true);

                return response()->json(
                    array(
                        'status' => true,
                        'message' => "data found",
                        'states' => $states
                    )
                );
            } else {
                return response()->json(
                    array(
                        'status' => false,
                        'message' => "data not available",
                    )
                );
            }

        } else {
            return response()->json(
                array(
                    'status' => false,
                    'message' => "data not available",
                )
            );

        }



    }

    /*CheckEmailExist*/
    public
        function CheckEmailExist(
        Request $request
    ) {

        $data = $request->all();
        $emailCount = User::where('email', $data['email'])->count();
        if ($emailCount > 0) {
            return "false";
        } else {
            return "true";
        }

    }

    protected function getBulkLessonProgressMap(array $userIds, array $lessonIds): array
    {
        $userIds = array_values(array_unique(array_filter($userIds)));
        $lessonIds = array_values(array_unique(array_filter($lessonIds)));

        if (empty($userIds) || empty($lessonIds)) {
            return [];
        }

        $progressMap = [];

        $watchRows = DB::table('lesson_watch_progress')
            ->whereIn('user_id', $userIds)
            ->whereIn('lesson_id', $lessonIds)
            ->get([
                'user_id',
                'lesson_id',
                'first_started_at',
                'last_started_at',
                'completion_percent',
                'total_watch_seconds',
                'unique_watch_seconds',
                'video_duration_seconds',
                'last_position_seconds',
                'max_position_seconds',
                'play_count',
                'pause_count',
                'last_ended_at',
                'completed_at',
            ]);

        foreach ($watchRows as $row) {
            $progressMap[$row->user_id][$row->lesson_id] = [
                'first_started_at' => $row->first_started_at,
                'last_started_at' => $row->last_started_at,
                'percent' => round((float) $row->completion_percent, 2),
                'watch_seconds' => round((float) $row->total_watch_seconds, 2),
                'unique_watch_seconds' => round((float) $row->unique_watch_seconds, 2),
                'video_duration_seconds' => round((float) $row->video_duration_seconds, 2),
                'last_position_seconds' => round((float) $row->last_position_seconds, 2),
                'max_position_seconds' => round((float) $row->max_position_seconds, 2),
                'play_count' => (int) $row->play_count,
                'pause_count' => (int) $row->pause_count,
                'completed' => !empty($row->completed_at) || (float) $row->completion_percent >= 90,
                'last_ended_at' => $row->last_ended_at,
                'completed_at' => $row->completed_at,
            ];
        }

        $completionRows = DB::table('lesson_completion')
            ->whereIn('user_id', $userIds)
            ->whereIn('lesson_id', $lessonIds)
            ->get(['user_id', 'lesson_id', 'updated_at']);

        foreach ($completionRows as $row) {
            if (!isset($progressMap[$row->user_id][$row->lesson_id])) {
                $progressMap[$row->user_id][$row->lesson_id] = [
                    'first_started_at' => null,
                    'last_started_at' => null,
                    'percent' => 100,
                    'watch_seconds' => 0,
                    'unique_watch_seconds' => 0,
                    'video_duration_seconds' => 0,
                    'last_position_seconds' => 0,
                    'max_position_seconds' => 0,
                    'play_count' => 0,
                    'pause_count' => 0,
                    'completed' => true,
                    'last_ended_at' => $row->updated_at,
                    'completed_at' => $row->updated_at,
                ];
            }
        }

        return $progressMap;
    }

    protected function getBulkLessonSessionMap(array $userIds, array $lessonIds, int $limitPerLesson = 5): array
    {
        $userIds = array_values(array_unique(array_filter($userIds)));
        $lessonIds = array_values(array_unique(array_filter($lessonIds)));

        if (empty($userIds) || empty($lessonIds)) {
            return [];
        }

        $rows = DB::table('lesson_watch_sessions')
            ->whereIn('user_id', $userIds)
            ->whereIn('lesson_id', $lessonIds)
            ->orderByDesc('started_at')
            ->get([
                'session_key',
                'user_id',
                'lesson_id',
                'started_at',
                'ended_at',
                'end_reason',
                'started_position_seconds',
                'last_position_seconds',
                'max_position_seconds',
                'watch_seconds',
                'video_duration_seconds',
                'completion_percent',
            ]);

        $sessionMap = [];

        foreach ($rows as $row) {
            $userId = $row->user_id;
            $lessonId = $row->lesson_id;

            if (!isset($sessionMap[$userId][$lessonId])) {
                $sessionMap[$userId][$lessonId] = [];
            }

            if (count($sessionMap[$userId][$lessonId]) >= $limitPerLesson) {
                continue;
            }

            $sessionMap[$userId][$lessonId][] = [
                'session_key' => $row->session_key,
                'started_at' => $row->started_at,
                'ended_at' => $row->ended_at,
                'end_reason' => $row->end_reason,
                'started_position_seconds' => round((float) $row->started_position_seconds, 2),
                'last_position_seconds' => round((float) $row->last_position_seconds, 2),
                'max_position_seconds' => round((float) $row->max_position_seconds, 2),
                'watch_seconds' => round((float) $row->watch_seconds, 2),
                'video_duration_seconds' => round((float) $row->video_duration_seconds, 2),
                'completion_percent' => round((float) $row->completion_percent, 2),
            ];
        }

        return $sessionMap;
    }

    protected function getBulkLessonEventInsights(array $userIds, array $lessonIds, int $recentLimit = 20): array
    {
        $userIds = array_values(array_unique(array_filter($userIds)));
        $lessonIds = array_values(array_unique(array_filter($lessonIds)));

        if (empty($userIds) || empty($lessonIds)) {
            return ['counts' => [], 'recent' => []];
        }

        $countMap = [];
        $recentRows = DB::table('lesson_watch_events')
            ->whereIn('user_id', $userIds)
            ->whereIn('lesson_id', $lessonIds)
            ->orderByDesc('event_at')
            ->get([
                'user_id',
                'lesson_id',
                'event_type',
                'event_at',
                'from_position_seconds',
                'to_position_seconds',
                'watch_delta_seconds',
                'video_duration_seconds',
                'meta_json',
            ]);

        $recentMap = [];
        foreach ($recentRows as $row) {
            $userId = $row->user_id;
            $lessonId = $row->lesson_id;

            $meta = [];
            if (!empty($row->meta_json)) {
                $decodedMeta = json_decode($row->meta_json, true);
                if (is_array($decodedMeta)) {
                    $meta = $decodedMeta;
                }
            }

            if (!isset($countMap[$userId][$lessonId])) {
                $countMap[$userId][$lessonId] = [];
            }

            $countMap[$userId][$lessonId][$row->event_type] = (int) (($countMap[$userId][$lessonId][$row->event_type] ?? 0) + 1);

            if ($row->event_type === 'seeked') {
                $direction = $meta['seek_direction'] ?? null;
                if ($direction === 'backward') {
                    $countMap[$userId][$lessonId]['seek_backward'] = (int) (($countMap[$userId][$lessonId]['seek_backward'] ?? 0) + 1);
                } elseif ($direction === 'forward') {
                    $countMap[$userId][$lessonId]['seek_forward'] = (int) (($countMap[$userId][$lessonId]['seek_forward'] ?? 0) + 1);
                }
            }

            if (!isset($recentMap[$userId][$lessonId])) {
                $recentMap[$userId][$lessonId] = [];
            }

            if (count($recentMap[$userId][$lessonId]) >= $recentLimit) {
                continue;
            }

            $recentMap[$userId][$lessonId][] = [
                'event_type' => $row->event_type,
                'event_at' => $row->event_at,
                'from_position_seconds' => round((float) $row->from_position_seconds, 2),
                'to_position_seconds' => round((float) $row->to_position_seconds, 2),
                'watch_delta_seconds' => round((float) $row->watch_delta_seconds, 2),
                'video_duration_seconds' => round((float) $row->video_duration_seconds, 2),
                'meta' => $meta,
            ];
        }

        return ['counts' => $countMap, 'recent' => $recentMap];
    }

    protected function calculateAssignedModulesProgress(array $assignedLessonIds, array $progressMap): float
    {
        $assignedLessonIds = array_values(array_unique(array_filter($assignedLessonIds)));

        if (empty($assignedLessonIds)) {
            return 0;
        }

        $totalPercent = 0;
        foreach ($assignedLessonIds as $lessonId) {
            $totalPercent += (float) ($progressMap[$lessonId]['percent'] ?? 0);
        }

        return round($totalPercent / count($assignedLessonIds), 2);
    }

    public function showModules()
    {

         $user = Auth::user();
        
        
        if ($user->role == 2) {
            $assignedModuleIds = DB::table('assign_modules')
                ->where('student_id', $user->id)
                ->pluck('module_id')
                ->toArray();
            
            $lessons = AddModule::whereIn('id', $assignedModuleIds)->get();
            $bulkProgress = $this->getBulkLessonProgressMap([$user->id], $assignedModuleIds);
            $lessonProgress = $bulkProgress[$user->id] ?? [];
        } else {
            // For other roles (admin/staff), show all modules
            $lessons = AddModule::all();
            $lessonProgress = [];
        }
        // $lessons = AddModule::all();
        return view('student.module', compact('lessons', 'lessonProgress'));
    }
    public function studentDashboard()
    {
         $user = auth()->user();
         $userId = $user->id;
        $assignedModuleIds = DB::table('assign_modules')
            ->where('student_id', $userId)
            ->pluck('module_id')
            ->toArray();

        $progressMap = $this->getBulkLessonProgressMap([$userId], $assignedModuleIds);
        $userProgressMap = $progressMap[$userId] ?? [];

        $moduleCount = count($assignedModuleIds);
        $completedModules = collect($assignedModuleIds)->filter(function ($lessonId) use ($userProgressMap) {
            return !empty($userProgressMap[$lessonId]['completed']);
        })->count();
        $percentage = $this->calculateAssignedModulesProgress($assignedModuleIds, $userProgressMap);
         $showDashboardProgress = (int) ($user->is_dashboard ?? 1) !== 0;

         return view('student.index', compact('percentage', 'moduleCount', 'completedModules', 'showDashboardProgress'));
    }


    public function Studentlogout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
    public function updateProgress(Request $request)
    {
        $key = $request->input('key');
        $value = $request->input('value');


        session([$key => $value]);

        return response()->json(['success' => true]);
    }


    public function StudentResult()
{
    $studentId = Auth::id();

    // Fetch student quiz attempts
    $data = User::join('attempt_quizzes', 'users.id', '=', 'attempt_quizzes.user_id')
        ->where('users.id', $studentId)
        ->select(
            'users.id as user_id',
            'users.first_name',
            'users.image',
            'attempt_quizzes.question_id',
            'attempt_quizzes.selected_options',
            DB::raw("DATE_FORMAT(attempt_quizzes.created_at, '%Y-%m-%d %H:%i:%s') as quiz_date_time") 
        )
        ->orderBy('attempt_quizzes.created_at', 'desc') // Ensure latest attempts are prioritized
        ->get();

    // Get unique question IDs from quiz attempts
    $questionIds = $data->pluck('question_id')->unique();
    $image = $data->pluck('image')->unique();
    $examData = Exam::whereIn('id', $questionIds)->pluck('correctanswer', 'id');
    $groupedData = $data->groupBy('user_id');

    $results = [];

    foreach ($groupedData as $userId => $attempts) {
        $studentName = $attempts->first()->first_name ?? 'Unknown';
          $latestAttempts = $attempts->unique('question_id')->values();
        $correctCount = 0;
          $totalQuestions = $latestAttempts->count();
        $quizDates = []; // Store unique quiz dates

          foreach ($latestAttempts as $attempt) {
            $correctAnswer = $examData[$attempt->question_id] ?? null;
            
            if (!is_null($correctAnswer) && trim($correctAnswer) == trim($attempt->selected_options)) {
                $correctCount++;
            }

            // Store unique quiz date-time in array
            if (!in_array($attempt->quiz_date_time, $quizDates)) {
                $quizDates[] = $attempt->quiz_date_time;
            }
        }

        $results[] = [
            'student_name' => $studentName,
            'correct_answers' => $correctCount,
            'total_questions' => $totalQuestions,
            'quiz_dates' => $quizDates, // Store multiple dates
            'image' => $image, // Store multiple dates
        ];
    }
    // dd($results );
    return view('student.results', ['results' => $results]);
}
 public function exam_schedule(Request $request)
    {
        if ($request->ajax()) {
            $data = User::leftJoin('exam_schedule', 'users.id', '=', 'exam_schedule.student_id')
                ->select(
                    'users.id',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.phone_number',
                    \DB::raw("CASE WHEN exam_schedule.exam_stautus IS NULL OR exam_schedule.exam_stautus = 0 THEN 'Not Assigned' ELSE 'Assigned' END as exam_status_text")
                )
                ->where('is_enrolled', '1')
                ->orderBy('users.id', 'desc')
                ->get();
    
            return Datatables::of($data)
                ->addIndexColumn() // agar numbering column chahiye to rehne dein, warna isko bhi hata sakte hain
                ->make(true);
        }
    
        return view('admin.examSchedule');
    }
    public function examScheduleUpdate(Request $request)
    {
        $studentId = $request->id;
        $status = $request->exam_schedule;

        // Check if schedule exists
        $existing = DB::table('exam_schedule')->where('student_id', $studentId)->first();

        if ($existing) {
            DB::table('exam_schedule')
            ->where('student_id', $studentId)
            ->update(['exam_stautus' => $status]);
        } else {
            // if not exist, create new
            DB::table('exam_schedule')->insert([
                'student_id' => $studentId,  // make sure your column name is correct
                'exam_stautus' => $status
            ]);
            
        }

        return response()->json(['status' => 200, 'message' => 'Schedule updated successfully.']);
    }
     public function module_schedule(Request $request)
    {
        if ($request->ajax()) {
            $data = User::leftJoin('assign_modules', 'users.id', '=', 'assign_modules.student_id')
                ->select(
                    'users.id',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.phone_number',
                    \DB::raw("CASE WHEN assign_modules.student_id IS NULL OR assign_modules.student_id = 0 THEN 'UnSchedule' ELSE 'Schedule' END as schedule_status")
                )
                ->where('is_enrolled', '1')
                ->orderBy('users.id', 'desc')
                ->get();
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    
        $enrolledStudents = User::where('is_enrolled', 1)
            ->where('role', 2)
            ->get();

        $moduleAssignments = [];
        foreach ($enrolledStudents as $student) {
            $assignedModules = DB::table('assign_modules')
                ->where('student_id', $student->id)
                ->pluck('module_id')
                ->toArray();
            
            $moduleAssignments[$student->id] = $assignedModules;
        }

        $allModules = AddModule::all();
        $studentIds = $enrolledStudents->pluck('id')->toArray();
        $lessonIds = $allModules->pluck('id')->toArray();
        $moduleProgress = $this->getBulkLessonProgressMap($studentIds, $lessonIds);
        $moduleSessionDetails = $this->getBulkLessonSessionMap($studentIds, $lessonIds);
        $moduleEventInsights = $this->getBulkLessonEventInsights($studentIds, $lessonIds);
        $moduleEventCounts = $moduleEventInsights['counts'];
        $moduleRecentEvents = $moduleEventInsights['recent'];
        $studentOverallProgress = [];

        foreach ($enrolledStudents as $student) {
            $studentOverallProgress[$student->id] = $this->calculateAssignedModulesProgress(
                $moduleAssignments[$student->id] ?? [],
                $moduleProgress[$student->id] ?? []
            );

            foreach ($allModules as $module) {
                if (!isset($moduleProgress[$student->id][$module->id])) {
                    continue;
                }

                $counts = $moduleEventCounts[$student->id][$module->id] ?? [];
                $moduleProgress[$student->id][$module->id]['seek_forward_count'] = (int) ($counts['seek_forward'] ?? 0);
                $moduleProgress[$student->id][$module->id]['seek_backward_count'] = (int) ($counts['seek_backward'] ?? 0);
                $moduleProgress[$student->id][$module->id]['pagehide_count'] = (int) ($counts['pagehide'] ?? 0);
                $moduleProgress[$student->id][$module->id]['pause_event_count'] = (int) ($counts['pause'] ?? 0);
                $moduleProgress[$student->id][$module->id]['play_event_count'] = (int) ($counts['play'] ?? 0);
            }
        }

        return view('admin.ModuleSchedule', compact(
            'enrolledStudents',
            'moduleAssignments',
            'allModules',
            'moduleProgress',
            'moduleSessionDetails',
            'moduleRecentEvents',
            'studentOverallProgress'
        ));
    }

     public function updateModuleAssignments(Request $request)
        {
            try {
                $validated = $request->validate([
                    'student_id' => 'required|integer|exists:users,id',
                    'modules' => 'nullable|array',
                    'modules.*' => 'integer|exists:add_modules,id',
                ]);

                $studentId = (int) $validated['student_id'];
                $selectedModules = $validated['modules'] ?? [];

                // Delete existing assignments
                DB::table('assign_modules')->where('student_id', $studentId)->delete();

                // Insert new assignments
                foreach ($selectedModules as $moduleId) {
                    DB::table('assign_modules')->insert([
                        'student_id' => $studentId,
                        'module_id' => $moduleId,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }

                return response()->json([
                    'status' => 200,
                    'message' => 'Module assignments updated successfully'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Error updating module assignments: ' . $e->getMessage()
                ], 500);
            }
        }

       public function sendMessage(Request $request)
{
    try {
        $user = auth()->user();
        $message = $request->input('message');
        
        // Validate input (optional but good practice)
        if (empty($message)) {
            return response()->json([
                'success' => false,
                'message' => 'Message field is required.'
            ], 422);
        }

        // Get user details
        $userDetails = [
            'first_name'   => $user->first_name,
            'email'        => $user->email,
            'phone_number' => $user->phone_number,
            'message'      => $message
        ];

        // Send email to fixed recipient
        Mail::send('emails.student-message', ['userDetails' => $userDetails], function($mail) use ($userDetails) {
            $mail->to(['rkoenning@biopharmainfo.net','navaid@biopharmainfo.net','abdurrehmanashraf.ghazitech@gmail.com'])  // ✅ Fixed recipient
                 ->subject('New Student Message')
                 ->from($userDetails['email'], $userDetails['first_name']);
        });

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to send message: ' . $e->getMessage()
        ], 500);
    }
}

    
}
