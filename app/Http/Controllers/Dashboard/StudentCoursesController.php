<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\courses;

class StudentCoursesController extends Controller
{
    public function index()
    {
        return view("Dashboard.courses");
    }
}
