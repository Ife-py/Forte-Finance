<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function index(){
        return view("test");
    }
    public function contact_us(){
        return view('contact-us');
    }
    public function about_us(){
        return view('about-us');
    }
}
