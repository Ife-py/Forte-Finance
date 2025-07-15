@extends('Layout.layout')

@section('content')
<section class="container py-5">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-success mb-3">About Us</h2>
        <p class="lead text-dark">
            At <span class="fw-semibold text-success">Forte Finance</span>, we empower individuals and businesses in blockchain and cryptocurrency. 
            Our mission is to bridge the gap between education and real-world applications, providing innovative solutions and resources to help you succeed.
        </p>
    </div>

    <!-- About Section -->
    <div class="row align-items-center mb-5 g-4">
        <div class="col-md-6">
            <div class="about-img-wrapper position-relative">
                <img src="{{ asset('image1.jpg') }}" alt="About Us" class="img-fluid rounded-4 shadow-lg w-100" style="min-height:250px; object-fit:cover;">
                <span class="about-img-overlay"></span>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="fw-bold text-success mb-3">Who We Are</h3>
            <p class="text-muted">
                Forte Finance is designed to educate, inspire, and empower crypto enthusiasts. 
                We provide comprehensive resources, expert-led training, and cutting-edge tools to help you navigate the complexities of the crypto industry.
            </p>
            <p class="text-muted">
                Whether you're a beginner or an experienced professional, our platform is tailored to meet your needs and help you achieve your goals.
            </p>
            <a href="#" class="btn btn-success mt-3 px-4 rounded-pill shadow-sm">Explore Our Services</a>
        </div>
    </div>

    <!-- Mission and Vision Section -->
    <div class="row text-center mb-5 g-4">
        <div class="col-md-6">
            <div class="p-4 shadow rounded-4 bg-white h-100 hover-popup1">
                <h4 class="fw-bold text-success mb-2"><i class="uil uil-bullseye"></i> Our Mission</h4>
                <p class="text-muted mb-2">
                    To provide accessible education and innovative solutions that empower individuals and businesses in the blockchain and cryptocurrency space.
                </p>
                <div class="popup-content text-success small">
                    We aim to make blockchain education accessible to everyone, fostering innovation and growth in the crypto space.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 shadow rounded-4 bg-white h-100 hover-popup1">
                <h4 class="fw-bold text-success mb-2"><i class="uil uil-eye"></i> Our Vision</h4>
                <p class="text-muted mb-2">
                    To be the leading platform for blockchain education and industrial solutions, fostering a global community of crypto enthusiasts.
                </p>
                <div class="popup-content text-success small">
                    Our vision is to create a world where blockchain technology drives innovation and inclusivity.
                </div>
            </div>
        </div>
    </div>

    <!-- Core Values Section -->
    <div class="text-center mb-4">
        <h3 class="fw-bold text-success">Our Core Values</h3>
    </div>
    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="p-4 shadow rounded-4 bg-white h-100 hover-popup1">
                <i class="uil uil-lightbulb-alt text-success" style="font-size: 2.5rem;"></i>
                <h5 class="mt-3 fw-semibold">Innovation</h5>
                <p class="text-muted">We embrace creativity and innovation to deliver cutting-edge solutions.</p>
                <div class="popup-content text-success small">
                    Innovation is at the heart of everything we do, driving us to create impactful solutions.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 shadow rounded-4 bg-white h-100 hover-popup1">
                <i class="uil uil-users-alt text-success" style="font-size: 2.5rem;"></i>
                <h5 class="mt-3 fw-semibold">Community</h5>
                <p class="text-muted">We foster a supportive and inclusive community of crypto enthusiasts.</p>
                <div class="popup-content text-success small">
                    Our community is built on trust, collaboration, and shared success.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 shadow rounded-4 bg-white h-100 hover-popup1">
                <i class="uil uil-shield-check text-success" style="font-size: 2.5rem;"></i>
                <h5 class="mt-3 fw-semibold">Integrity</h5>
                <p class="text-muted">We uphold the highest standards of integrity and transparency.</p>
                <div class="popup-content text-success small">
                    Integrity is the foundation of our work, ensuring trust and accountability.
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .about-img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 1.5rem;
    }
    .about-img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(33,150,83,0.08) 0%, rgba(67,206,162,0.12) 100%);
        border-radius: 1.5rem;
        pointer-events: none;
    }
    .hover-popup1 {
        transition: transform 0.18s, box-shadow 0.18s, background 0.18s;
        border-radius: 1.5rem;
    }
    .hover-popup1:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(33, 150, 83, 0.18);
        background: linear-gradient(135deg, #e6fff5 60%, #f8f9fa 100%);
    }
    .popup-content {
        opacity: 0.85;
        margin-top: 8px;
    }
    @media (max-width: 767px) {
        .about-img-wrapper img {
            min-height: 180px;
        }
        .rounded-4 {
            border-radius: 1rem !important;
        }
    }
</style>
@endsection