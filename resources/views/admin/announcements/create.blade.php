@extends('Layout.admin')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="fw-bold text-success mb-4"><i class="uil uil-plus-circle me-2"></i> Create Announcement</h3>

                <form method="POST" action="{{ route('admin.announcements.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="content" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success px-4 rounded-pill">
                        <i class="uil uil-check-circle me-1"></i> Publish
                    </button>
                    <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
