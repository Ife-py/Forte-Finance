@extends('Layout.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-success mb-0">📘 All Exams</h2>
            <a href="{{ route('admin.exams.create') }}" class="btn btn-success shadow-sm px-4">
                <i class="uil uil-plus-circle me-1"></i> Create New Exam
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @if ($exams->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="uil uil-file-question fs-1 mb-2"></i>
                <p>No exams created yet. Click “Create New Exam” to start.</p>
            </div>
        @else
            <div class="row">
                @foreach ($exams as $exam)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-success">{{ $exam->title }}</h5>
                                <p class="text-muted flex-grow-1">{{ Str::limit($exam->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-success border">
                                        ⏱ {{ $exam->duration }} mins
                                    </span>
                                    <a href="{{ route('admin.exams.show', $exam) }}" class="btn btn-outline-success btn-sm">
                                        <i class="uil uil-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.exams.edit', $exam) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="uil uil-edit-alt"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this exam?')"
                                        class="d-inline">
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
                @endforeach
            </div>
        @endif
    </div>
@endsection
