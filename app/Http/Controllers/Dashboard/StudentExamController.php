<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
{
    public function index()
    {
        $userPhase = Auth::user()->phase; // assuming user has phase column
        $exams = Exam::where('phase', $userPhase)->get();

        return view('Dashboard.exams.index', compact('exams'));
    }

    public function start($id)
    {
        $exam = Exam::with('questions.options')->findOrFail($id);
        dd([
            'now' => now(),
            'start_time' => $exam->start_time,
            'end_time' => $exam->end_time,
            'gt_end' => now()->gt($exam->end_time),
            'lt_start' => now()->lt($exam->start_time),
        ]);
        // Prevent access if exam not started yet
        if (now()->lt($exam->start_time)) {
            return redirect()->route('dashboard.exams.index')
                ->with('error', 'This exam has not started yet.');
        }

        // Prevent access if exam already closed
        if (now()->gt($exam->end_time)) {
            return redirect()->route('dashboard.exams.index')
                ->with('error', 'This exam has already ended.');
        }

        // Prevent duplicate attempts
        $attempt = ExamAttempt::firstOrCreate([
            'exam_id' => $exam->id,
            'user_id' => Auth::id(),
        ]);

        return view('Dashboard.exams.take', compact('exam', 'attempt'));
    }

    public function submit(Request $request, $id)
    {
        $exam = Exam::with('questions')->findOrFail($id);
        $attempt = ExamAttempt::where('exam_id', $id)->where('user_id', Auth::id())->first();

        $score = 0;

        foreach ($exam->questions as $question) {
            $selectedOption = $request->input('question_'.$question->id);
            if (! $selectedOption) {
                continue;
            }

            $isCorrect = $question->options()->where('id', $selectedOption)->where('is_correct', true)->exists();

            Answer::create([
                'exam_attempt_id' => $attempt->id,
                'question_id' => $question->id,
                'option_id' => $selectedOption,
            ]);

            if ($isCorrect) {
                $score++;
            }
        }

        $attempt->update([
            'score' => $score,
            'is_completed' => true,
        ]);

        return redirect()->route('dashboard.exams.result', $attempt->id)
            ->with('success', 'Exam submitted successfully!');
    }

    public function result($attemptId)
    {
        $attempt = ExamAttempt::with(['exam', 'answers.option'])->findOrFail($attemptId);

        return view('Dashboard.exams.result', compact('attempt'));
    }
}
