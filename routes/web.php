<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\StudentCoursesController;
use App\Http\Controllers\Dashboard\StudentExamController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminStudentsController;
use App\Http\Controllers\admin\AdminCoursesController;
use App\Http\Controllers\admin\AdminSettingsController;
use App\Http\Controllers\admin\AdminCertificateController;
use App\Http\Controllers\admin\ExamController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/home', function () {
    return view('test');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/login','login')->name('login');
    Route::post('/login','processlogin')->name('login.store');
    Route::get('/contact-us','contact_us')->name('contact-us');
    Route::get('/about-us','about_us')->name('about-us');
});

Route::controller(RegisterController::class)->prefix('register')->group(function(){
    Route::get('/','register')->name('register');
    Route::post('/store','store')->name('store');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email'); // Create this view
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marks email as verified

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function(){
    Route::controller(DashboardController::class)->prefix('dashboard')->name('dashboard.')->group(function(){
        Route::get('/','index')->name('index');
        Route::controller(StudentCoursesController::class)->name('courses.')->group(function(){
            Route::get('/courses','index')->name('index');
        });
        Route::controller(StudentExamController::class)->name('exams.')->group(function(){
            Route::get('/exams','index')->name('index');
            Route::get('/exams/{id}/start','start')->name('start');
            Route::post('/exams/{id}/submit','submit')->name('submit');
            Route::get('/exams/{id}/result','result')->name('result');
        }); 
        Route::get('/students','students')->name('students');
    });
});

Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('/','index')->name('admin.index');
   });

Route::controller(AdminStudentsController::class)->prefix('admin/students')->group(function(){
    Route::get('/','index')->name('admin.students.index');
    Route::get('/show/{id}','show')->name('admin.students.show');
    Route::get('/{id}/edit','edit')->name('admin.students.edit');
    Route::put('/{id}/update','update')->name('admin.students.update');
    Route::delete('/{id}/destroy','destroy')->name('admin.students.destroy');
    Route::get('/search','search')->name('admin.students.search');
});

Route::controller(AdminCoursesController::class)->prefix('admin/courses')->group(function(){
    Route::get('/','index')->name('admin.courses.index');
    Route::get('/create','create')->name('admin.courses.create');
    Route::post('/store','store')->name('admin.courses.store');
    Route::get('/show/{id}','show')->name('admin.courses.show');
    Route::get('/{id}/edit','edit')->name('admin.courses.edit');
    Route::put('/{id}/update','update')->name('admin.courses.update');
    Route::delete('/{id}/destroy','destroy')->name('admin.courses.destroy');
    Route::get('/search','search')->name('admin.courses.search');
});

Route::controller(AdminSettingsController::class)->prefix('admin/settings')->group(function(){
    Route::get('/','index')->name('admin.settings.index');
    Route::get('/edit','edit')->name('admin.settings.edit');
    Route::put('/update','update')->name('admin.settings.update');
});

Route::controller(AdminCertificateController::class)->prefix('admin/certificates')->group(function(){
    Route::get('/','index')->name('admin.certificates.index');
    Route::get('/create','create')->name('admin.certificates.create');
    Route::post('/store','store')->name('admin.certificates.store');
    Route::get('/show/{id}','show')->name('admin.certificates.show');
    Route::get('/{id}/edit','edit')->name('admin.certificates.edit');
    Route::put('/{id}/update','update')->name('admin.certificates.update');
    Route::delete('/{id}/destroy','destroy')->name('admin.certificates.destroy');
    Route::get('/search','search')->name('admin.certificates.search');
});

Route::controller(ExamController::class)->prefix('admin/exams')->group(function(){
    Route::get('/','index')->name('admin.exams.index');
    Route::get('/create','create')->name('admin.exams.create');
    Route::post('/store','store')->name('admin.exams.store');
    Route::get('/{exam}/edit','edit')->name('admin.exams.edit');
    Route::put('/{exam}', 'update')->name('admin.exams.update');
    Route::get('/{exam}','show')->name('admin.exams.show');
    Route::post('exams/{exam}/questions', 'storeQuestion')->name('admin.exams.questions.store');
    Route::delete('/exams/{exam}/questions/{question}', 'deleteQuestion')->name('admin.exams.questions.delete');
    Route::delete('/exams/{exam}','destroy')->name('admin.exams.destroy');


});

Route::controller(AdminAuthController::class)->prefix('dashboard')->group(function(){
    Route::post('/logout','logout')->name('logout');
});


Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');