<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    // Show all exams
    public function index()
    {
        $exams = Exam::all();
        return view('admin.exams.index', compact('exams'));
    }

    // Show create exam form
    public function create()
    {
        return view('admin.exams.create');
    }

    // Store new exam
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'phase_type' => 'required|string|in:predefined,custom',
            'phase' => 'nullable|required_if:phase_type,predefined|string|in:Alpha,Sigma,Beta,Omega',
            'custom_phase' => 'nullable|required_if:phase_type,custom|string|max:255',
        ]);
        
        $phase = $request->phase_type === 'custom' 
        ? $request->custom_phase 
        : $request->phase;
            
        
        Exam::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'duration' => $validated['duration'],
            'phase' => $phase,
        ]);

        return redirect()->route('admin.exams.index')->with('success', 'Exam created successfully!');
    }

    // Show single exam with its questions
    public function show(Exam $exam)
    {
        $exam->load('questions.options');
        return view('admin.exams.show', compact('exam'));
    }

    public function storeQuestion(Request $request, Exam $exam)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'correct_option' => 'required|integer|min:0',
        ]);

        $question = $exam->questions()->create([
            'question_text' => $validated['question_text'],
        ]);

        foreach ($validated['options'] as $index => $text) {
            $question->options()->create([
                'option_text' => $text,
                'is_correct' => $index == $validated['correct_option'],
            ]);
        }

        return back()->with('success', 'Question added successfully!');
    }
    
    public function deleteQuestion(Exam $exam, Question $question)
    {
        $question->delete();
        return back()->with('error', 'Question deleted successfully.');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('admin.exams.index')->with('error', 'Exam deleted successfully.');
    }
}

