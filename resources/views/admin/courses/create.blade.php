@extends('Layout.admin')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-success mb-3">
                    <i class="uil uil-arrow-left"></i> Back to Courses
                </a>
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="fw-bold mb-4 text-success"><i class="uil uil-plus-circle"></i> Create New Course</h2>
                        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Course Name -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Course Name</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Instructor -->
                            <div class="mb-3">
                                <label for="instructor" class="form-label fw-semibold">Instructor</label>
                                <input type="text" name="instructor" id="instructor" class="form-control"
                                    value="{{ old('instructor') }}">
                                @error('instructor')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label fw-semibold">Category</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="technology" {{ old('category') == 'technology' ? 'selected' : '' }}>
                                        Technology</option>
                                    <option value="finance" {{ old('category') == 'finance' ? 'selected' : '' }}>Finance
                                    </option>
                                    <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Business
                                    </option>
                                    <option value="marketing" {{ old('category') == 'marketing' ? 'selected' : '' }}>
                                        Marketing</option>
                                    <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>Design
                                    </option>
                                </select>
                                @error('category')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Level -->
                            <div class="mb-3">
                                <label for="level" class="form-label fw-semibold">Level</label>
                                <select name="level" id="level" class="form-select" required>
                                    <option value="" disabled selected>Select a level</option>
                                    <option value="Omega" {{ old('level') == 'Omega' ? 'selected' : '' }}>Omega
                                    </option>
                                    <option value="Sigma" {{ old('level') == 'Sigma' ? 'selected' : '' }}>Sigma
                                    </option>
                                    <option value="Beta" {{ old('level') == 'Beta' ? 'selected' : '' }}>Beta
                                    </option>
                                    <option value="Alpha" {{ old('level') == 'Alpha' ? 'selected' : '' }}>Alpha
                                    </option>
                                    
                                </select>
                                @error('level')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label fw-semibold">Course Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Audio -->
                            <div class="mb-3">
                                <label for="audio" class="form-label fw-semibold">Audio File</label>
                                <input type="file" name="audio" id="audio" class="form-control">
                                @error('audio')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Video -->
                            <div class="mb-3">
                                <label for="video" class="form-label fw-semibold">Video File</label>
                                <input type="file" name="video" id="video" class="form-control">
                                @error('video')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Duration -->
                            <div class="mb-3">
                                <label for="duration" class="form-label fw-semibold">Duration (minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control"
                                    value="{{ old('duration') }}">
                                @error('duration')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Start Date -->
                            <div class="mb-3">
                                <label for="start_date" class="form-label fw-semibold">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- End Date -->
                            <div class="mb-3">
                                <label for="end_date" class="form-label fw-semibold">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Buttons -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="uil uil-save"></i> Create Course
                                </button>
                                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
