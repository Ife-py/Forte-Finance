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
            <form action="{{ route('admin.courses.index') }}" method="GET">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control rounded-start" 
                        placeholder="Search courses by name or instructor..." 
                        value="{{ request('search') }}"
                        aria-label="Search courses"
                    >
                    <button type="submit" class="btn btn-success rounded-end">
                        <i class="uil uil-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- <!-- Courses Grid -->
    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold text-success">{{ $course->name }}</h5>
                        <p class="mb-1 text-muted"><i class="uil uil-user"></i> Instructor: {{ $course->instructor ?? 'N/A' }}</p>
                        <p class="mb-2 text-muted"><i class="uil uil-users-alt"></i> Enrolled: {{ $course->students_count ?? 0 }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-info btn-sm me-1"><i class="uil uil-eye"></i> View</a>
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm me-1"><i class="uil uil-edit"></i> Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash-alt"></i> Delete</button>
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
    </div> --}}

    {{-- <!-- Pagination -->
    <div class="mt-4">
        {{ $courses->links() }}
    </div> --}}
</div>
@endsection