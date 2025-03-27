@extends('Layout.layout')

@section('content')
    <?php $name = 'ForteFinance'; ?>
    <!-- Hero Section -->
        <!-- Hero Section -->
        <section class="hero">
            <div>
                <h1>Empowering Crypto Enthusiasts</h1>
                <p>Bridging the gap between education & real-world applications in blockchain & cryptocurrency.</p>
                <a href="{{ route('login') }}" class="btn btn-green mt-3">Get Started</a>
            </div>
        </section>

    <!-- Services Section -->
    <section id="services" class="container py-5">
        <h2 class="text-center text-success">Our Services</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="service-box">
                    <img src="{{ asset('student.jpg') }}" alt="Crypto Education" width="100" height="100">
                    <h3>Crypto Education</h3>
                    <p>Learn everything about blockchain, trading, and crypto investments from experts.</p>
                    <a href="{{ route('about-us') }}" class="btn btn-green">Learn More</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-box">
                    <img src="{{ asset('trading.jpg') }}" alt="Industrial Solutions">
                    <h3>Industrial Solutions</h3>
                    <p>We provide blockchain development, smart contracts, and crypto security solutions.</p>
                    <a href="{{ route('about-us') }}" class="btn btn-green">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials text-center">
        <h2>What Our Clients Say</h2>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/user4.jpg') }}" alt="Client 1" class="testimonial-img">
                    <p>"CryptoEdge transformed the way I invest in cryptocurrency!"</p>
                    <small>- John Doe</small>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/user1.jpg') }}" alt="Client 2" class="testimonial-img">
                    <p>"Their blockchain solutions helped scale our business securely."</p>
                    <small>- Sarah Lee</small>
                </div>
            </div>
        </div>
    </section>
@endsection
