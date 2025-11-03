<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    public function index()
    {
        $students = User::paginate(10);

        return view('admin.students.index', compact('students'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'phase_select' => 'nullable|string|max:255',
            'custom_phase' => 'nullable|string|max:255',
        ]);

        $student = User::findOrFail($id);

        // Determine final phase
        $finalPhase = $validated['phase_select'] ?? null;

        if ($finalPhase === 'Custom' && ! empty($validated['custom_phase'])) {
            $finalPhase = $validated['custom_phase'];
        } elseif (empty($finalPhase) && ! empty($validated['custom_phase'])) {
            $finalPhase = $validated['custom_phase'];
        }

        // Update record
        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phase' => $finalPhase,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        // Fetch the student
        $student = User::findOrFail($id);

        // Delete the student
        $student->delete();

        // Redirect back with a success message
        return redirect()->route('admin.students.index')->with('error', 'Student deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $students = collect();  // Start with empty collection
        $message = null;

        if (! empty($query)) {
            $students = User::where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%');
            })->get();

            if ($students->isEmpty()) {
                $message = 'No students found matching your search.';
            }
        } else {
            $message = 'Please enter a search term to find students.';
        }

        return view('admin.students.index', [
            'students' => $students,
            'searchQuery' => $query,
            'message' => $message,
        ]);
    }
}
