<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class MailController extends Controller
{
    //
    public function sendMail(Request $request){
        $data = DB::table('users')->where('email', $request->email)->first();
        if ($data) {
            $password = rand(10000000, 99999999);
            $hashedPassword = Hash::make($password);
            DB::table('users')
            ->where('email', $data->email)
            ->update(['password' => $hashedPassword]);
            Mail::to($data->email)->send(new SignUp($password));
            return response()->json(['success' => true, 'message' => 'Password reset email sent successfully check your email to login']);
        } else {
                return response()->json(['success' => false, 'message' => 'No account found with this email.']);
        }
        
        
    }
}
