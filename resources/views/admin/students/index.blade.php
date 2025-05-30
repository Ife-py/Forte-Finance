@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="text-success fw-bold mb-1">All Students</h1>
            <p class="text-muted mb-0">View, search, and manage all registered students efficiently.</p>
        </div>
        <a href="#" class="btn btn-success btn-lg shadow-sm">
            <i class="uil uil-plus-circle"></i> Add New Student
        </a>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8">
            <form action="" method="GET">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control rounded-start" 
                        placeholder="Search students by name or email..." 
                        value="{{ request('search') }}"
                        aria-label="Search students"
                    >
                    <button type="submit" class="btn btn-success rounded-end">
                        <i class="uil uil-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Students Grid -->
    <div class="row g-4">
        @forelse ($students as $student)
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 hover-popup">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3">
                            <div 
                                class="bg-success rounded-circle d-flex align-items-center justify-content-center" 
                                style="width: 50px; height: 50px;"
                            >
                                <i class="uil uil-user text-white" style="font-size: 1.8rem;"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="fw-bold mb-1">{{ $student->name }}</h5>
                                <small class="text-muted">{{ $student->email }}</small>
                            </div>
                        </div>
                        <p class="mb-3">
                            <span class="fw-semibold">Courses:</span> {{ $student->courses_count ?? 0 }}
                        </p>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-info btn-sm shadow-sm">
                                <i class="uil uil-eye"></i> View
                            </a>
                            <a href="{{ route('admin.students.edit',$student->id) }}" class="btn btn-warning btn-sm shadow-sm">
                                <i class="uil uil-edit"></i> Edit
                            </a>
                            <form action="" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm">
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
                    No students found.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    {{-- <div class="mt-4">
        {{ $students->links() }}
    </div> --}}
</div>
@endsection
