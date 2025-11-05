@extends('Layout.admin')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="fw-bold text-success mb-3">{{ ucwords($announcement->title) }}</h3>
                <p class="text-muted mb-2">
                    <i class="uil uil-user"></i> {{ $announcement->author ?? 'Admin' }} |
                    <i class="uil uil-calendar-alt"></i> {{ $announcement->created_at->format('M d, Y') }}
                </p>
                <hr>
                <p class="lead">{{ $announcement->content }}</p>
                <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn btn-success mt-3">
                    <i class="uil uil-edit"></i> Edit
                </a>
                <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-secondary mt-3">
                    <i class="uil uil-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
@endsection
