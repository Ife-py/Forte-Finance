@extends('Layout.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success mb-0">
                <i class="uil uil-bullhorn me-2"></i> Manage Announcements
            </h3>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-success px-4 rounded-pill">
                <i class="uil uil-plus-circle me-1"></i> Create New
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($announcements->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="uil uil-info-circle"></i> No announcements found.
            </div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Posted</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td><strong>{{ ucwords($announcement->title) }}</strong></td>
                                    <td>{{ $announcement->author ?? 'Admin' }}</td>
                                    <td>{{ $announcement->date ? \Carbon\Carbon::parse($announcement->date)->format('M d, Y') : '-' }}
                                    </td>
                                    <td>{{ $announcement->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.announcements.show', $announcement->id) }}"
                                            class="btn btn-outline-info btn-sm me-1">
                                            <i class="uil uil-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                            class="btn btn-outline-success btn-sm me-1">
                                            <i class="uil uil-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Delete this announcement?')">
                                                <i class="uil uil-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
