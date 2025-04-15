@extends('Layout.layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h2 class="mb-4 text-center">Create an account</h2>
            {{-- @if (session('status'))
                    <p class="alert alert-success">{{ session('status') }}</p>
                @endif
                @if (session('error'))
                    <p class="alert alert-danger">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif --}}
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Confirm your password" required>
                </div>
    
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>

            <!-- Links -->
            <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-success">Login</a>
            </div>
        </div>
    </div>
@endsection