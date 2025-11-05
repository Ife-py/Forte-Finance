@extends('Layout.admin')

@section('content')
    <div class="container py-5">
        <!-- Welcome Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h1 class="display-5 fw-bold text-success mb-2">Welcome, Admin!</h1>
                <p class="lead text-secondary mb-0">
                    Oversee users, students, courses, and platform analytics at a glance. Use the dashboard below for quick
                    insights and navigation.
                </p>
            </div>
        </div>

        <!-- Analytics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow h-100 gradient-card text-white">
                    <div class="card-body text-center">
                        <i class="uil uil-users-alt" style="font-size: 2.5rem;"></i>
                        <h6 class="mt-3 mb-1">Total Students</h6>
                        <h2 class="fw-bold mb-0">{{ $totalStudents ?? 0 }}</h2>
                        <small class="text-white-50">Registered</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow h-100 gradient-card-2 text-white">
                    <div class="card-body text-center">
                        <i class="uil uil-book-open" style="font-size: 2.5rem;"></i>
                        <h6 class="mt-3 mb-1">Total Courses</h6>
                        <h2 class="fw-bold mb-0">{{ $totalCourses ?? 0 }}</h2>
                        <small class="text-white-50">Available</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow h-100 gradient-card-3 text-white">
                    <div class="card-body text-center">
                        <i class="uil uil-award" style="font-size: 2.5rem;"></i>
                        <h6 class="mt-3 mb-1">Certificates</h6>
                        <h2 class="fw-bold mb-0">{{ $totalCertificates ?? 0 }}</h2>
                        <small class="text-white-50">Issued</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow h-100 gradient-card-4 text-white">
                    <div class="card-body text-center">
                        <i class="uil uil-chart-line" style="font-size: 2.5rem;"></i>
                        <h6 class="mt-3 mb-1">Active Enrollments</h6>
                        <h2 class="fw-bold mb-0">{{ $activeEnrollments ?? 0 }}</h2>
                        <small class="text-white-50">Ongoing</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-popup">
                    <div class="card-body text-center">
                        <i class="uil uil-users-alt text-success" style="font-size: 2.2rem;"></i>
                        <h6 class="fw-bold mt-2">Students</h6>
                        <p class="text-muted small mb-2">Manage, monitor, and enroll students.</p>
                        <a href="{{ route('admin.students.index') }}" class="btn btn-success btn-sm px-4">View Students</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-popup">
                    <div class="card-body text-center">
                        <i class="uil uil-book-open text-success" style="font-size: 2.2rem;"></i>
                        <h6 class="fw-bold mt-2">Courses</h6>
                        <p class="text-muted small mb-2">Create, update, or remove courses and materials.</p>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-success btn-sm px-4">Manage Courses</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-popup">
                    <div class="card-body text-center">
                        <i class="uil uil-bullhorn text-success" style="font-size: 2.2rem;"></i>
                        <h6 class="fw-bold mt-2">Announcements</h6>
                        <p class="text-muted small mb-2">Post updates, alerts, or system messages.</p>
                        <a href="{{ route('admin.announcements.index') }}" class="btn btn-success btn-sm px-4">Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100 hover-popup">
                    <div class="card-body text-center">
                        <i class="uil uil-setting text-success" style="font-size: 2.2rem;"></i>
                        <h6 class="fw-bold mt-2">Settings</h6>
                        <p class="text-muted small mb-2">Configure platform settings and preferences.</p>
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-success btn-sm px-4">Platform
                            Settings</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Analytics Section -->
        <div class="row g-4 mt-4">
            <div class="col-12">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-success mb-3"><i class="uil uil-chart"></i> Platform Analytics</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Most popular course:
                                        <span class="fw-semibold">{{ $mostPopularCourse ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Highest performing student:
                                        <span class="fw-semibold">{{ $topStudent ?? 'N/A' }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Recent enrollments:
                                        <span class="fw-semibold">{{ $recentEnrollments ?? 0 }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Active instructors:
                                        <span class="fw-semibold">{{ $activeInstructors ?? 0 }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .gradient-card {
            background: linear-gradient(135deg, #198754 60%, #43cea2 100%);
        }

        .gradient-card-2 {
            background: linear-gradient(135deg, #43cea2 60%, #185a9d 100%);
        }

        .gradient-card-3 {
            background: linear-gradient(135deg, #f7971e 60%, #ffd200 100%);
        }

        .gradient-card-4 {
            background: linear-gradient(135deg, #185a9d 60%, #43cea2 100%);
        }

        .hover-popup:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 24px rgba(33, 150, 83, 0.15);
            transition: all 0.2s;
        }
    </style>
@endsection
