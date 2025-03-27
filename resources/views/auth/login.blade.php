@extends('Layout.layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h2 class="mb-4 text-center">Login</h2>
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
                    <label for="text" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Enter your username" required>
                    {{-- @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                    {{-- @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>

            <!-- Links -->
            <div class="mt-3 text-center">
                <a href="#" class="text-success">Forgot your password?</a><br>
                <a href="{{ route('register') }}" class="text-success">Create an account</a>
            </div>
        </div>
    </div>
@endsection