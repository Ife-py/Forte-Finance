<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\auth\RegisterController;

Route::get('/home', function () {
    return view('test');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/login','login')->name('login');
    Route::get('/contact-us','contact_us')->name('contact-us');
    Route::get('/about-us','about_us')->name('about-us');
});

Route::controller(RegisterController::class)->prefix('register')->group(function(){
    Route::get('/','register')->name('register');
    Route::get('/store','store')->name('store');
});

Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');