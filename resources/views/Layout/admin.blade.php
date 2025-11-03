<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortefinance - Education & Industrial Solutions</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background: #198754;
            color: #fff;
            padding-top: 30px;
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

        .sidebar .collapse .nav-link {
            padding-left: 2.5rem;
            font-size: 0.9rem;
        }

        .hover-popup {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-popup:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .main-content {
            padding: 2rem;
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                min-height: auto;
            }

            .main-content {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-lg-2 col-md-3 sidebar bg-success d-flex flex-column p-0 position-fixed position-lg-sticky"
                id="sidebarMenu" style="min-height: 100vh; top: 0; z-index: 1000;">
                <div class="d-flex flex-column h-100">
                    <!-- Brand/Logo -->
                    <div class="p-3 border-bottom border-success">
                        <h5 class="text-white mb-0">Fortefinance</h5>
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
                                <a class="nav-link active" href="{{ route('admin.index') }}">
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
                                            <a class="nav-link" href="{{ route('admin.students.index') }}">All
                                                Students</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#coursesCollapse" role="button"
                                    aria-expanded="false" aria-controls="coursesCollapse">
                                    <i class="uil uil-book-open"></i> Courses
                                    <i class="uil uil-angle-down float-end"></i>
                                </a>
                                <div class="collapse" id="coursesCollapse">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.courses.index') }}">All
                                                Courses</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('exams.*') ? 'active' : '' }}"
                                    href="{{ route('admin.exams.index') }}">
                                    <i class="uil uil-edit-alt"></i> Exams
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.certificates.index') }}">
                                    <i class="uil uil-award"></i> Certificates
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                                    <i class="uil uil-setting"></i> Settings
                                </a>
                            </li>
                        </ul>
                    </div>


                    <!-- Logout at bottom -->
                    <div class="mt-auto p-3">
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
