<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        return view("Dashboard.index", compact('user'));
    }
    public function students(){
        return view("Dashboard.students");
    }

    public function courses(){
        return view("Dashboard.courses");
    }
}
