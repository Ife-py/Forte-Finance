@extends('Layout.admin')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="fw-bold text-success mb-4"><i class="uil uil-edit-alt me-2"></i> Edit Announcement</h3>

            <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" value="{{ old('title', $announcement->title) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Content</label>
                    <textarea name="content" rows="6" class="form-control" required>{{ old('content', $announcement->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Date (optional)</label>
                    <input type="date" name="date" value="{{ old('date', $announcement->date) }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-success px-4">Update</button>
                <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
