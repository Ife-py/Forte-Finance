@extends('Layout.admin')

@section('content')
    <div class="container py-4">
        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-success mb-3">
            <i class="uil uil-arrow-left"></i> Back to Courses
        </a>
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h2 class="fw-bold text-success mb-3">{{ $course->name }}</h2>
                <p class="mb-2"><strong>Instructor:</strong> {{ $course->instructor ?? 'N/A' }}</p>
                <p class="mb-2"><strong>Category:</strong> {{ ucfirst($course->category) ?? 'N/A' }}</p>
                <p class="mb-2"><strong>Level:</strong> {{ ucfirst($course->level) ?? 'N/A' }}</p>
                <p class="mb-2"><strong>Duration:</strong> {{ $course->duration ? $course->duration . ' mins' : 'N/A' }}
                </p>
                <p class="mb-2"><strong>Start Date:</strong>
                    {{ $course->start_date ? \Carbon\Carbon::parse($course->start_date)->format('M d, Y') : 'N/A' }}</p>
                <p class="mb-2"><strong>End Date:</strong>
                    {{ $course->end_date ? \Carbon\Carbon::parse($course->end_date)->format('M d, Y') : 'N/A' }}</p>
                <hr>
                <h5 class="fw-semibold">Description</h5>
                <p>{{ $course->description ?? 'No description provided.' }}</p>

                {{-- Resource Thumbnails --}}
                <div class="row g-3">
                    @if ($course->image_path)
                        <div class="col-md-4">
                            <strong>Course Image:</strong><br>
                            <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course Image"
                                class="img-fluid rounded shadow-sm resource-thumb" style="max-width: 200px; cursor:pointer"
                                data-bs-toggle="modal" data-bs-target="#imageModal">
                        </div>
                    @endif

                    @if ($course->audio_path)
                        <div class="col-md-4">
                            <strong>Audio Material:</strong><br>
                            <div class="resource-thumb bg-light p-2 rounded shadow-sm"
                                style="cursor:pointer; max-width:200px" data-bs-toggle="modal" data-bs-target="#audioModal">
                                <i class="uil uil-volume-up" style="font-size:2.5rem"></i>
                                <span class="d-block mt-2">Play Audio</span>
                            </div>
                        </div>
                    @endif

                    @if ($course->video_path)
                        <div class="col-md-4">
                            <strong>Video Material:</strong><br>
                            <div class="resource-thumb bg-light p-2 rounded shadow-sm"
                                style="cursor:pointer; max-width:200px" data-bs-toggle="modal" data-bs-target="#videoModal">
                                <i class="uil uil-play-circle" style="font-size:2.5rem"></i>
                                <span class="d-block mt-2">Play Video</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mt-4 text-end">
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning me-2">
                        <i class="uil uil-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="uil uil-trash-alt"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Image Modal --}}
    @if ($course->image_path)
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-0">
                        <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course Image"
                            class="img-fluid rounded" style="max-height:90vh;">
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Audio Modal --}}
    @if ($course->audio_path)
        <div class="modal fade" id="audioModal" tabindex="-1" aria-labelledby="audioModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Audio Material</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <audio controls style="width:100%;">
                            <source src="{{ asset('storage/' . $course->audio_path) }}">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Video Modal --}}
    @if ($course->video_path)
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-dark">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-0">
                        <video controls style="width:100%; max-height:80vh; background:#000;">
                            <source src="{{ asset('storage/' . $course->video_path) }}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
