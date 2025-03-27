@extends('Layout.layout')

@section('content')
    <section class="container py-5">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h2 class="text-success mb-4">About Us</h2>
            <p class="lead">
                At <strong>Forte Finance</strong>, we are dedicated to empowering individuals and businesses in the world of blockchain and cryptocurrency. 
                Our mission is to bridge the gap between education and real-world applications, providing innovative solutions and resources to help you succeed.
            </p>
        </div>

        <!-- About Section -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('images/about-us.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="text-success">Who We Are</h3>
                <p>
                    Forte Finance is a platform designed to educate, inspire, and empower crypto enthusiasts. 
                    We provide comprehensive resources, expert-led training, and cutting-edge tools to help you navigate the complexities of the crypto industry.
                </p>
                <p>
                    Whether you're a beginner or an experienced professional, our platform is tailored to meet your needs and help you achieve your goals.
                </p>
                <a href="" class="btn btn-success mt-3">Explore Our Services</a>
            </div>
        </div>

        <!-- Mission and Vision Section -->
        <div class="row text-center mb-5">
            <div class="col-md-6">
                <div class="p-4 shadow rounded bg-light">
                    <h4 class="text-success">Our Mission</h4>
                    <p>
                        To provide accessible education and innovative solutions that empower individuals and businesses in the blockchain and cryptocurrency space.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 shadow rounded bg-light">
                    <h4 class="text-success">Our Vision</h4>
                    <p>
                        To be the leading platform for blockchain education and industrial solutions, fostering a global community of crypto enthusiasts.
                    </p>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="text-center mb-5">
            <h3 class="text-success">Our Core Values</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="p-4 shadow rounded bg-light">
                    <i class="uil uil-lightbulb-alt text-success" style="font-size: 2rem;"></i>
                    <h5 class="mt-3">Innovation</h5>
                    <p>We embrace creativity and innovation to deliver cutting-edge solutions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow rounded bg-light">
                    <i class="uil uil-users-alt text-success" style="font-size: 2rem;"></i>
                    <h5 class="mt-3">Community</h5>
                    <p>We foster a supportive and inclusive community of crypto enthusiasts.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow rounded bg-light">
                    <i class="uil uil-shield-check text-success" style="font-size: 2rem;"></i>
                    <h5 class="mt-3">Integrity</h5>
                    <p>We uphold the highest standards of integrity and transparency.</p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="text-center my-5">
            <h3 class="text-success">Meet Our Team</h3>
            <p>Our team of experts is dedicated to helping you succeed in the world of blockchain and cryptocurrency.</p>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <img src="{{ asset('images/user1.jpg') }}" alt="Team Member 1" class="img-fluid rounded-circle mb-3" width="150">
                <h5>John Doe</h5>
                <p class="text-muted">CEO & Founder</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/user2.jpg') }}" alt="Team Member 2" class="img-fluid rounded-circle mb-3" width="150">
                <h5>Jane Smith</h5>
                <p class="text-muted">Blockchain Expert</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/user3.jpg') }}" alt="Team Member 3" class="img-fluid rounded-circle mb-3" width="150">
                <h5>Michael Brown</h5>
                <p class="text-muted">Crypto Analyst</p>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-5">
            <h4 class="text-success">Ready to Join the Revolution?</h4>
            <p>Take the first step towards mastering blockchain and cryptocurrency with Forte Finance.</p>
            <a href="{{ route('contact-us') }}" class="btn btn-success btn-lg">Contact Us Today</a>
        </div>
    </section>
@endsection