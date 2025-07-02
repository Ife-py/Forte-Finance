<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\courses;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    public function index()
    {
        $courses= courses::paginate(10);
        return view('admin.courses.index',compact("courses"));
    }

    public function create()
    {
        return view('admin.courses.create'); 
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'level' => 'nullable|string|in:Omega,Sigma,Beta,Alpha',
            'duration' => 'nullable|integer|min:1', // Duration in minutes
            'instructor' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            // Validation for file uploads
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'audio' => 'nullable|mimetypes:audio/mpeg,audio/wav|max:256000', // 250MB
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:512000', // 500MB
            // Add other validation as needed
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses/images', 'public');
        }

        // Handle audio upload
        $audioPath = null;
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('courses/audios', 'public');
        }

        // Handle video upload
        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('courses/videos', 'public');
        }

        // Save to database
        $course = new courses();
        $course->title = $validatedData['title'];
        $course->description = $validatedData['description'] ?? null;
        $course->category = $validatedData['category'] ?? null;
        $course->level = $validatedData['level'] ?? null;
        $course->image_path = $imagePath;
        $course->audio_path = $audioPath;
        $course->video_path = $videoPath;
        $course->duration = $request->input('duration');
        $course->instructor = $request->input('instructor');
        $course->start_date = $request->input('start_date');
        $course->end_date = $request->input('end_date');
        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }

    public function show($id)
    {
        // Logic to show a specific course
        $course = courses::findOrFail($id);

        return view('admin.courses.show', compact('course')); // Ensure this view exists
    }
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
    public function search(Request $request)
    {
        $query = $request->input('search');
        $courses= collect();
        $message=null;

        if(!empty($query)){
            $courses = courses::where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('category', 'like', '%' . $query . '%')
                ->orWhere('level', 'like', '%' . $query . '%')
                ->orWhere('instructor', 'like', '%' . $query . '%')
                ->get();

            if ($courses->isEmpty()) {
                $message = "No courses found for your search query.";
            }
        } else {
            $message = "Please enter a search term.";
        }
        
        // For example, you might filter courses by name or description
        return view('admin.courses.index', [
            'courses' => $courses,
            'searchQuery' => $query,
            'message' => $message,
        ]); // Ensure this view exists
    }

}
