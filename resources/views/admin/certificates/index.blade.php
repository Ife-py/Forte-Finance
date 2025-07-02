@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <h1 class="text-success fw-bold mb-3">Certificates</h1>
            <p class="text-muted mb-4">View, search, and manage all certificates awarded to students.</p>
            <a href="{{ route('admin.certificates.create') }}" class="btn btn-success mb-3">
                <i class="uil uil-plus-circle"></i> Issue New Certificate
            </a>
            <!-- Search Bar -->
            <form action="{{ route('admin.certificates.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by student or course..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success"><i class="uil uil-search"></i> Search</button>
                </div>
            </form>
            <!-- Certificates Table -->
            <div class="card shadow-lg border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-success">
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Course</th>
                                    <th>Certificate Title</th>
                                    <th>Date Issued</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse($certificates as $certificate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $certificate->student->name ?? 'N/A' }}</td>
                                        <td>{{ $certificate->course->name ?? 'N/A' }}</td>
                                        <td>{{ $certificate->title }}</td>
                                        <td>{{ $certificate->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.certificates.show', $certificate->id) }}" class="btn btn-info btn-sm">
                                                <i class="uil uil-eye"></i> View
                                            </a>
                                            <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-warning btn-sm">
                                                <i class="uil uil-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this certificate?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash-alt"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No certificates found.</td>
                                    </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="mt-3">
                {{-- {{ $certificates->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection