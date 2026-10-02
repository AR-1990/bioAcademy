<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AttemptQuizController;
use App\Http\Controllers\EditAccountController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PlanVisitController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\FeedbackController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('university.index');
});

Route::get('/about', function () {
    return view('university.about');
});

Route::get('/about-who-we-are', function () {
    return view('university.about-who-we-are');
});

Route::get('/about-leadership', function () {
    return view('university.about-leadership');
});

Route::get('/about-why-choose', function () {
    return view('university.about-why-choose');
});





Route::get('/alumni', function () {
    return view('university.alumni');
});

// Route::get('/about', function () {
//     return view('university.about');
// });

Route::get('/contact', function () {
    return view('university.contact');
});

Route::get('/course', function () {
    return view('university.course');
});

Route::get('/course-self-paced-learning', function () {
    return view('university.course-self-paced-learning');
});

Route::get('/course-hands-on-training', function () {
    return view('university.course-hands-on-training');
});

Route::get('/course-certification-examination', function () {
    return view('university.course-certification-examination');
});


Route::get('/course-career-salary', function () {
    return view('university.course-career-salary');
});

Route::get('/course-webinar-archive', function () {
    return view('university.course-webinar-archive');
});

Route::get('/course-fee-structure', function () {
    return view('university.course-fee-structure');
});




Route::get('/faqs', function () {
    return view('university.faqs');
})->name('university.faqs');

Route::get('/catalog', [CatalogController::class, 'index'])->name('university.catalog');
Route::post('/catalog/download', [CatalogController::class, 'download'])->name('university.catalog.download');
Route::get('/catalog/file', [CatalogController::class, 'file'])->name('university.catalog.file');

Route::get('/ebook', function () {
    return view('university.ebook');
})->name('university.ebook');

Route::get('/signup', function () {
    return view('university.signup');
});

Route::get('/collections', function () {
    return view('university.collections');
});
Route::get('/privacy-policy', function () {
    return view('university.privacy-policy');
})->name('privacy-policy');

Route::get('/biopharma-academy-open-house', function () {
    return view('university.biopharma-academy-open-house');
})->name('biopharma-academy-open-house');

Route::get('/feedback-form', function () {
    return view('university.feedback-form');
})->name('feedback-form');
Route::post('/feedback-form', [FeedbackController::class, 'store'])->name('feedback-form.store');


Route::get('/login',[StudentController::class,'login'])->name('university_login');
Route::get('/forgot-password', function () {
    return view('university.forgot-password');
});
Route::post('/user-login',[StudentController::class,'userLogin'])->name('user-login');
Route::post('/logout', [StudentController::class,'logout'])->name('logout');
Route::get('/getenrolled',[StudentController::class ,'show'])->name('university_getenrolled');
Route::post('/get_enrolled',[StudentController::class ,'store'])->name('university_get_enrolled');

Route::match(array('get', 'post'), '/states/{slug?}', array(StudentController::class, 'states'))->name('states');
Route::match(array('get', 'post'), '/cities/{slug?}', array(StudentController::class, 'cities'))->name('cities');
Route::match(array('get', 'post'), '/CheckEmailExist', array(StudentController::class, 'CheckEmailExist'))->name('CheckEmailExist');

