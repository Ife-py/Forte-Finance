@extends('Layout.layout')

@section('content')
    <?php $name = 'ForteFinance'; ?>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center text-white position-relative overflow-hidden"
        style="min-height: 100vh; background: linear-gradient(to right, rgba(6,78,59,0.85), rgba(16,185,129,0.85)), url('{{ asset('image1.jpg') }}') no-repeat center center / cover;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3 animate-fade-up">Empowering Crypto Enthusiasts</h1>
                    <p class="lead mb-4 animate-fade-up delay-1">Bridging the gap between education & real-world applications in
                        blockchain & cryptocurrency.</p>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-light px-5 rounded-pill shadow animate-fade-up delay-2">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-success fw-bold mb-5">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6">
                    <div class="card h-100 border-0 shadow-sm service-card">
                        <img src="{{ asset('student.jpg') }}" alt="Crypto Education" class="card-img-top rounded-top"
                            style="height: 260px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-success fw-semibold mb-2">Crypto Education</h4>
                            <p class="card-text text-muted">Master blockchain, trading, and cryptocurrency investment with
                                hands-on learning from industry professionals.</p>
                            <a href="{{ route('about-us') }}" class="btn btn-outline-success rounded-pill px-4 mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="card h-100 border-0 shadow-sm service-card">
                        <img src="{{ asset('trading.jpg') }}" alt="Industrial Solutions" class="card-img-top rounded-top"
                            style="height: 260px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-success fw-semibold mb-2">Industrial Solutions</h4>
                            <p class="card-text text-muted">We deliver blockchain-based systems, smart contract deployment,
                                and secure digital asset management.</p>
                            <a href="{{ route('about-us') }}" class="btn btn-outline-success rounded-pill px-4 mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-success text-white text-center position-relative">
        <div class="container">
            <h2 class="fw-bold mb-4">What Our Clients Say</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-5">
                    <div class="bg-white text-dark p-4 rounded-4 shadow-sm h-100 text-start hover-shadow">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/user4.jpg') }}" alt="Client 1" class="rounded-circle me-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <strong class="text-success">John Doe</strong><br>
                                <small class="text-muted">Crypto Investor</small>
                            </div>
                        </div>
                        <p class="mb-0 fst-italic">“ForteFinance transformed the way I invest and understand
                            cryptocurrency. Highly recommend!”</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="bg-white text-dark p-4 rounded-4 shadow-sm h-100 text-start hover-shadow">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/user1.jpg') }}" alt="Client 2" class="rounded-circle me-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <strong class="text-success">Sarah Lee</strong><br>
                                <small class="text-muted">Startup CEO</small>
                            </div>
                        </div>
                        <p class="mb-0 fst-italic">“Their blockchain services gave us the competitive edge we needed.
                            Truly visionary solutions.”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container">
            <h3 class="fw-bold mb-3">Ready to explore the future of finance?</h3>
            <p class="mb-4 text-white-50">Join thousands of learners and innovators at <strong>{{ $name }}</strong> today.</p>
            <a href="{{ route('login') }}" class="btn btn-success btn-lg rounded-pill px-5 shadow-sm">Join Now</a>
        </div>
    </section>

    <style>
        /* Smooth hover and animation */
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(25, 135, 84, 0.25) !important;
        }

        /* Subtle fade-up animation */
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            opacity: 0;
            animation: fadeUp 1s ease forwards;
        }

        .animate-fade-up.delay-1 {
            animation-delay: 0.3s;
        }

        .animate-fade-up.delay-2 {
            animation-delay: 0.6s;
        }

        @media (max-width: 768px) {
            .hero {
                background-position: center top;
                text-align: center;
                padding: 80px 20px;
            }

            .card-body p {
                font-size: 0.95rem;
            }
        }
    </style>
@endsection
