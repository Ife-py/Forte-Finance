<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    public function index()
    {
        $students= User::all();
        return view('admin.students.index',compact("students")); // Ensure this view exists
    }



    public function show($id)
    {
        // Fetch the student
        $student = User::findOrFail($id);

        // Render the view with the student object
        return view('admin.students.show', compact('student'));
    }

    public function edit($id)
    {
        // Fetch the student
        $student = User::findOrFail($id);

        // Render the view with the student object
        return view('admin.students.edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            // Add other validation rules as needed
        ]);

        // Fetch the student
        $student = User::findOrFail($id);

        // Update the student data
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        // Update other fields as necessary

        // Save the changes
        $student->save();

        // Redirect back with a success message
        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }
    public function destroy($id)
    {
        // Fetch the student
        $student = User::findOrFail($id);

        // Delete the student
        $student->delete();

        // Redirect back with a success message
        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }

}
