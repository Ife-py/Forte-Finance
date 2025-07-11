@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <h1 class="text-success fw-bold mb-3">Edit Certificate</h1>
            <p class="text-muted mb-4">Update certificate details and image for the selected student and course.</p>
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="student_id" class="form-label fw-semibold">Student</label>
                            <select name="student_id" id="student_id" class="form-select" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id', $certificate->student_id) == $student->id ? 'selected' : '' }}>
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
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id', $certificate->course_id) == $course->id ? 'selected' : '' }}>
                                        {{ $course->title ?? $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="certificate_title" class="form-label fw-semibold">Certificate Title</label>
                            <input type="text" name="certificate_title" id="certificate_title" class="form-control" value="{{ old('certificate_title', $certificate->certificate_title ?? $certificate->title) }}" required>
                            @error('certificate_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description (optional)</label>
                            <textarea name="certificate_description" id="certificate_description" class="form-control" rows="3">{{ old('description', $certificate->certificate_description) }}</textarea>
                            @error('certificate_description')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="certificate_image" class="form-label fw-semibold">Certificate Image</label>
                            @if($certificate->certificate_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $certificate->certificate_image) }}" alt="Certificate Image" class="img-fluid rounded shadow" style="max-height:120px;">
                                </div>
                            @endif
                            <input type="file" name="certificate_image" id="certificate_image" class="form-control" accept="image/*">
                            <small class="text-muted">Upload a new image to replace the current one.</small>
                            @error('certificate_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="issued_at" class="form-label fw-semibold">Issued Date</label>
                            <input type="date" name="issued_at" id="issued_at" class="form-control" value="{{ old('issued_at', \Carbon\Carbon::parse($certificate->issued_at)->format('Y-m-d')) }}" required>
                            @error('issued_at')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="uil uil-save"></i> Update Certificate
                            </button>
                            <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-4 text-center">
                <small class="text-muted">Life is available only in the present moment. - Thich Nhat Hanh</small>
            </div>
        </div>
    </div>
</div>
@endsection
