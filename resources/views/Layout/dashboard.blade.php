<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForteFinance - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* =======================
           Global Styles
        ======================== */
        :root {
            --primary-green: #198754;
            --light-green: #e9f9ef;
            --text-dark: #1f2d3d;
            --text-muted: #6c757d;
            --white: #ffffff;
            --border-light: #dfe6e9;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafb;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* =======================
           Sidebar
        ======================== */
        .sidebar {
            width: 250px;
            background: rgba(233, 249, 239, 0.85);
            backdrop-filter: blur(8px);
            border-right: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            position: fixed;
            height: 100vh;
            transition: all 0.3s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding: 0 0.5rem;
        }

        .brand img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
        }

        .brand span {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-green);
        }

        .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background-color: var(--light-green);
            color: var(--primary-green);
        }

        .nav-link.active {
            background-color: var(--primary-green);
            color: var(--white);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-light);
        }

        .logout-btn {
            border: none;
            background: none;
            color: var(--text-dark);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.2s;
        }

        .logout-btn:hover {
            color: var(--primary-green);
        }

        /* =======================
           Main Content
        ======================== */
        .main-content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .header {
            background: var(--white);
            padding: 1.2rem 1.5rem;
            border-radius: 14px;
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-left img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-green);
        }

        .header-left h2 {
            margin: 0;
            font-size: 1.4rem;
            color: var(--primary-green);
        }

        .header-right .btn {
            border-radius: 10px;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .header-right .btn:hover {
            transform: translateY(-2px);
        }

        /* =======================
           Dashboard Cards
        ======================== */
        .card-dashboard {
            border: none;
            border-radius: 14px;
            background: var(--white);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .card-dashboard:hover {
            transform: translateY(-3px);
        }

        .card-dashboard .card-body {
            padding: 1.6rem 1.4rem;
        }

        .card-dashboard .card-title {
            font-weight: 600;
            color: var(--primary-green);
            font-size: 1.1rem;
        }

        .card-dashboard .card-text {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* =======================
           Responsive
        ======================== */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="brand">
            <img src="{{ asset('LogoFF.png') }}" alt="Logo">
            <span>ForteFinance</span>
        </div>

        <ul class="nav flex-column">
            <li><a href="{{ route('dashboard.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="uil uil-apps"></i>
                    Dashboard</a></li>
            <li><a href="{{ route('dashboard.courses.index') }}"
                    class="nav-link {{ request()->routeIs('courses') ? 'active' : '' }}"><i
                        class="uil uil-book-open"></i> Courses</a></li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('exams.*') ? 'active' : '' }}"
                    href="{{ route('dashboard.exams.index') }}">
                    <i class="uil uil-edit-alt"></i> Exams
                </a>
            </li>
            <li class="nav-item"> 
                <a href="{{ route('dashboard.certificates.index') }}" class="nav-link"><i class="uil uil-award"></i>
                    Certificates</a></li>
            <li><a href="#" class="nav-link"><i class="uil uil-setting"></i> Settings</a></li>
        </ul>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn"><i class="uil uil-signout"></i> Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
