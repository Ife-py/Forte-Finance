<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    public function index()
    {
        return view('admin.courses.index'); // Ensure this view exists
    }
    // public function create()
    // {
    //     return view('admin.courses.create'); // Ensure this view exists
    // }
    // public function store(Request $request)
    // {
    //     // Logic to store course data
    //     // Validate and save the course data
    //     return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    // }
    // public function show($id)
    // {
    //     // Logic to show a specific course
    //     return view('admin.courses.show', compact('id')); // Ensure this view exists
    // }
    // public function edit($id)
    // {
    //     // Logic to edit a specific course
    //     return view('admin.courses.edit', compact('id')); // Ensure this view exists
    // }
    // public function update(Request $request, $id)
    // {
    //     // Logic to update course data
    //     // Validate and update the course data
    //     return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    // }
    // public function destroy($id)
    // {
    //     // Logic to delete a specific course
    //     return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    // }
    // public function enroll($id)
    // {
    //     // Logic to enroll a student in a course
    //     return redirect()->route('admin.courses.index')->with('success', 'Student enrolled in course successfully.');
    // }
    // public function unenroll($id)
    // {
    //     // Logic to unenroll a student from a course
    //     return redirect()->route('admin.courses.index')->with('success', 'Student unenrolled from course successfully.');
    // }
    // public function students($courseId)
    // {
    //     // Logic to show students enrolled in a specific course
    //     return view('admin.courses.students', compact('courseId')); // Ensure this view exists
    // }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     // Logic to search courses based on the query
    //     // For example, you might filter courses by name or description
    //     return view('admin.courses.search', compact('query')); // Ensure this view exists
    // }

}
