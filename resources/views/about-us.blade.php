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
                <img src="{{ asset('image1.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
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
                <div class="p-4 shadow rounded  hover-popup">
                    <h4 class="text-success">Our Mission</h4>
                    <p>
                        To provide accessible education and innovative solutions that empower individuals and businesses in the blockchain and cryptocurrency space.
                    </p>
                    <div class="popup-content">
                        <p>We aim to make blockchain education accessible to everyone, fostering innovation and growth in the crypto space.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 shadow rounded hover-popup">
                    <h4 class="text-success">Our Vision</h4>
                    <p>
                        To be the leading platform for blockchain education and industrial solutions, fostering a global community of crypto enthusiasts.
                    </p>
                    <div class="popup-content">
                        <p>Our vision is to create a world where blockchain technology drives innovation and inclusivity.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="text-center mb-5">
            <h3 class="text-success">Our Core Values</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="p-4 shadow rounded hover-popup">
                    <i class="uil uil-lightbulb-alt text-success" style="font-size: 2rem;"></i>
                    <h5 class="mt-3">Innovation</h5>
                    <p>We embrace creativity and innovation to deliver cutting-edge solutions.</p>
                    <div class="popup-content">
                        <p>Innovation is at the heart of everything we do, driving us to create impactful solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow rounded hover-popup">
                    <i class="uil uil-users-alt text-success" style="font-size: 2rem;"></i>
                    <h5 class="mt-3">Community</h5>
                    <p>We foster a supportive and inclusive community of crypto enthusiasts.</p>
                    <div class="popup-content">
                        <p>Our community is built on trust, collaboration, and shared success.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow rounded hover-popup">
                    <i class="uil uil-shield-check text-success" style="font-size: 2rem;"></i>
                    <h5 class="mt-3">Integrity</h5>
                    <p>We uphold the highest standards of integrity and transparency.</p>
                    <div class="popup-content">
                        <p>Integrity is the foundation of our work, ensuring trust and accountability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection