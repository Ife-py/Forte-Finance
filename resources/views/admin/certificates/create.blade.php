@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <h1 class="text-success fw-bold mb-3">Issue New Certificate</h1>
            <p class="text-muted mb-4">Fill in the details below to award a certificate to a student.</p>
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="student_id" class="form-label fw-semibold">Student</label>
                            <select name="student_id" id="student_id" class="form-select" required>
                                <option value="" disabled selected>Select a student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }} ({{ $student->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label fw-semibold">Course</label>
                            <select name="course_id" id="course_id" class="form-select" required>
                                <option value="" disabled selected>Select a course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Certificate Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description (optional)</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="certificate_image" class="form-label fw-semibold">Certificate Image</label>
                            <input type="file" name="certificate_image" id="certificate_image" class="form-control" accept="image/*" required>
                            @error('certificate_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="issued_at" class="form-label fw-semibold">Date Issued</label>
                            <input type="date" name="issued_at" id="issued_at" class="form-control" value="{{ old('issued_at', now()->format('Y-m-d')) }}" required>
                            @error('issued_at')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="uil uil-award"></i> Issue Certificate
                            </button>
                            <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection