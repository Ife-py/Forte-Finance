<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{ 
    public function logout(){
        Auth::logout();
        session()->invalidate();
        return redirect()->route("login");
    }
}
