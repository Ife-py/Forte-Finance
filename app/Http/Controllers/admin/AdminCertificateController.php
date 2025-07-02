<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use App\Models\courses;
use Illuminate\Http\Request;

class AdminCertificateController extends Controller
{
    public function index()
    {
        // Logic to list all certificates
        return view('admin.certificates.index');
    }

    public function create()
    {
        $students = User::all();
        $courses = courses::all();
        return view('admin.certificates.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData= $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'certificate_title' => 'required|string|max:255',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // 2MB max
            'issued_at' => 'required|date',
        ]);
        // Handle the certificate image upload
        $imagePath = null;
        if ($request->hasFile('certificate_image')) {
            $imagePath = $request->file('certificate_image')->store('certificates/images','public');
        }
        // Create the certificate
        $certificate = new Certificate();
        $certificate->student_id = $validatedData['student_id'];
        $certificate->course_id = $validatedData['course_id'];
        $certificate->certificate_title = $validatedData['certificate_title'];
        $certificate->certificate_image = $imagePath;
        $certificate->issued_at = $validatedData['issued_at'];
        $certificate->save();
        // Redirect back with success message 
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully.');
    }

    public function show($id)
    {
        // Logic to show a specific certificate
        return view('admin.certificates.show', compact('id'));
    }

    public function edit($id)
    {
        // Logic to show form for editing a specific certificate
        return view('admin.certificates.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific certificate
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete a specific certificate
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