Route::middleware(['web', 'admin'])->group(function () {
Route::post('/change-status', [StudentController::class, 'ChangeStatus'])->name('change-status');
Route::post('/user/status/update', [StudentController::class, 'updateStatus'])->name('user.status.update');
Route::get('/module_schedule', [StudentController::class,'module_schedule'])->name('module_schedule');
Route::post('/update-module-assignments', [StudentController::class, 'updateModuleAssignments'])->name('update-module-assignments');
Route::post('/updateStudent', [StudentController::class, 'updateStudent'])->name('updateStudent');
Route::post('/deleteStudent', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
Route::post('updateStudentData',[StudentController::class,'updateData'])->name('updateStudentData');
Route::get('/admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard');
// LinkedIn Lead form routes
Route::get('/admin/linkedin-lead', [StudentController::class, 'showLinkedInLeadForm'])->name('admin.linkedin-lead');
Route::post('/admin/linkedin-lead', [StudentController::class, 'LinkDinLeadHook'])->name('admin.linkedin-lead.store');
Route::get('/edit-account',[EditAccountController::class,'index'])->name('edit-account');
Route::post('/edit-admin/{id}',[EditAccountController::class,'AdminEditAccount'])->name('edit-admin');
Route::get('/get_student',[StudentController::class,'index'])->name('get_student');
Route::get('/Enrolled_student', [StudentController::class,'reg_student'])->name('Enrolled_student');
Route::get('/exam_schedule', [StudentController::class,'exam_schedule'])->name('exam_schedule');
Route::post('/exam-schedule-update', [StudentController::class, 'examScheduleUpdate'])->name('examScheduleUpdate');
// Route::get('/change-status', [StudentController::class,'changeStatus'])->name('change-status');
Route::post('/update-progress', [StudentController::class,"updateProgress"])->name('update-progress');
Route::post('/add-lesson',[ModuleController::class,'store'])->name('add-lesson');
Route::get('/show-lesson/{lessonId}',[ChatController::class,'show_module'])->name('show-lesson');
Route::get('/module',[ModuleController::class,'index'])->name('module');
Route::post('/admin-reply', [chatController::class, 'AdminReply'])->name('admin-reply');
Route::delete('/delete-question/{id}',[CommentController::class,'deleteQuestion'])->name('delete-question');
Route::get('/results',[ExamController::class,'results'])->name('results');
Route::get('/add_quiz',[ExamController::class,'showaddquiz'])->name('add_quiz');
// Route::post('/add-quiz', [ExamController::class, 'store'])->name('add-quiz');
Route::get('/quiz_show/{id}',[ExamController::class,'index'])->name('quiz-show');
Route::get('/quiz', [ExamController::class, 'show_quiz'])->name('quiz');
Route::POST('/submit-quiz',  [ExamController::class, 'submitQuiz'])->name('submit-quiz');
Route::get('/visits', [PlanVisitController::class,'index'])->name('visits');
Route::get('/admin/feedbacks', [FeedbackController::class, 'index'])->name('admin.feedbacks');
Route::post('/visits/{visit}', [PlanVisitController::class, 'update'])->name('visits.update');
Route::delete('/visits/{visit}', [PlanVisitController::class, 'destroy'])->name('visits.destroy');
Route::get('/showStudentsResult/{id}',[ExamController::class,'showStudentsResult'])->name('showStudentsResult');
    // Route::get('/visits', function () {
    //     return view('admin.visits');
    // });
});


Route::get('/student_profile/{id}', [StudentController::class,'student_profile']);

Route::get('/plan_visit', function () {
    return view('university.plan_visit');
});

Route::middleware(['web', 'student'])->group(function () {
Route::get('/student_dashboard',[StudentController::class,'studentDashboard'])->name('student_dashboard');
Route::get('/edit-student',[EditAccountController::class,'editStudent'])->name('edit-student');
Route::post('/edit-students/{id}',[EditAccountController::class,'StudentEditAccount'])->name('edit-students');
Route::get('/student_lesson/{lessonsId}',[ChatController::class,'showLesson'])->name('student-lessons');
Route::get('/student_module',[StudentController::class,'showModules'])->name('student-modules');
Route::get('/student-quiz-show',[ExamController::class,'studentQuiz'])->name('student-quiz-show');
Route::get('/student-quiz/{id}',[ExamController::class,'showQuiz'])->name('student-quiz');
Route::get('/student-result-details',[ExamController::class,'showResultDetails'])->name('student-result-details');

Route::Post('/student-submit-quiz',[ExamController::class,'StudentSubmitQuiz'])->name('student-submit-quiz');
Route::Post('/student-question',[CommentController::class,'askQuestion'])->name('student-question');
Route::post('/student-reply', [ChatController::class,'studentReply'])->name('student-reply');
// Route::get('/no-exam-found', [ChatController::class,'noExamfound'])->name('no-exam-found');
Route::get('/student_quiz_show', function () {
return view('student.quiz_show');
});
Route::get('/student_quiz', function () {
return view('student.quiz');
});
Route::get('/student-results',[StudentController::class,'StudentResult'])->name('student-results'); 

});


// Email Template route

Route::get('/email-template', function () {
    return view('admin.email-template.forgot-password');
});


// User Insight route

Route::get('/news-insights', function () {
    return view('university.news-insights');
})->name('university.news.insights');

Route::get('news-insights/galleria-houston-career', function () {
    return view('university.news-insights.galleria-houston-career');
})->name('news.insights.galleria');


Route::get('news-insights/university-of-houston', function () {
    return view('university.news-insights.houston');
})->name('news.insights.houston');

Route::get('news-insights/open-house', function () {
    return view('university.news-insights.open-house');
})->name('news.insights.open-house');

Route::get('news-insights/future-healthcare-professionals', function () {
    return view('university.news-insights.future-healthcare-professionals');
})->name('news.insights.future-healthcare-professionals');



// Blog route


// Route::get('/blogs', function () {
//     return view('university.blogs.index');
// })->name('blogs.index');


Route::get('blogs/the-scope-of-clinical-research', function () {
    return view('university.blogs.the-scope-of-clinical-research');
});

Route::get('blogs/essential-skills-you-gain', function () {
    return view('university.blogs.essential-skills-you-gain');
});

Route::get('blogs/the-global-demand-for-clinical-researchers', function () {
    return view('university.blogs.the-global-demand-for-clinical-researchers');
});

Route::post('/create_plan_visit', [PlanVisitController::class,"store"])->name("create_plan_visit"); 


// Blog Edit Route

Route::get('/admin/add-blogs', 'App\Http\Controllers\HomeController@createBlogForm')->name("/admin/add-blogs");
Route::get('/admin/blog-categories', 'App\Http\Controllers\HomeController@blogCategoriesIndex')->name('admin.blog-categories.index');
Route::post('/admin/blog-categories', 'App\Http\Controllers\HomeController@storeBlogCategory')->name('admin.blog-categories.store');
Route::post('/admin/blog-categories/{id}/update', 'App\Http\Controllers\HomeController@updateBlogCategory')->name('admin.blog-categories.update');
Route::post('/admin/blog-categories/{id}/delete', 'App\Http\Controllers\HomeController@deleteBlogCategory')->name('admin.blog-categories.delete');

// Route::get('/edit_blog', function () {
//     return view('admin_blogs.editblog');
// });
Route::post('/lesson-played',[ChatController::class,'lessonPlayed'])->name('lesson.played');

Route::get('/blog', 'App\Http\Controllers\HomeController@view_blog')->name('/admin/blogs');
Route::get('/editblog/{id}', 'App\Http\Controllers\HomeController@edit')->name('editblog');
Route::get('changeStatus', 'App\Http\Controllers\HomeController@changeBlogStatus')->name('changeStatus');
Route::post('/updateblog', 'App\Http\Controllers\HomeController@update_blog')->name('updateblog');
Route::post("/admin/create-blogs",'App\Http\Controllers\HomeController@create_blog')->name("/admin/create-blogs");
Route::post("/sendMail",'App\Http\Controllers\MailController@sendMail')->name("/sendMail");
Route::get("/blogs",'App\Http\Controllers\HomeController@blogs')->name('blogs.index');
Route::get('blogs/{slug}','App\Http\Controllers\HomeController@blogDetail')->name('blogs.detail');
Route::get('/sitemap', function () {
    return view('university.sitemap');
});


// USER AUTH ROUTES
Route::prefix('user')->group(function () {
    Route::view('/login', 'user.auth.login')->name('user.login');
    Route::view('/register', 'user.auth.register')->name('user.register');
    Route::view('/forgot-password', 'user.auth.forgot-password')->name('user.forgot.password');
    Route::view('/reset-password', 'user.auth.reset-password')->name('user.reset.password');
    Route::view('/two-steps', 'user.auth.two-steps')->name('user.two.steps');
    Route::view('/verify-email', 'user.auth.verify-email')->name('user.verify.email');

    // USER DASHBOARD & MODULES
    Route::view('/dashboard', 'user.index')->name('user.dashboard');
    Route::view('/blog', 'user.blog')->name('user.blog.index');
    Route::view('/blog/form', 'user.blog-form')->name('user.blog.form');
    Route::view('/blog/edit', 'user.blog-edit')->name('user.blog.edit');
    Route::view('/blog/detail', 'user.blog-detail')->name('user.blog.details');
    Route::view('/lead', 'user.lead')->name('user.lead.index');
    Route::view('/profile', 'user.profile')->name('user.profile');

    // USER ACCOUNT SETTINGS
    Route::view('/account-settings', 'user.account-settings')->name('user.account.settings');
    Route::view('/account-settings/security', 'user.account-settings-security')->name('user.account.settings.security');
    Route::view('/account-settings/notifications', 'user.account-settings-notifications')->name('user.account.settings.notifications');
    Route::view('/account-settings/connections', 'user.account-settings-connections')->name('user.account.settings.connections');

    // Dummy logout
    Route::get('/logout', function () {
        return redirect('/user/login');
    })->name('user.logout');
});
Route::post('/student/send-message', [StudentController::class, 'sendMessage'])->name('student.send.message');
Route::get('/admin/student/{id}/profile', [App\Http\Controllers\AdminController::class, 'showStudentProfile'])->name('admin.student.profile');
Route::post('/admin/student/update', [App\Http\Controllers\AdminController::class, 'updateStudentProfile'])->name('admin.student.update');
Route::post('/admin/student/change-password', [App\Http\Controllers\AdminController::class, 'changeStudentPassword'])->name('admin.student.password');
Route::get('/admin/mass-text', [SmsController::class, 'index'])->name('admin.mass-text');
Route::post('/admin/mass-text/send', [SmsController::class, 'send'])->name('admin.mass-text.send');
Route::get('/admin/sms-logs', [SmsController::class, 'logs'])->name('admin.sms-logs');
Route::get('/admin/sms-inbox', [SmsController::class, 'inbox'])->name('admin.sms-inbox');
Route::get('/admin/sms-conversation/{phone}', [SmsController::class, 'conversation'])->name('admin.sms-conversation');
// Twilio inbound webhook
Route::post('/twilio/inbound-sms', [SmsController::class, 'inbound'])->name('twilio.inbound-sms');
Route::post('/twilio/status-callback', [SmsController::class, 'statusCallback'])->name('twilio.status-callback');
