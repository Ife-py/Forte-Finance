<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminStudentsController;
use App\Http\Controllers\admin\AdminCoursesController;
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

Route::middleware('auth','verified')->group(function(){
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function(){
    Route::get('/','index')->name('dashboard');
    Route::get('/students','students')->name('students');
    Route::get('/courses','courses')->name('courses');
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
});

Route::controller(AdminAuthController::class)->prefix('dashboard')->group(function(){
    Route::post('/logout','logout')->name('logout');
});


Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');