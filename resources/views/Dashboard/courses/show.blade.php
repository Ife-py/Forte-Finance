@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div>
                <h1 class="fw-bold text-success mb-1">
                    <i class="uil uil-book-open"></i> {{ $course->name }}
                </h1>
                <p class="text-muted mb-0">
                    <i class="uil uil-user"></i> Instructor:
                    <strong>{{ $course->instructor ?? 'N/A' }}</strong>
                </p>
            </div>
            <a href="{{ route('dashboard.courses.index') }}" class="btn btn-outline-success rounded-pill px-4 shadow-sm">
                <i class="uil uil-arrow-left"></i> Back to Courses
            </a>
        </div>

        <!-- Course Overview -->
        <div class="card border-0 shadow-lg rounded-4 p-4 mb-4">
            <div class="row g-4">
                @if ($course->image_path)
                    <div class="col-md-5">
                        <img src="{{ asset('storage/' . $course->image_path) }}"
                            class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" alt="Course Image">
                    </div>
                @endif

                <div class="col-md-7 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold text-success mb-2">{{ $course->name }}</h4>
                        <p class="text-muted small mb-2">
                            <i class="uil uil-graduation-cap"></i> Level: <strong>{{ $course->level ?? 'N/A' }}</strong>
                        </p>
                        <p class="text-muted small mb-2">
                            <i class="uil uil-calendar-alt"></i> Created:
                            <strong>{{ $course->created_at->format('M d, Y') }}</strong>
                        </p>

                        @if ($course->description)
                            <p class="text-muted mt-3">{{ $course->description }}</p>
                        @endif
                    </div>

                    <!-- Download Button -->
                    @if ($course->file_path || $course->document_path || $course->video_path || $course->audio_path)
                        <div class="mt-4">
                            <a href="{{ route('dashboard.courses.download', $course->id) }}"
                                class="btn btn-success rounded-pill px-4 shadow-sm">
                                <i class="uil uil-cloud-download"></i> Download Course Material
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <!-- Media Section -->
        <div class="card border-0 shadow-lg rounded-4 p-4">
            <h4 class="fw-bold text-success mb-4">
                <i class="uil uil-play-circle"></i> Learning Resources
            </h4>

            <!-- Audio -->
            @if ($course->audio_path)
                <div class="mb-4">
                    <h6 class="fw-semibold mb-2"><i class="uil uil-volume"></i> Audio Lesson</h6>
                    <audio controls class="w-100 rounded shadow-sm">
                        <source src="{{ asset('storage/' . $course->audio_path) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            @endif

            <!-- Video -->
            @if ($course->video_path)
                <div class="mb-4">
                    <h6 class="fw-semibold mb-2"><i class="uil uil-video"></i> Video Lesson</h6>
                    <video controls width="100%" height="400" class="rounded-4 shadow-sm">
                        <source src="{{ asset('storage/' . $course->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif

            <!-- PDF or Document Preview -->
            @if ($course->file_path)
                <div class="mt-4">
                    <h6 class="fw-semibold mb-3"><i class="uil uil-file-alt"></i> Course Document Preview</h6>
                    <iframe src="{{ asset('storage/' . $course->file_path) }}" frameborder="0" width="100%"
                        height="500px" class="rounded shadow-sm">
                    </iframe>
                </div>
            @endif
        </div>
    </div>

    <style>
        .btn-success {
            background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
            transform: translateY(-2px);
            color: #fff;
        }

        iframe {
            border-radius: 1rem;
        }
    </style>
@endsection
