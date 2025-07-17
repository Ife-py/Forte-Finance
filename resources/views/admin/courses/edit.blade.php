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
                    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Course Title</label>
                            <input type="text" name="title" id="title" class="form-control rounded-pill" value="{{ old('title', $course->title) }}" required>
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
                        <div class="mb-3">
                            <label for="media" class="form-label fw-semibold">Course Media (Image, Audio, or Video)</label>
                            @if($course->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="img-fluid rounded shadow" style="max-height:120px;">
                                </div>
                            @endif
                            @if($course->audio_path)
                                <div class="mb-2">
                                    <audio controls style="max-width: 100%;">
                                        <source src="{{ asset('storage/' . $course->audio) }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                            @if($course->video_path)
                                <div class="mb-2">
                                    <video controls style="max-width: 100%; max-height: 120px;">
                                        <source src="{{ asset('storage/' . $course->video) }}">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                            <input type="file" name="media" id="media" class="form-control" accept="image/*,audio/*,video/*">
                            <small class="text-muted">Upload an image, audio, or video file to replace the current media (optional).</small>
                            @error('media')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold">
                                <i class="uil uil-save"></i> Save Changes
                            </button>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary ms-2 rounded-pill">Cancel</a>
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
        box-shadow: 0 0 0 0.15rem rgba(33,150,83,0.15);
    }
    .btn-success {
        background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-success:hover, .btn-success:focus {
        background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
        box-shadow: 0 4px 16px rgba(33, 150, 83, 0.15);
    }
    .rounded-4 {
        border-radius: 1.5rem !important;
    }
</style>
@endsection
