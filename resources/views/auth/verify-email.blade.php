@extends('Layout.layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <div class="text-center">
            <h2 class="text-success fw-bold">Verify Your Email</h2>
            <p class="text-muted">A verification link has been sent to your email address. Please check your inbox.</p>
        </div>

        <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
            @csrf
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">Resend Verification Email</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('logout') }}" class="text-danger">Logout</a>
        </div>
    </div>
</div>
@endsection