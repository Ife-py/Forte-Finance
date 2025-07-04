@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="text-success fw-bold mb-1">Awarded Certificates</h1>
            <p class="text-muted">Manage and preview all certificates issued to students.</p>
        </div>
        <a href="{{ route('admin.certificates.create') }}" class="btn btn-success shadow">
            <i class="uil uil-plus-circle"></i> Issue Certificate
        </a>
    </div>

    <!-- Search -->
    <form action="{{ route('admin.certificates.index') }}" method="GET" class="mb-4">
        <div class="input-group shadow-sm">
            <input type="text" name="search" class="form-control" placeholder="Search by student or course..." value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">
                <i class="uil uil-search"></i> Search
            </button>
        </div>
    </form>

    <!-- Certificate Cards -->
    <div class="row">
        @forelse($certificates as $certificate)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                @if ($certificate->certificate_image)
                <img src="{{ asset('storage/' . $certificate->certificate_image) }}" alt="Certificate Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                @else
                <div class="bg-secondary-subtle d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                    <span>No Image</span>
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold text-success">{{ $certificate->certificate_title }}</h5>
                    <p class="mb-1"><strong>Student:</strong> {{ $certificate->student->name ?? 'N/A' }}</p>
                    <p class="mb-1"><strong>Course:</strong> {{ $certificate->course->name ?? 'N/A' }}</p>
                    <p class="text-muted mb-3"><small><i class="uil uil-calendar-alt"></i> Issued: {{ $certificate->issued_at }}</small></p>

                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('admin.certificates.show', $certificate->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="uil uil-eye"></i>
                        </a>
                        <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="uil uil-edit"></i>
                        </a>
                        <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('Delete this certificate?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="uil uil-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center shadow-sm">
                No certificates found.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{-- {{ $certificates->links() }} --}}
    </div>
</div>
@endsection
