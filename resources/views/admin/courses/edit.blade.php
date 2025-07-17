@extends('Layout.admin')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h2 class="fw-bold text-success mb-3 text-center">
                            <i class="uil uil-edit"></i> Edit Course
                        </h2>
                        <p class="text-center text-muted mb-4">
                            Update the course details below and click <span class="fw-semibold">Save Changes</span> to apply.
                        </p>
                        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="instructor" class="form-label fw-semibold">Instructor</label>
                                <input type="text" name="instructor" id="instructor" class="form-control rounded-pill"
                                    value="{{ old('instructor', $course->instructor) }}" required>
                                @error('instructor')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Course Title</label>
                                <input type="text" name="title" id="title" class="form-control rounded-pill"
                                    value="{{ old('title', $course->title) }}" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" class="form-control rounded-4" rows="4" required>{{ old('description', $course->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- category --}}
                            <div class="mb-3">
                                <label for="category" class="form-label fw-semibold">Category</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="" disabled {{ old('category', $course->category) ? '' : 'selected' }}>
                                        Select a category</option>
                                    <option value="technology"
                                        {{ old('category', $course->category) == 'technology' ? 'selected' : '' }}>
                                        Technology</option>
                                    <option value="finance" {{ old('category', $course->category) == 'finance' ? 'selected' : '' }}>
                                        Finance</option>
                                    <option value="business" {{ old('category', $course->category) == 'business' ? 'selected' : '' }}>
                                        Business</option>
                                    <option value="marketing"
                                        {{ old('category', $course->category) == 'marketing' ? 'selected' : '' }}>
                                        Marketing</option>
                                    <option value="design" {{ old('category', $course->category) == 'design' ? 'selected' : '' }}>
                                        Design</option>
                                </select>
                                @error('category')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- level --}}
                            <div class="mb-3">
                                <label for="level" class="form-label fw-semibold">Level</label>
                                <select name="level" id="level" class="form-select rounded-pill" required>
                                    <option value="Omega" {{ old('level', $course->level) == 'Omega' ? 'selected' : '' }}>
                                        Omega</option>
                                    <option value="Sigma" {{ old('level', $course->level) == 'Sigma' ? 'selected' : '' }}>
                                        Sigma</option>
                                    <option value="Beta" {{ old('level', $course->level) == 'Beta' ? 'selected' : '' }}>
                                        Beta</option>
                                    <option value="Alpha" {{ old('level', $course->level) == 'Alpha' ? 'selected' : '' }}>
                                        Alpha</option>
                                </select>
                                @error('level')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Separate Media Inputs --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Course Image</label>
                                @if ($course->image_path)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image"
                                            class="img-fluid rounded shadow" style="max-height:120px;">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                <small class="text-muted">Upload a new image to replace the current one (optional).</small>
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Course Audio</label>
                                @if ($course->audio_path)
                                    <div class="mb-2">
                                        <audio controls style="max-width: 100%;">
                                            <source src="{{ asset('storage/' . $course->audio) }}">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                @endif
                                <input type="file" name="audio" id="audio" class="form-control" accept="audio/*">
                                <small class="text-muted">Upload a new audio file to replace the current one (optional).</small>
                                @error('audio')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Course Video</label>
                                @if ($course->video_path)
                                    <div class="mb-2">
                                        <video controls style="max-width: 100%; max-height: 120px;">
                                            <source src="{{ asset('storage/' . $course->video) }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                                <input type="file" name="video" id="video" class="form-control" accept="video/*">
                                <small class="text-muted">Upload a new video file to replace the current one (optional).</small>
                                @error('video')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Duration -->
                            <div class="mb-3">
                                <label for="duration" class="form-label fw-semibold">Duration (minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control"
                                    value="{{ old('duration', $course->duration) }}">
                                @error('duration')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Start Date -->
                            <div class="mb-3">
                                <label for="start_date" class="form-label fw-semibold">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    value="{{ old('start_date', $course->start_date) }}">
                                @error('start_date')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- End Date -->
                            <div class="mb-3">
                                <label for="end_date" class="form-label fw-semibold">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="{{ old('end_date', $course->end_date) }}">
                                @error('end_date')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold">
                                    <i class="uil uil-save"></i> Save Changes
                                </button>
                                <a href="{{ route('admin.courses.index') }}"
                                    class="btn btn-secondary ms-2 rounded-pill">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <small class="text-muted fst-italic">
                        "If you do not have a consistent goal in life, you can not live it in a consistent way." - Marcus Aurelius
                    </small>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            border-radius: 1.5rem;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(33, 150, 83, 0.15);
        }

        .btn-success {
            background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: background 0.2s, box-shadow 0.2s;
        }

        .btn-success:hover,
        .btn-success:focus {
            background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
            box-shadow: 0 4px 16px rgba(33, 150, 83, 0.15);
        }

        .rounded-4 {
            border-radius: 1.5rem !important;
        }
    </style>
@endsection
