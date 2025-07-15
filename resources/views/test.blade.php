@extends('Layout.layout')

@section('content')
    <?php $name = 'ForteFinance'; ?>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center text-white"
        style="height: 100vh; background: linear-gradient(to right, rgba(6,78,59,0.85), rgba(16,185,129,0.85)), url('{{ asset('image1.jpg') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Empowering Crypto Enthusiasts</h1>
                    <p class="lead mb-4">Bridging the gap between education & real-world applications in blockchain &
                        cryptocurrency.</p>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-light px-5 rounded-pill shadow">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-success fw-bold mb-5">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 shadow border-0 service-card hover-shadow">
                        <img src="{{ asset('student.jpg') }}" alt="Crypto Education" class="card-img-top rounded-top"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-success fw-semibold">Crypto Education</h4>
                            <p class="card-text text-muted">Learn everything about blockchain, trading, and crypto
                                investments from industry professionals.</p>
                            <a href="{{ route('about-us') }}" class="btn btn-outline-success rounded-pill px-4 mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow border-0 service-card hover-shadow">
                        <img src="{{ asset('trading.jpg') }}" alt="Industrial Solutions" class="card-img-top rounded-top"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-success fw-semibold">Industrial Solutions</h4>
                            <p class="card-text text-muted">We offer blockchain development, smart contract deployment, and
                                crypto security infrastructure.</p>
                            <a href="{{ route('about-us') }}" class="btn btn-outline-success rounded-pill px-4 mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-success text-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-4">What Our Clients Say</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-5">
                    <div class="bg-white text-dark p-4 rounded shadow text-start">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/user4.jpg') }}" alt="Client 1" class="rounded-circle me-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <strong class="text-success">John Doe</strong><br>
                                <small>Crypto Investor</small>
                            </div>
                        </div>
                        <p class="mb-0">“CryptoEdge transformed the way I invest and understand cryptocurrency. Highly
                            recommend!”</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="bg-white text-dark p-4 rounded shadow text-start">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/user1.jpg') }}" alt="Client 2" class="rounded-circle me-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <strong class="text-success">Sarah Lee</strong><br>
                                <small>Startup CEO</small>
                            </div>
                        </div>
                        <p class="mb-0">“Their blockchain services gave us the competitive edge we needed. Truly visionary
                            solutions.”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container">
            <h3 class="fw-bold">Ready to explore the future of finance?</h3>
            <p class="mb-4">Join thousands of learners and innovators at ForteFinance today.</p>
            <a href="{{ route('login') }}" class="btn btn-success btn-lg rounded-pill px-4">Join Now</a>
        </div>
    </section>

    <style>
        .hover-shadow:hover {
            transform: translateY(-5px);
            transition: 0.3s ease;
        }
    </style>
@endsection
