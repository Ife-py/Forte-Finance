@extends('Layout.dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-success fw-bold">Courses</h1>
        <a href="#" class="btn btn-success btn-lg shadow-sm"><i class="uil uil-plus-circle"></i> Add New Course</a>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search courses..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success"><i class="uil uil-search"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="row">
        {{-- @forelse ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success fw-bold">{{ $course->name }}</h5>
                        <p class="card-text text-muted">Instructor: <strong>{{ $course->instructor }}</strong></p>
                        <p class="card-text text-muted">Enrolled Students: <strong>{{ $course->students_count }}</strong></p>
                        <div class="mt-auto">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm"><i class="uil uil-eye"></i> View</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm"><i class="uil uil-edit"></i> Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash-alt"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty --}}
            <div class="col-12">
                <p class="text-center text-muted">No courses found.</p>
            </div>
        {{-- @endforelse --}}
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{-- {{ $courses->links() }} --}}
    </div>
</div>
@endsection