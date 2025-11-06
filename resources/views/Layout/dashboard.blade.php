<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForteFinance - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-green: #157347;
            /* slightly darker green for better contrast */
            --accent-green: #20c997;
            --sidebar-bg: #ffffff;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --hover-bg: #e8f5ee;
            --border-light: #e6ece8;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            position: fixed;
            height: 100vh;
            transition: all 0.3s ease;
            z-index: 1050;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2rem;
            padding: 0 0.5rem;
        }

        .logo-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(25, 135, 84, 0.25);
        }

        .logo-circle img {
            width: 30px;
            height: 30px;
            object-fit: contain;
            filter: brightness(100);
        }

        .brand span {
            font-size: 1.35rem;
            font-weight: 600;
            color: #ffffff;
            /* white text */
            background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
            padding: 0.4rem 0.8rem;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(25, 135, 84, 0.25);
        }

        /* Sidebar Links */
        .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-link:hover {
            background-color: var(--hover-bg);
            color: var(--primary-green);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
            color: #fff;
            box-shadow: 0 3px 8px rgba(25, 135, 84, 0.25);
        }

        /* Sidebar Footer */
        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-light);
        }

        .logout-btn {
            border: none;
            background: none;
            color: var(--text-muted);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            color: var(--primary-green);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 2rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        /* Mobile Toggle */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            background: var(--primary-green);
            border: none;
            color: #fff;
            padding: 0.6rem 0.8rem;
            border-radius: 8px;
            z-index: 1100;
            box-shadow: 0 2px 6px rgba(25, 135, 84, 0.3);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                left: -250px;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }

            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Mobile Menu Button -->
    <button class="menu-toggle" id="menu-toggle">
        <i class="uil uil-bars"></i>
    </button>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="brand">
            <div class="logo-circle">
                <img src="{{ asset('LogoFF.png') }}" alt="Logo">
            </div>
            <span>ForteFinance</span>
        </div>

        <ul class="nav flex-column">
            <li><a href="{{ route('dashboard.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="uil uil-apps"></i>
                    Dashboard</a></li>
            <li><a href="{{ route('dashboard.courses.index') }}"
                    class="nav-link {{ request()->routeIs('courses') ? 'active' : '' }}"><i
                        class="uil uil-book-open"></i> Courses</a></li>
            <li><a href="{{ route('dashboard.exams.index') }}"
                    class="nav-link {{ request()->routeIs('exams.*') ? 'active' : '' }}"><i
                        class="uil uil-edit-alt"></i> Exams</a></li>
            <li><a href="{{ route('dashboard.certificates.index') }}" class="nav-link"><i class="uil uil-award"></i>
                    Certificates</a></li>
            <li><a href="{{ route('dashboard.settings.index') }}" class="nav-link"><i class="uil uil-setting"></i>
                    Settings</a></li>
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
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('menu-toggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
