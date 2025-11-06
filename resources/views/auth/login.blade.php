@extends('Layout.layout')

@section('content')
    <div class="auth-wrapper d-flex align-items-center justify-content-center bg-white">
        <div class="card p-5 shadow-lg border-0 rounded-4 w-100" style="max-width: 400px;">
            <div class="text-center mb-4">
                <div class="logo-circle mx-auto mb-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('LogoFF.png') }}" alt="Logo" width="55" height="55">
                </div>
                <h4 class="fw-bold text-success mb-1">Welcome Back</h4>
                <p class="text-muted small mb-0">Sign in to your ForteFinance account</p>
            </div>

            {{-- Alerts --}}
            @foreach (['status' => 'success', 'error' => 'danger', 'success' => 'success'] as $key => $type)
                @if (session($key))
                    <div class="alert alert-{{ $type }} alert-dismissible fade show small" role="alert">
                        {{ session($key) }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            @endforeach

            {{-- Login Form --}}
            <form action="{{ route('login.store') }}" method="POST" autocomplete="off" class="mt-2">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold small">Username</label>
                    <input type="text" class="form-control rounded-pill py-2 shadow-none" id="username" name="username"
                        placeholder="Enter your username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold small">Password</label>
                    <input type="password" class="form-control rounded-pill py-2 shadow-none" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-success rounded-pill fw-semibold py-2">
                        <i class="uil uil-signin"></i> Login
                    </button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="#" class="text-success text-decoration-none small">Forgot password?</a><br>
                <a href="{{ route('register') }}" class="text-success text-decoration-none small fw-semibold">
                    Create account
                </a>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #fff !important;
        }

        .auth-wrapper {
            min-height: calc(100vh - 40px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .card {
            background: #fff;
            border-radius: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* Mint Logo Circle */
        .logo-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #a3f0d1, #43cea2);
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(67, 206, 162, 0.3);
        }

        /* Input fields */
        .form-control {
            border: 1px solid #43cea2;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.15);
        }

        /* Button */
        .btn-success {
            background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
            border: none;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #43cea2 70%, #198754 100%);
            box-shadow: 0 3px 10px rgba(25, 135, 84, 0.25);
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .auth-wrapper {
                min-height: calc(100vh - 30px);
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .card {
                padding: 2rem 1.5rem !important;
                max-width: 90%;
            }

            .logo-circle {
                width: 70px;
                height: 70px;
            }
        }

        @media (max-width: 576px) {
            .auth-wrapper {
                min-height: calc(100vh - 20px);
                padding: 0.5rem 0.5rem;
            }

            .card {
                padding: 1.5rem 1rem !important;
            }

            .logo-circle {
                width: 65px;
                height: 65px;
            }
        }
    </style>
@endsection
