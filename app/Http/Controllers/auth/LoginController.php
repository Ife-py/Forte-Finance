<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function processLogin(Request $request){
        $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        ]);

        $user= User::where('name', $request->username)->first();
        if(!$user){
            return redirect()->back()->with('error', 'User not found');
        }
        if(!Auth::attempt(['name' => $request->username, 'password' => $request->password])){
            return redirect()->back()->with('error', 'Invalid Password');
        }
        return redirect()
        ->route('dashboard') ->with('success', 'Login successful');
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
