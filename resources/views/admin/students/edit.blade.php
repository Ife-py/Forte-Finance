@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <a href="{{ route('admin.students.index', $student->id) }}" class="btn btn-outline-success mb-3">
                <i class="uil uil-arrow-left"></i> Back to Student Profile
            </a>
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h2 class="fw-bold mb-4 text-success"><i class="uil uil-edit"></i> Edit Student</h2>
                    <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                            @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="courses" class="form-label fw-semibold">Enrolled Courses</label>
                            <select name="courses[]" id="courses" class="form-select" multiple>
                                {{-- @foreach($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ in_array($course->id, old('courses', $student->courses->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach --}}
                            </select>
                            <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple courses.</small>
                            @error('courses')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success"><i class="uil uil-save"></i> Save Changes</button>
                            <a href="{{ route('admin.students.index', $student->id) }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection