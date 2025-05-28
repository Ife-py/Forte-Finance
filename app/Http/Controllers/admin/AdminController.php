<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Ensure this view exists
    }
    public function courses()
    {
        return view('admin.courses'); // Ensure this view exists
    }
    public function students()
    {
        return view('admin.students'); // Ensure this view exists
    }
}
