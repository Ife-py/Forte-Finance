<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login | ForteFinance</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f0f7ff, #e8eaf6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            background: #ffffff;
            border-radius: 1.25rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
        }

        .login-logo {
            background: linear-gradient(135deg, #0ea5e9, #6366f1);
            border-radius: 50%;
            height: 90px;
            width: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: #fff;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
        }

        h4 {
            font-weight: 700;
            color: #1f2937;
            letter-spacing: 0.3px;
        }

        .small-text {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .form-control:focus {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.25);
        }

        label {
            color: #374151;
            font-weight: 500;
        }

        .btn-primary {
            border-radius: 0.75rem;
            padding: 0.75rem;
            background: linear-gradient(90deg, #0ea5e9, #6366f1);
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        a {
            color: #0ea5e9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            font-size: 0.85rem;
            color: #6b7280;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="login-card text-center">
        <div class="login-logo">
            <i class="bi bi-currency-bitcoin"></i>
        </div>
        <h4 class="mb-2">ForteFinance Admin</h4>
        <p class="small-text mb-4">Access your cryptocurrency learning and industrial solutions dashboard</p>
        @if ($errors->any())
            <div class="alert alert-danger text-center">{{ $errors->first('login') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="name" class="form-label fw-semibold">Username</label>
                <input type="text" id="name" name="username" class="form-control" placeholder="ForteAdmin" required>
            </div>

            <!-- Password -->
            <div class="mb-3 text-start">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <!-- Remember + Forgot -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label small-text">Remember me</label>
                </div>
                <a href="#" class="small-text">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="small-text mt-4 mb-0">
            Go back to <a href="{{ route('login') }}" class="fw-semibold">main site</a>
        </p>
    </div>

    <footer>
        ©
        <script>
            document.write(new Date().getFullYear());
        </script> ForteFinance. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
