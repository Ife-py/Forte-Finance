<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Certificate;
use App\Models\courses;
use App\Models\ExamAttempt;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        // Stats
        $totalStudents = User::count();
        $totalCourses = courses::count();
        $certificatesEarned = Certificate::where('student_id', $user->id)->count();

        // Recent Activities (could later be logged from models)
        $announcements = Announcement::latest()
            ->take(3)
            ->get();

        // Exams taken by this student
        $examAttempts = ExamAttempt::with('exam')
            ->where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

        $certificates = Certificate::where('student_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

        $recentActivities = collect()
            ->merge($certificates->map(fn ($c) => [
                'type' => 'Certificate',
                'title' => (string) ($c->title ?? 'Certificate Earned'),
                'time' => $c->created_at,
                'icon' => 'award',
            ]))
            ->merge($examAttempts->map(fn ($e) => [
                'type' => 'Exam Attempt',
                'title' => (string) (optional($e->exam)->title ?? 'Exam Completed'),
                'time' => $e->created_at,
                'icon' => 'edit',
            ]))
            ->merge($announcements->map(fn ($a) => [
                'type' => 'Announcement',
                'title' => (string) ($a->title ?? 'Untitled Announcement'),
                'time' => $a->created_at,
                'icon' => 'megaphone',
            ]))
            ->sortByDesc('time')
            ->take(5)
            ->values(); // Reset array keys

        // Latest courses for display
        $latestCourses = courses::latest()->take(4)->get();

        // Announcements (we’ll later make a proper Announcements model)
        $announcements = Announcement::latest()->take(2)->get();

        return view('Dashboard.index', compact(
            'user',
            'totalStudents',
            'totalCourses',
            'certificatesEarned',
            'recentActivities',
            'latestCourses',
            'announcements'
        ));

    }

    public function students()
    {
        return view('Dashboard.students');
    }
}
