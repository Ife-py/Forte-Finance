<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\courses;
use Illuminate\Support\Facades\Auth;

class StudentCoursesController extends Controller
{
    public function index()
    {
        $userPhase = Auth::user()->phase; // assuming user has phase column
        $courses = courses::where('level', $userPhase)->get();

        return view('Dashboard.courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = courses::findOrFail($id);

        return view('Dashboard.courses.show', compact('course'));
    }

    public function download($id)
    {
        $course = courses::findOrFail($id);

        if (! $course->file_path || ! \Storage::disk('public')->exists($course->file_path)) {
            return back()->with('error', 'File not found.');
        }

        $filePath = storage_path('app/public/'.$course->file_path);

        return response()->download($filePath, basename($course->file_path));
    }
}
