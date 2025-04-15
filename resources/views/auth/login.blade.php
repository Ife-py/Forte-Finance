@extends('Layout.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center"
        style="height: 100vh; background: rgb(198, 248, 198);">
        <div class="row w-100 h-100">
            <!-- Left Side: Image -->
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="{{ asset('images/login.webp') }} " alt="Login Image" class="img-fluid rounded shadow-lg">
            </div>

            <!-- Right Side: Login Form -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="card p-4 shadow-lg w-100" style="max-width: 400px; margin: auto;">
                    <h2 class="mb-4 text-center">Login</h2>
                    @if (session('status'))
                        <p class="alert alert-success">{{ session('status') }}</p>
                    @endif
                    @if (session('error'))
                        <p class="alert alert-danger">{{ session('error') }}</p>
                    @endif
                    @if (session('success'))
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="#" class="text-success">Forgot your password?</a><br>
                        <a href="{{ route('register') }}" class="text-success">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
