<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Dashoard\DashboardController;

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

Route::controller(DashboardController::class)->prefix('dashboard')->group(function(){
    Route::get('/','index')->name('dashboard');
});
Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');