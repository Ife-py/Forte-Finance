<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortefinance - Dashboard</title>

    <!-- Bootstrap & Icons -->    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e6fff5 60%, #f8f9fa 100%);
            min-height: 100vh;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #198754 80%, #43cea2 100%);
            color: #fff;
            padding-top: 30px;
            box-shadow: 2px 0 16px rgba(33, 150, 83, 0.08);
        }

        .sidebar .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 1.5rem 1rem 1rem 1rem;
        }

        .sidebar .brand-logo img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(33, 150, 83, 0.15);
        }

        .sidebar .brand-logo span {
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 0.75rem 1.2rem;
            border-radius: 12px;
            margin: 2px 10px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.13);
            color: #ffd600;
            box-shadow: 0 2px 12px rgba(33, 150, 83, 0.10);
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
        }

        .sidebar .collapse .nav-link {
            padding-left: 2.5rem;
            font-size: 0.97rem;
        }

        .sidebar .sidebar-footer {
            margin-top: auto;
            padding: 1.5rem 1rem 1rem 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar .sidebar-footer .nav-link {
            color: #fff;
            font-weight: 600;
            padding: 0.7rem 1rem;
            border-radius: 10px;
        }

        .sidebar .sidebar-footer .nav-link:hover {
            background: rgba(255, 255, 255, 0.10);
            color: #ffd600;
        }

        .main-content {
            padding: 2.5rem 2rem;
            min-height: 100vh;
            background: transparent;
        }

        .dashboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .dashboard-header .welcome {
            font-size: 1.5rem;
            font-weight: 600;
            color: #198754;
        }

        .dashboard-header .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dashboard-header .user-info img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #43cea2;
        }

        .dashboard-header .user-info span {
            font-weight: 500;
            color: #333;
        }

        .card-dashboard {
            border-radius: 1.2rem;
            box-shadow: 0 4px 24px rgba(33, 150, 83, 0.10);
            border: none;
            background: #fff;
            transition: transform 0.18s, box-shadow 0.18s;
        }

        .card-dashboard:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 8px 32px rgba(33, 150, 83, 0.13);
        }

        .card-dashboard .card-body {
            padding: 2rem 1.5rem;
        }

        .card-dashboard .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #198754;
        }

        .card-dashboard .card-text {
            font-size: 2.1rem;
            font-weight: 700;
            color: #43cea2;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                min-height: auto;
                position: static !important;
                box-shadow: none;
            }

            .main-content {
                padding: 1.2rem 0.5rem;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }

        @media (max-width: 767.98px) {
            .sidebar .brand-logo span {
                font-size: 1.1rem;
            }

            .main-content {
                padding: 0.7rem 0.2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-lg-2 col-md-3 sidebar d-flex flex-column p-0 position-fixed position-lg-sticky"
                id="sidebarMenu" style="min-height: 100vh; top: 0; z-index: 1000;">
                <div class="d-flex flex-column h-100">
                    <!-- Brand/Logo -->
                    <div class="brand-logo">
                        <img src="{{ asset('LogoFF.png') }}" alt="Logo">
                        <span>ForteFinance</span>
                    </div>

                    <!-- Sidebar Toggle for small screens -->
                    <button class="btn btn-success d-lg-none m-3 align-self-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#sidebarLinks" aria-controls="sidebarLinks"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="uil uil-bars" style="font-size: 1.5rem;"></i>
                    </button>

                    <!-- Sidebar Links -->
                    <div class="collapse d-lg-block" id="sidebarLinks">
                        <ul class="nav flex-column px-2">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                    <i class="uil uil-apps"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('students*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#studentsCollapse" role="button"
                                    aria-expanded="false" aria-controls="studentsCollapse">
                                    <i class="uil uil-users-alt"></i> Students
                                    <i class="uil uil-angle-down float-end"></i>
                                </a>
                                <div class="collapse" id="studentsCollapse">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Add Student</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('courses') ? 'active' : '' }}" data-bs-toggle="collapse" href="#coursesCollapse" role="button"
                                    aria-expanded="false" aria-controls="coursesCollapse">
                                    <i class="uil uil-book-open"></i> Courses
                                    <i class="uil uil-angle-down float-end"></i>
                                </a>
                                <div class="collapse" id="coursesCollapse">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('courses') }}">All Courses</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Add Course</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#certificates">
                                    <i class="uil uil-award"></i> Certificates
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#settings">
                                    <i class="uil uil-setting"></i> Settings
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Sidebar Footer/Logout -->
                    <div class="sidebar-footer mt-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link p-0 text-decoration-none">
                                <i class="uil uil-signout"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-lg-10 col-md-9 offset-lg-2 offset-md-3 main-content">

                @yield('content')

            </main>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add active state management
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Only prevent default for collapse toggles and placeholder links
                    if (this.hasAttribute('data-bs-toggle') || this.getAttribute('href').startsWith(
                            '#')) {
                        if (!this.hasAttribute('data-bs-toggle')) {
                            e.preventDefault();
                        }
                    }

                    // Remove active class from all nav links
                    navLinks.forEach(l => l.classList.remove('active'));

                    // Add active class to clicked link (if not a collapse toggle)
                    if (!this.hasAttribute('data-bs-toggle')) {
                        this.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>

</html>
