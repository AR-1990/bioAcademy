<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\OpenApi\TikTokLeadController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add-quiz', [ExamController::class, 'store'])->name('add-quiz');
Route::match(['get','post'],'/SaveMyLeadHook', [App\Http\Controllers\StudentController::class, 'SaveMyLeadHook'])->name('SaveMyLeadHook');
Route::post('/open-api/tiktok-lead', [TikTokLeadController::class, 'store'])->name('open-api.tiktok-lead');


// Twilio webhooks (API group, no CSRF)
Route::post('/twilio/inbound-sms', [SmsController::class, 'inbound'])->name('api.twilio.inbound-sms');
Route::post('/twilio/status-callback', [SmsController::class, 'statusCallback'])->name('api.twilio.status-callback');
