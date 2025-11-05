@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold text-success mb-4">🎓 My Certificates</h2>

        <div class="row">
            @forelse ($certificates as $certificate)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden h-100">
                        <!-- Certificate Image or Preview -->
                        @if ($certificate->certificate_image && Str::endsWith($certificate->certificate_image, ['.jpg', '.jpeg', '.png', '.gif']))
                            <img src="{{ asset('storage/' . $certificate->certificate_image) }}" class="card-img-top"
                                alt="{{ $certificate->title }}" style="height: 200px; object-fit: cover;">
                        @elseif($certificate->file_path && Str::endsWith($certificate->certificate_image, '.pdf'))
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                                <i class="uil uil-file-info-alt display-3 text-muted"></i>
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                                <i class="uil uil-image-slash display-3 text-muted"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-semibold text-success">{{ $certificate->title }}</h5>
                            <h5 class="fw-semibold text-success">{{ $certificate->certificate_description }}</h5>
                            <p class="text-muted small mb-3">Issued on: {{ $certificate->created_at->format('M d, Y') }}</p>

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('dashboard.certificates.view', $certificate->id) }}" target="_blank"
                                    class="btn btn-outline-success btn-sm rounded-pill px-3">
                                    <i class="uil uil-eye"></i> View
                                </a>
                                <a href="{{ route('dashboard.certificates.download', $certificate->id) }}"
                                    class="btn btn-success btn-sm rounded-pill px-3">
                                    <i class="uil uil-download-alt"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center shadow-sm">
                        <i class="uil uil-info-circle"></i> No certificates available yet.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
