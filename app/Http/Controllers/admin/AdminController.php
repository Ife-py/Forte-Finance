<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\courses;
use App\Models\User;
use App\Models\Certificate;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalCourses = courses::count();
        $totalStudents = User::count();
        $totalCertificates = Certificate::count();
        return view('admin.index', compact("totalCourses","totalStudents","totalCertificates"));
    }
}
