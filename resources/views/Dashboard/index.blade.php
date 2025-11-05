@extends('Layout.dashboard')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('LogoFF.png') }}" alt="Logo" width="65" height="65"
                        class="rounded-circle border shadow-sm">
                    <div>
                        <h3 class="fw-bold text-success mb-0">Welcome, {{ $user->name }}</h3>
                        <small class="text-muted">Bringing Defi Closer to your doorstep 🚀</small>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="mt-3 mt-md-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger px-4">
                        <i class="uil uil-signout me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Metrics Section -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-3">
                    <i class="uil uil-users-alt text-success" style="font-size:2rem"></i>
                    <h6 class="fw-semibold text-success mt-2">Total Students</h6>
                    <h3 class="fw-bold">{{ $totalStudents }}</h3>
                    <small class="text-muted">Active learners</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-3">
                    <i class="uil uil-book-open text-success" style="font-size:2rem"></i>
                    <h6 class="fw-semibold text-success mt-2">Courses Available</h6>
                    <h3 class="fw-bold">{{ $totalCourses }}</h3>
                    <small class="text-muted">Open for enrollment</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-3">
                    <i class="uil uil-award text-success" style="font-size:2rem"></i>
                    <h6 class="fw-semibold text-success mt-2">Certificates Earned</h6>
                    <h3 class="fw-bold">{{ $certificatesEarned }}</h3>
                    <small class="text-muted">By you</small>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0">
                        <h5 class="fw-bold text-success mb-0">
                            <i class="uil uil-history me-2"></i> Recent Activities
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($recentActivities as $activity)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="uil uil-{{ $activity['icon'] }} text-success me-2"></i>
                                    <strong>{{ ucfirst($activity['title']) }}</strong><br>
                                    <small class="text-muted">
                                        {{ $activity['type'] }} • {{ $activity['time']->diffForHumans() }}
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0">
                        <h5 class="fw-bold text-success mb-0">
                            <i class="uil uil-bullhorn me-2"></i> Announcements
                        </h5>
                    </div>
                    <div class="card-body">
                        @forelse ($announcements as $announcement)
                            <div class="mb-3">
                                <h6 class="fw-semibold text-dark mb-1">{{ ucfirst($announcement['title']) }}</h6>
                                <small class="text-muted">{{ $announcement['date'] }}</small>
                                <p class="text-muted small mb-0">
                                    {{ $announcement->body ?? ($announcement->content ?? 'No content available.') }}
                                </p>
                            </div>
                        @empty
                            <p class="text-muted">No announcements available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Courses -->
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white border-0">
                <h5 class="fw-bold text-success mb-0">
                    <i class="uil uil-book-reader me-2"></i> Latest Courses
                </h5>
            </div>
            <div class="card-body row">
                @foreach ($latestCourses as $course)
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow-sm h-100">
                            @if ($course->image_path)
                                <img src="{{ asset('storage/' . $course->image_path) }}" class="card-img-top"
                                    alt="{{ $course->name }}">
                            @endif
                            <div class="card-body">
                                <h6 class="fw-bold text-success">{{ $course->name }}</h6>
                                <p class="small text-muted mb-2">{{ Str::limit($course->description, 60) }}</p>
                                <a href="{{ route('dashboard.courses.show', $course->id) }}"
                                    class="btn btn-outline-success btn-sm">View Course</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
