@extends('Layout.dashboard')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-success mb-4">My Certificates</h2>

    @forelse ($certificates as $certificate)
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h5 class="fw-semibold">{{ $certificate->title }}</h5>
                    <p class="text-muted small mb-1">Issued on: {{ $certificate->created_at->format('M d, Y') }}</p>
                </div>

                <div class="btn-group">
                    <a href="{{ route('dashboard.certificates.view', $certificate->id) }}" target="_blank" class="btn btn-outline-success">
                        <i class="uil uil-eye"></i> View
                    </a>
                    <a href="{{ route('dashboard.certificates.download', $certificate->id) }}" class="btn btn-success">
                        <i class="uil uil-download-alt"></i> Download
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            <i class="uil uil-info-circle"></i> No certificates available yet.
        </div>
    @endforelse
</div>
@endsection
