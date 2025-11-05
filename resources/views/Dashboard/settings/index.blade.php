@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">
        <h1 class="fw-bold text-success mb-4">
            <i class="uil uil-cog"></i> Account Settings
        </h1>

        <!-- Success / Error Alerts -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="uil uil-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="uil uil-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Profile Information -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-success mb-3">
                            <i class="uil uil-user-circle"></i> Profile Information
                        </h4>
                        <form method="POST" action="{{ route('dashboard.settings.profile') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="form-control rounded-pill" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="form-control rounded-pill" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                                    <i class="uil uil-save"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Password Section -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-success mb-3">
                            <i class="uil uil-lock"></i> Change Password
                        </h4>
                        <form method="POST" action="{{ route('dashboard.settings.password') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Current Password</label>
                                <input type="password" name="current_password" class="form-control rounded-pill" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">New Password</label>
                                <input type="password" name="new_password" class="form-control rounded-pill" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control rounded-pill"
                                    required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                                    <i class="uil uil-refresh"></i> Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            background: linear-gradient(135deg, #f8f9fa 85%, #e6fff5 100%);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 1.5rem;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(33, 150, 83, 0.15);
        }

        .form-control {
            border: 1px solid #dee2e6;
            padding: 0.7rem 1.2rem;
            font-size: 0.95rem;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.2);
        }

        .btn-success {
            background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
            transform: translateY(-2px);
        }
    </style>
@endsection
