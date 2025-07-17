@extends('Layout.admin')

@section('content')
<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="uil uil-check-circle"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="uil uil-exclamation-triangle"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="text-success fw-bold mb-1">All Courses</h1>
            <p class="text-muted mb-0">View, search, and manage all registered courses efficiently.</p>
        </div>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success btn-lg shadow-sm rounded-pill px-4">
            <i class="uil uil-plus-circle"></i> Create Course
        </a>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8">
            <form action="{{ route('admin.courses.search') }}" method="GET">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control rounded-start-pill"
                        placeholder="Search courses by name or instructor..." value="{{ request('search') }}"
                        aria-label="Search courses">
                    @if (request('search'))
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
                            <i class="uil uil-times"></i> Clear
                        </a>
                    @endif
                    <button type="submit" class="btn btn-success rounded-end-pill">
                        <i class="uil uil-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-lg border-0 h-100 course-card position-relative">
                    <div class="card-body d-flex flex-column p-4">
                        <!-- Course Image -->
                        @if ($course->image_path)
                            <div class="mb-3 text-center">
                                <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course Image"
                                    class="img-fluid rounded-4 shadow-sm" style="max-height: 170px; object-fit: cover;">
                            </div>
                        @endif

                        <!-- Course Title -->
                        <h5 class="fw-bold text-success mb-2">{{ $course->name }}</h5>

                        <!-- Instructor and Enrollments -->
                        <p class="mb-1 text-muted small">
                            <i class="uil uil-user"></i>
                            <span class="fw-semibold">Instructor:</span> {{ $course->instructor ?? 'N/A' }}
                        </p>
                        <p class="mb-1 text-muted small">
                            <i class="uil uil-users-alt"></i>
                            <span class="fw-semibold">Enrolled:</span> {{ $course->students_count ?? 0 }}
                        </p>

                        <!-- Course Description -->
                        @if ($course->description)
                            <p class="text-muted small mt-2">
                                <i class="uil uil-file-alt"></i>
                                {{ Str::words($course->description, 18) }}
                            </p>
                        @endif

                        <!-- Audio -->
                        @if ($course->audio_path)
                            <div class="mb-2">
                                <audio controls class="w-100 rounded shadow-sm">
                                    <source src="{{ asset('storage/' . $course->audio_path) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endif

                        <!-- Video -->
                        @if ($course->video_path)
                            <div class="mb-2">
                                <video width="100%" height="180" controls class="rounded-4 shadow-sm">
                                    <source src="{{ asset('storage/' . $course->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="mt-auto d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-info btn-sm rounded-pill px-3">
                                <i class="uil uil-eye"></i> View
                            </a>
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm rounded-pill px-3">
                                <i class="uil uil-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3" onclick="return confirm('Delete this course?')">
                                    <i class="uil uil-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                        <span class="badge bg-success position-absolute top-0 end-0 m-2 shadow-sm" style="font-size: 0.9rem;">
                            #{{ $course->id }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center mb-0">
                    No courses found.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>

<style>
    .course-card {
        border-radius: 1.5rem;
        transition: transform 0.18s, box-shadow 0.18s;
        background: linear-gradient(135deg, #f8f9fa 80%, #e6fff5 100%);
        overflow: hidden;
    }
    .course-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 8px 32px rgba(33, 150, 83, 0.18);
        background: linear-gradient(135deg, #e6fff5 60%, #f8f9fa 100%);
    }
    .course-card .badge.bg-success {
        font-weight: 500;
        letter-spacing: 0.5px;
        opacity: 0.92;
    }
    .rounded-4 {
        border-radius: 1.2rem !important;
    }
    .btn-info {
        background: linear-gradient(90deg, #43cea2 60%, #198754 100%);
        border: none;
        color: #fff;
        font-weight: 600;
    }
    .btn-info:hover, .btn-info:focus {
        background: linear-gradient(90deg, #198754 60%, #43cea2 100%);
        color: #fff;
    }
    .btn-warning {
        background: linear-gradient(90deg, #ffd600 60%, #ffb300 100%);
        border: none;
        color: #333;
        font-weight: 600;
    }
    .btn-warning:hover, .btn-warning:focus {
        background: linear-gradient(90deg, #ffb300 60%, #ffd600 100%);
        color: #222;
    }
    .btn-danger {
        background: linear-gradient(90deg, #e53935 60%, #ff7043 100%);
        border: none;
        color: #fff;
        font-weight: 600;
    }
    .btn-danger:hover, .btn-danger:focus {
        background: linear-gradient(90deg, #ff7043 60%, #e53935 100%);
        color: #fff;
    }
    .btn-success {
        background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .btn-success:hover, .btn-success:focus {
        background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
        color: #fff;
    }
    .input-group .form-control {
        border-radius: 2rem 0 0 2rem !important;
        border-right: 0;
    }
    .input-group .btn {
        border-radius: 0 2rem 2rem 0 !important;
    }
    @media (max-width: 991px) {
        .course-card {
            border-radius: 1rem;
        }
        .rounded-4 {
            border-radius: 0.8rem !important;
        }
    }
</style>
@endsection