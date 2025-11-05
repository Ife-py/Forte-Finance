@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div>
                <h1 class="text-success fw-bold mb-1">
                    <i class="uil uil-book-open"></i> My Course Materials
                </h1>
                <p class="text-muted mb-0">Browse and access all your learning resources in one place.</p>
            </div>

            <form action="{{ route('dashboard.courses.index') }}" method="GET" class="mt-3 mt-md-0">
                <div class="input-group shadow-sm" style="max-width: 400px;">
                    <input type="text" name="search" class="form-control rounded-start-pill"
                        placeholder="Search your courses..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success rounded-end-pill">
                        <i class="uil uil-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Courses Grid -->
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-lg border-0 h-100 course-card position-relative">
                        <div class="card-body d-flex flex-column p-4">

                            <!-- Course Image -->
                            @if ($course->image_path)
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course Image"
                                        class="img-fluid rounded-4 shadow-sm" style="max-height: 170px; object-fit: cover;">
                                </div>
                            @endif

                            <!-- Course Info -->
                            <h5 class="fw-bold text-success mb-2">{{ $course->name }}</h5>
                            <p class="mb-1 text-muted small">
                                <i class="uil uil-user"></i> <span class="fw-semibold">Instructor:</span>
                                {{ $course->instructor ?? 'N/A' }}
                            </p>
                            <p class="mb-1 text-muted small">
                                <i class="uil uil-graduation-cap"></i> <span class="fw-semibold">Level:</span>
                                {{ $course->level ?? 'N/A' }}
                            </p>

                            <!-- Description -->
                            @if ($course->description)
                                <p class="text-muted small mt-2">
                                    <i class="uil uil-file-alt"></i> {{ Str::words($course->description, 18) }}
                                </p>
                            @endif

                            <!-- Course Audio -->
                            @if ($course->audio_path)
                                <div class="mb-2">
                                    <audio controls class="w-100 rounded shadow-sm">
                                        <source src="{{ asset('storage/' . $course->audio_path) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif

                            <!-- Course Video -->
                            @if ($course->video_path)
                                <div class="mb-3">
                                    <video width="100%" height="180" controls class="rounded-4 shadow-sm">
                                        <source src="{{ asset('storage/' . $course->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif

                            <!-- Course PDF or File Material -->
                            @if ($course->file_path)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $course->file_path) }}" target="_blank"
                                        class="btn btn-outline-success w-100 rounded-pill">
                                        <i class="uil uil-file-download-alt"></i> View / Download Material
                                    </a>
                                </div>
                            @endif

                            <!-- View Full Course Button -->
                            <div class="mt-auto">
                                <a href="{{ route('dashboard.courses.show', $course->id) }}"
                                    class="btn btn-info w-100 rounded-pill">
                                    <i class="uil uil-eye"></i> Open Course Page
                                </a>
                            </div>

                            <!-- Badge -->
                            <span class="badge bg-success position-absolute top-0 end-0 m-2 shadow-sm">
                                #{{ $course->id }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="uil uil-book-open text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-3">No course materials available for your level yet.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if (method_exists($courses, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $courses->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    <!-- Custom Styling -->
    <style>
        .course-card {
            border-radius: 1.5rem;
            transition: transform 0.18s, box-shadow 0.18s;
            background: linear-gradient(135deg, #f8f9fa 80%, #e6fff5 100%);
            overflow: hidden;
        }

        .course-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 8px 32px rgba(33, 150, 83, 0.18);
            background: linear-gradient(135deg, #e6fff5 60%, #f8f9fa 100%);
        }

        .course-card .badge.bg-success {
            font-weight: 500;
            letter-spacing: 0.5px;
            opacity: 0.92;
        }

        .rounded-4 {
            border-radius: 1.2rem !important;
        }

        .btn-info {
            background: linear-gradient(90deg, #43cea2 60%, #198754 100%);
            border: none;
            color: #fff;
            font-weight: 600;
        }

        .btn-info:hover,
        .btn-info:focus {
            background: linear-gradient(90deg, #198754 60%, #43cea2 100%);
            color: #fff;
        }

        .btn-outline-success {
            border: 1.5px solid #198754;
            font-weight: 600;
            color: #198754;
        }

        .btn-outline-success:hover {
            background: #198754;
            color: #fff;
        }
    </style>
@endsection
