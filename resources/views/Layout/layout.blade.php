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

    <!-- Newsletter + Footer Combined -->
    <section class="footer-blend text-white pt-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Stay Connected</h2>
            <p class="mb-4">Subscribe to our newsletter and never miss updates on blockchain and crypto innovations.
            </p>
            <form class="newsletter-form mx-auto mb-5">
                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                    <input type="email" class="form-control border-0 ps-4 py-3" placeholder="Enter your email address"
                        required>
                    <button class="btn btn-subscribe px-4 fw-semibold" type="submit">Subscribe</button>
                </div>
            </form>

            <div class="row gy-4 text-start text-md-start">
                <!-- About -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-3">About ForteFinance</h5>
                    <p class="small opacity-75">
                        ForteFinance empowers individuals and businesses through blockchain and crypto education,
                        bridging the gap between learning and real-world application.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('index') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('about-us') }}" class="footer-link">About Us</a></li>
                        <li><a href="{{ route('contact-us') }}" class="footer-link">Contact Us</a></li>
                        <li><a href="{{ route('login') }}" class="footer-link">Login</a></li>
                    </ul>
                </div>

                <!-- Contact & Socials -->
                <div class="col-lg-4 col-md-12">
                    <h5 class="fw-bold mb-3">Get in Touch</h5>
                    <p class="small mb-1"><i class="uil uil-envelope-alt me-2"></i> support@fortefinance.com</p>
                    <p class="small mb-3"><i class="uil uil-phone me-2"></i> +123 456 7890</p>
                    <div class="social-icons mt-2">
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-instagram"></i></a>
                        <a href="#"><i class="uil uil-linkedin"></i></a>
                        <a href="#"><i class="uil uil-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <hr class="mt-5 mb-3 opacity-25">
            <p class="small opacity-75 mb-0">&copy; {{ date('Y') }} ForteFinance. All Rights Reserved.</p>
        </div>
    </section>

    <style>
        /* Combined Newsletter + Footer Styling */
        .footer-blend {
            background: linear-gradient(180deg, #1fb97e 0%, #0f3f25 90%);
            color: #fff;
            padding-bottom: 2rem;
        }

        .newsletter-form {
            max-width: 550px;
        }

        .newsletter-form .form-control {
            border: none;
            outline: none;
            font-size: 1rem;
        }

        .newsletter-form .btn-subscribe {
            background-color: #fff;
            color: #198754;
            border: none;
            transition: all 0.3s ease;
        }

        .newsletter-form .btn-subscribe:hover {
            background-color: #e9f7ef;
            color: #157347;
            transform: scale(1.05);
        }

        .footer-link {
            color: #d4edda;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 6px;
            transition: color 0.3s, transform 0.2s;
        }

        .footer-link:hover {
            color: #ffffff;
            transform: translateX(4px);
        }

        .social-icons a {
            color: #fff;
            font-size: 1.2rem;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            color: #a8f5c4;
            transform: scale(1.15);
        }

        hr {
            border-color: rgba(255, 255, 255, 0.3);
        }

        @media (max-width: 767px) {
            .footer-blend {
                text-align: center;
                padding-top: 3rem;
                padding-bottom: 1.5rem;
            }

            .newsletter-form .input-group {
                flex-direction: column;
                border-radius: 1rem;
            }

            .newsletter-form .form-control {
                border-radius: 1rem 1rem 0 0;
            }

            .newsletter-form .btn-subscribe {
                width: 100%;
                border-radius: 0 0 1rem 1rem;
                margin-top: 8px;
            }

            .social-icons {
                margin-top: 10px;
            }
        }
    </style>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
