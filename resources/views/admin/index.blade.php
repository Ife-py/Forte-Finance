@extends('Layout.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <h1 class="display-4 fw-bold text-success mb-3">Welcome to the Fortefinance Admin Dashboard</h1>
            <p class="lead text-muted">
                Manage users, students, courses, reports, and platform settings all in one place. Use the sidebar to navigate through the admin features and keep your platform running smoothly.
            </p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100 text-center hover-popup">
                <div class="card-body">
                    <i class="uil uil-users-alt text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold mt-3">Students</h5>
                    <p class="text-muted">View all registered students, monitor progress, and manage enrollments.</p>
                    <a href="{{ route('admin.students.index') }}" class="btn btn-outline-success btn-sm mt-2">View Students</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100 text-center hover-popup">
                <div class="card-body">
                    <i class="uil uil-book-open text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold mt-3">Courses</h5>
                    <p class="text-muted">Create, update, or remove courses and manage course materials.</p>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-success btn-sm mt-2">Manage Courses</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100 text-center hover-popup">
                <div class="card-body">
                    <i class="uil uil-chart text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold mt-3">Reports</h5>
                    <p class="text-muted">Access analytics and reports on platform usage, student performance, and more.</p>
                    <a href="" class="btn btn-outline-success btn-sm mt-2">View Reports</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100 text-center hover-popup">
                <div class="card-body">
                    <i class="uil uil-award text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold mt-3">Certificates</h5>
                    <p class="text-muted">Issue, review, and manage certificates for completed courses.</p>
                    <a href="" class="btn btn-outline-success btn-sm mt-2">Manage Certificates</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100 text-center hover-popup">
                <div class="card-body">
                    <i class="uil uil-setting text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold mt-3">Settings</h5>
                    <p class="text-muted">Configure platform settings, roles, permissions, and more.</p>
                    <a href="" class="btn btn-outline-success btn-sm mt-2">Platform Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection