@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="text-success fw-bold mb-1">All Courses</h1>
            <p class="text-muted mb-0">View, search, and manage all registered courses efficiently.</p>
        </div>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success btn-lg shadow-sm">
            <i class="uil uil-plus-circle"></i> Create Course
        </a>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8">
            <form action="{{ route('admin.courses.search') }}" method="GET">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control rounded-start" 
                        placeholder="Search courses by name or instructor..." 
                        value="{{ request('search') }}"
                        aria-label="Search courses"
                    >
                    @if (request('search'))
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
                            <i class="uil uil-times"></i> Clear
                        </a>
                    @endif
                    <button type="submit" class="btn btn-success rounded-end">
                        <i class="uil uil-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 h-100 hover-popup">
                    <div class="card-body d-flex flex-column">
    
                        <!-- Course Image -->
                        @if ($course->image_path)
                            <div class="mb-3 text-center">
                                <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course Image" class="img-fluid rounded" style="max-height: 180px; object-fit: cover;">
                            </div>
                        @endif
    
                        <!-- Course Title -->
                        <h5 class="fw-bold text-success">{{ $course->name }}</h5>
    
                        <!-- Instructor and Enrollments -->
                        <p class="mb-1 text-muted">
                            <i class="uil uil-user"></i> 
                            Instructor: <span class="fw-semibold">{{ $course->instructor ?? 'N/A' }}</span>
                        </p>
                        <p class="mb-1 text-muted">
                            <i class="uil uil-users-alt"></i> 
                            Enrolled: <span class="fw-semibold">{{ $course->students_count ?? 0 }}</span>
                        </p>
    
                        <!-- Course Description -->
                        @if ($course->description)
                            <p class="text-muted small mt-2">
                                <i class="uil uil-file-alt"></i> 
                                {{ Str::words($course->description, 20) }}
                            </p>
                        @endif
    
                        <!-- Audio -->
                        @if ($course->audio_path)
                            <div class="mb-2">
                                <audio controls class="w-100">
                                    <source src="{{ asset('storage/' . $course->audio_path) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endif
    
                        <!-- Video -->
                        @if ($course->video_path)
                            <div class="mb-2">
                                <video width="100%" height="200" controls class="rounded">
                                    <source src="{{ asset('storage/' . $course->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
    
                        <!-- Actions -->
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-info btn-sm">
                                <i class="uil uil-eye"></i> View
                            </a>
                            <a href="{{  route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">
                                <i class="uil uil-edit"></i> Edit
                            </a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="uil uil-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
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
@endsection