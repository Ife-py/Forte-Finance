@extends('Layout.dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-success fw-bold">Students</h1>
        <a href="#" class="btn btn-success btn-lg shadow-sm"><i class="uil uil-plus-circle"></i> Add New Student</a>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search students..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success"><i class="uil uil-search"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Students Table -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Enrolled Courses</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->courses_count }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-sm"><i class="uil uil-eye"></i> View</a>
                                <a href="" class="btn btn-warning btn-sm"><i class="uil uil-edit"></i> Edit</a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No students found.</td>
                        </tr>
                    @endforelse
                </tbody> --}}
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{-- {{ $students->links() }} --}}
    </div>
</div>
@endsection