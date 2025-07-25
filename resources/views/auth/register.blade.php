@extends('Layout.layout')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #e6fff5 60%, #f8f9fa 100%);">
    <div class="row w-100 h-100 justify-content-center align-items-center">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="card p-5 shadow-lg border-0 rounded-4 w-100" style="max-width: 400px;">
                <div class="text-center mb-4">
                    <span class="d-inline-block mb-2">
                        <img src="{{ asset('LogoFF.png') }}" alt="Logo" width="60" height="60">
                    </span>
                    <h2 class="fw-bold text-success mb-1">Create an Account</h2>
                    <p class="text-muted mb-0">Join ForteFinance and start your crypto journey</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Username</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name" placeholder="Enter your username" required>
                        @error('name')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="Enter your email" required>
                        @error('email')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="Create a password" required>
                        @error('password')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" class="form-control rounded-pill" id="confirm-password" name="password_confirmation" placeholder="Confirm your password" required>
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-success rounded-pill fw-bold py-2">
                            <i class="uil uil-user-plus"></i> Register
                        </button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <span class="text-muted">Already have an account?</span>
                    <a href="{{ route('login') }}" class="text-success text-decoration-underline fw-semibold ms-1">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card {
        background: #fff;
        border-radius: 1.5rem;
    }
    .form-control {
        border-radius: 2rem;
        border: 1px solid #43cea2;
        transition: border-color 0.2s;
    }
    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.15rem rgba(33,150,83,0.15);
    }
    .btn-success {
        background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-success:hover, .btn-success:focus {
        background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
        box-shadow: 0 4px 16px rgba(33, 150, 83, 0.15);
    }
    .rounded-4 {
        border-radius: 1.5rem !important;
    }
    @media (max-width: 991px) {
        .container-fluid {
            padding: 0 1rem;
        }
    }
</style>
@endsection