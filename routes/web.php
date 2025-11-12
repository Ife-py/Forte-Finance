<?php

use App\Http\Controllers\admin\AdminCertificateController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminCoursesController;
use App\Http\Controllers\admin\AdminSettingsController;
use App\Http\Controllers\admin\AdminStudentsController;
use App\Http\Controllers\admin\AnnouncementController;
use App\Http\Controllers\admin\ExamController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Dashboard\CertificateController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\StudentCoursesController;
use App\Http\Controllers\Dashboard\StudentExamController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('test');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'processlogin')->name('login.store');
    Route::get('/contact-us', 'contact_us')->name('contact-us');
    Route::get('/about-us', 'about_us')->name('about-us');
});

Route::controller(RegisterController::class)->prefix('register')->group(function () {
    Route::get('/', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
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

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::controller(StudentCoursesController::class)->name('courses.')->group(function () {
            Route::get('/courses', 'index')->name('index');
            Route::get('/courses/{id}', 'show')->name('show');
            Route::get('/courses/{id}/download', 'download')->name('download');
        });
        Route::controller(StudentExamController::class)->name('exams.')->group(function () {
            Route::get('/exams', 'index')->name('index');
            Route::get('/exams/{id}/start', 'start')->name('start');
            Route::post('/exams/{id}/submit', 'submit')->name('submit');
            Route::get('/exams/{id}/result', 'result')->name('result');
        });

        Route::controller(CertificateController::class)->name('certificates.')->group(function () {
            Route::get('/certificates', 'index')->name('index');
            Route::get('/certificates/{id}/download', 'download')->name('download');
            Route::get('/certificates/{id}/view', 'view')->name('view');
        });

        Route::controller(SettingsController::class)->name('settings.')->group(function () {
            Route::get('/settings', 'index')->name('index');
            Route::get('/settings/profile', 'profile')->name('profile');
            Route::post('/settings/profile-update', 'updateProfile')->name('profile.update');
            Route::get('/settings/password', 'password')->name('password');
            Route::post('/settings/password-update', 'updatePassword')->name('password.update');
        });

        Route::get('/students', 'students')->name('students');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->name('login.submit');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::middleware('admin.auth')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });

        Route::controller(AdminStudentsController::class)->prefix('/students')->group(function () {
            Route::get('/', 'index')->name('students.index');
            Route::get('/show/{id}', 'show')->name('students.show');
            Route::get('/{id}/edit', 'edit')->name('students.edit');
            Route::put('/{id}/update', 'update')->name('students.update');
            Route::delete('/{id}/destroy', 'destroy')->name('students.destroy');
            Route::get('/search', 'search')->name('students.search');
        });

        Route::controller(AdminCoursesController::class)->prefix('/courses')->group(function () {
            Route::get('/', 'index')->name('courses.index');
            Route::get('/create', 'create')->name('courses.create');
            Route::post('/store', 'store')->name('courses.store');
            Route::get('/show/{id}', 'show')->name('courses.show');
            Route::get('/{id}/edit', 'edit')->name('courses.edit');
            Route::put('/{id}/update', 'update')->name('courses.update');
            Route::delete('/{id}/destroy', 'destroy')->name('courses.destroy');
            Route::get('/search', 'search')->name('courses.search');
        });

        Route::controller(AdminSettingsController::class)->prefix('/settings')->group(function () {
            Route::get('/', 'index')->name('settings.index');
            Route::get('/edit', 'edit')->name('settings.edit');
            Route::put('/update', 'update')->name('settings.update');
        });

        Route::controller(AdminCertificateController::class)->prefix('/certificates')->group(function () {
            Route::get('/', 'index')->name('certificates.index');
            Route::get('/create', 'create')->name('certificates.create');
            Route::post('/store', 'store')->name('certificates.store');
            Route::get('/show/{id}', 'show')->name('certificates.show');
            Route::get('/{id}/edit', 'edit')->name('certificates.edit');
            Route::put('/{id}/update', 'update')->name('.certificates.update');
            Route::delete('/{id}/destroy', 'destroy')->name('certificates.destroy');
            Route::get('/search', 'search')->name('certificates.search');
        });

        Route::controller(ExamController::class)->prefix('exams')->group(function () {
            Route::get('/', 'index')->name('exams.index');
            Route::get('/create', 'create')->name('exams.create');
            Route::post('/store', 'store')->name('exams.store');
            Route::get('/{exam}/edit', 'edit')->name('exams.edit');
            Route::put('/{exam}', 'update')->name('exams.update');
            Route::get('/{exam}', 'show')->name('exams.show');
            Route::post('exams/{exam}/questions', 'storeQuestion')->name('exams.questions.store');
            Route::delete('/exams/{exam}/questions/{question}', 'deleteQuestion')->name('exams.questions.delete');
            Route::delete('/exams/{exam}', 'destroy')->name('exams.destroy');

        });

        Route::controller(AnnouncementController::class)->prefix('/announcements')->group(function () {
            Route::get('/', 'index')->name('announcements.index');
            Route::get('/create', 'create')->name('announcements.create');
            Route::post('/store', 'store')->name('announcements.store');
            Route::get('/{id}', 'show')->name('announcements.show');
            Route::get('/{id}/edit', 'edit')->name('announcements.edit');
            Route::put('/{id}/update', 'update')->name('announcements.update');
            Route::delete('/{id}/destroy', 'destroy')->name('announcements.destroy');
        });
    });
});

Route::controller(AdminAuthController::class)->prefix('dashboard')->group(function () {
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');
