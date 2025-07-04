@extends('Layout.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-success mb-1">
                            {{ $certificate->certificate_title ?? $certificate->title ?? 'Certificate' }}
                        </h2>
                        <p class="text-muted mb-0">
                            Awarded to <span class="fw-semibold">{{ $certificate->student->name ?? 'N/A' }}</span>
                        </p>
                        <p class="text-muted">
                            For completing <span class="fw-semibold">{{ $certificate->course->name ?? 'N/A' }}</span>
                        </p>
                    </div>
                    <div class="text-center mb-4">
                        @if($certificate->certificate_image)
                            <img src="{{ asset('storage/' . $certificate->certificate_image) }}" alt="Certificate Image" class="img-fluid rounded shadow" style="max-height:350px;">
                        @else
                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center text-muted rounded" style="height: 200px;">
                                <span>No Certificate Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-semibold">Description</h5>
                        <p class="mb-0">{{ $certificate->description ?? 'No description provided.' }}</p>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Issued On:</strong> {{ \Carbon\Carbon::parse($certificate->issued_at ?? $certificate->created_at)->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-1"><strong>Certificate ID:</strong> #{{ $certificate->id }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.certificates.index') }}" class="btn btn-outline-success">
                            <i class="uil uil-arrow-left"></i> Back to Certificates
                        </a>
                        <div>
                            <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-warning me-2">
                                <i class="uil uil-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this certificate?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="uil uil-trash-alt"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <small class="text-muted">"An unexamined life is not worth living." - Socrates</small>
            </div>
        </div>
    </div>
</div>
@endsection
