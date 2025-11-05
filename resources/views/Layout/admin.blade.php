<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortefinance - Admin Dashboard</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            background: #198754;
            color: #fff;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 20px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .sidebar .brand {
            font-size: 1.3rem;
            font-weight: 600;
            text-align: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            margin: 2px 10px;
            transition: background 0.2s, color 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #157347;
            color: #d4edda;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .mt-auto {
            margin-top: auto;
            padding: 1rem;
        }

        /* Top Navbar (mobile only) */
        .navbar {
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 600;
            color: #198754 !important;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 1.25rem;
            font-weight: 600;
            color: #fff;
            text-transform: capitalize;
        }

        .brand img {
            width: 35px;
            height: 35px;
            object-fit: contain;
        }

        /* Adjust for the mobile navbar brand */
        .navbar .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.1rem;
            color: #198754;
            font-weight: 600;
        }

        .navbar .brand img {
            width: 30px;
            height: 30px;
            object-fit: contain;
        }

        /* Optional hover effect for brand */
        .brand:hover {
            opacity: 0.9;
        }


        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            margin-top: 0;
            transition: all 0.3s ease;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .navbar {
                display: flex;
            }
        }

        /* Offcanvas */
        .offcanvas-start {
            width: 250px !important;
            border-right: none;
            background: #198754;
            color: #fff;
        }

        .offcanvas .nav-link {
            color: #fff;
        }

        .offcanvas .nav-link:hover,
        .offcanvas .nav-link.active {
            background: #157347;
            color: #d4edda;
        }
    </style>
</head>

<body>

    <!-- Mobile Navbar -->
    <nav class="navbar navbar-expand-lg d-lg-none">
        <div class="container-fluid">
            <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                <i class="uil uil-bars"></i>
            </button>
            <div class="brand">
                <img src="{{ asset('LogoFF.png') }}" alt="Logo">
                <span>ForteFinance</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-success btn-sm" type="submit">
                    <i class="uil uil-signout"></i>
                </button>
            </form>
        </div>
    </nav>

    <!-- Sidebar (Desktop) -->
    <nav class="sidebar d-none d-lg-flex">
        <div class="brand">
            <img src="{{ asset('LogoFF.png') }}" alt="Logo">
            <span>ForteFinance</span>
        </div>
        <ul class="nav flex-column px-2 mt-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                    href="{{ route('admin.index') }}">
                    <i class="uil uil-apps"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#studentsCollapse" role="button"
                    aria-expanded="false" aria-controls="studentsCollapse">
                    <i class="uil uil-users-alt"></i> Students
                    <i class="uil uil-angle-down float-end"></i>
                </a>
                <div class="collapse" id="studentsCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.students.index') }}">All Students</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}"
                    href="{{ route('admin.courses.index') }}">
                    <i class="uil uil-book-open"></i> Courses
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.certificates.index') }}">
                    <i class="uil uil-award"></i> Certificates
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}"
                    href="{{ route('admin.announcements.index') }}">
                    <i class="uil uil-megaphone"></i> Announcements
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="uil uil-setting"></i> Settings
                </a>
            </li>
        </ul>

        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100">
                    <i class="uil uil-signout"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Offcanvas for Mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column px-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}"><i class="uil uil-apps"></i>
                        Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.students.index') }}"><i
                            class="uil uil-users-alt"></i> Students</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.courses.index') }}"><i
                            class="uil uil-book-open"></i> Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.certificates.index') }}"><i
                            class="uil uil-award"></i> Certificates</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.announcements.index') }}"><i
                            class="uil uil-megaphone"></i> Announcements</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.settings.index') }}"><i
                            class="uil uil-setting"></i> Settings</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
