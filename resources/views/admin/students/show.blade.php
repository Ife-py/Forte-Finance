@extends('Layout.admin')

@section('content')
    <div class="container py-4">
        <!-- Student Profile Header -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <a href="{{ route('admin.students.index') }}" class="btn btn-outline-success mb-3">
                    <i class="uil uil-arrow-left"></i> Back to Students
                </a>
                <div class="card shadow-lg border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:70px; height:70px;">
                            <i class="uil uil-user text-white" style="font-size: 2.5rem;"></i>
                        </div>
                        <div class="ms-4">
                            <h2 class="fw-bold mb-1">{{ $student->name }}</h2>
                            <p class="mb-0 text-muted"><i class="uil uil-envelope"></i> {{ $student->email }}</p>
                            <p class="mb-0 text-muted"><i class="uil uil-calendar-alt"></i> Joined:
                                {{ $student->created_at->format('M d, Y') }}</p>
                            @if (!empty($student->phase))
                                <p class="mb-0 text-muted">
                                    <i class="uil uil-shield-check"></i> Phase:
                                    <span class="fw-semibold text-success">{{ ucfirst($student->phase) }}</span>
                                </p>
                            @else
                                <p class="mb-0 text-muted"><i class="uil uil-shield-check"></i> Phase: <span
                                        class="text-secondary">Not assigned</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Details & Actions -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="text-success fw-bold mb-3"><i class="uil uil-book-open"></i> Enrolled Courses</h5>
                        @if ($student->courses && $student->courses->count())
                            <ul class="list-group list-group-flush">
                                @foreach ($student->courses as $course)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $course->name }}</span>
                                        <span class="badge bg-success">{{ $course->pivot->status ?? 'Enrolled' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-info mb-0">
                                This student is not enrolled in any courses.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-success fw-bold mb-3"><i class="uil uil-award"></i> Achievements & Certificates</h5>
                        @if ($student->certificates && $student->certificates->count())
                            <ul class="list-group list-group-flush">
                                @foreach ($student->certificates as $certificate)
                                    <li class="list-group-item">
                                        <i class="uil uil-award text-success"></i>
                                        {{ $certificate->title }}
                                        <span class="text-muted">({{ $certificate->created_at->format('M d, Y') }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-info mb-0">
                                No certificates or achievements yet.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Actions -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-end">
                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning me-2"><i
                        class="uil uil-edit"></i> Edit Student</a>
                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="uil uil-trash-alt"></i> Delete Student</button>
                </form>
            </div>
        </div>
    </div>
@endsection
