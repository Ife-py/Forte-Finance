<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortefinance - Education & Industrial Solutions</title>

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #198754 70%, #43cea2 100%);
            padding: 15px 0;
            box-shadow: 0 2px 8px rgba(33, 150, 83, 0.08);
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #fff !important;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: color 0.2s;
        }

        .navbar .navbar-brand:hover,
        .navbar .nav-link:hover {
            color: #d4edda !important;
        }

        .navbar .nav-link.active {
            color: #ffd200 !important;
            border-bottom: 2px solid #ffd200;
            font-weight: bold;
            padding-bottom: 5px;
        }

        .navbar-toggler {
            border-color: #fff;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .navbar .navbar-brand img {
            filter: drop-shadow(0 2px 4px rgba(33, 150, 83, 0.15));
        }

        /* Hero Section */
        .hero {
            background: url('{{ asset('image1.jpg') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background-blend-mode: overlay;
            /* background-color: rgba(0, 128, 0, 0.6); */
            padding: 50px 20px;
            /* margin-top: 5px;  */
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.3rem;
            margin-top: 10px;
        }

        .btn-green {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-green:hover {
            background-color: #218838;
        }

        /* Service Section */
        .service-box {
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            background: #e9f7ef;
            border: 2px solid #198754;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .service-box:hover {
            transform: translateY(-5px);
        }

        .service-box img {
            width: 100%;
            border-radius: 10px;
            height: 200px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        /* Testimonials */
        .testimonials {
            background: #198754;
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .testimonial-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        /* Footer */
        .footer {
            background: #155724;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #d4edda;
        }

        .hover-popup {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            /* Default light background */
        }

        .hover-popup:hover {
            transform: scale(1.05);
            /* Slightly enlarge the section */
            background-color: #79ebb6;
            /* Theme color on hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .hover-popup1 {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            /* Default light background */
        }

        .hover-popup1:hover {
            transform: scale(1.05);
            /* Slightly enlarge the section */
            /* Theme color on hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <?php $name = 'ForteFinance'; ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <img src="{{ asset('LogoFF.png') }}" alt="Logo" width="60" height="60" class="me-2">
            <a class="navbar-brand fw-bold" href="{{ route('index') }}">{{ $name }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}"
                            href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}"
                            href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    @yield('content')

    <!-- Newsletter Subscription -->
    <section class="container text-center py-5">
        <h2 class="text-success">Subscribe to Our Newsletter</h2>
        <p>Stay updated with the latest trends in cryptocurrency and blockchain.</p>
        <form class="d-flex justify-content-center">
            <input type="email" class="form-control w-50" placeholder="Enter your email" required>
            <button class="btn btn-green ms-2">Subscribe</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 {{ $name }}. All rights reserved.</p>
        <p>Contact us: support@forteFinance | +123 456 7890</p>
        <div class="social-icons mt-3">
            <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
            <a href="https://whatsapp.com" target="_blank"><i class="uil uil-whatsapp"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
