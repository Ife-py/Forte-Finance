@extends('Layout.layout')

@section('content')
    <section class="about-section py-5">
        <!-- Hero -->
        <div class="container text-center mb-5">
            <h2 class="fw-bold text-success mb-3 display-6">About Us</h2>
            <p class="lead text-muted mx-auto" style="max-width: 720px;">
                At <span class="fw-semibold text-success">Forte Finance</span>, we empower individuals and businesses in
                blockchain and cryptocurrency.
                Our mission is to bridge the gap between education and real-world applications — providing innovative tools
                and resources for your financial growth.
            </p>
        </div>

        <!-- About -->
        <div class="container mb-5">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <div class="about-img position-relative overflow-hidden rounded-4 shadow-sm">
                        <img src="{{ asset('image1.jpg') }}" alt="About ForteFinance" class="img-fluid w-100"
                            style="object-fit: cover; min-height: 300px;">
                        <div class="img-overlay"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold text-success mb-3">Who We Are</h3>
                    <p class="text-muted mb-3">
                        Forte Finance is built to educate, inspire, and empower the next generation of crypto enthusiasts.
                        We combine expert knowledge, user-friendly tools, and real-world training to simplify the blockchain
                        space.
                    </p>
                    <p class="text-muted mb-4">
                        From beginners to professionals, our platform is tailored to guide your journey in digital finance —
                        step by step.
                    </p>
                    <a href="#" class="btn btn-success rounded-pill px-4 py-2 fw-semibold shadow-sm">
                        Explore Our Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Mission & Vision -->
        <div class="container mb-5">
            <div class="row g-4 text-center">
                <div class="col-md-6">
                    <div class="info-card h-100 p-4 bg-white shadow-sm rounded-4">
                        <div class="icon-circle mb-3">
                            <i class="uil uil-bullseye"></i>
                        </div>
                        <h4 class="fw-bold text-success mb-2">Our Mission</h4>
                        <p class="text-muted small">
                            To make blockchain education and technology accessible — empowering individuals and businesses
                            to innovate with confidence.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card h-100 p-4 bg-white shadow-sm rounded-4">
                        <div class="icon-circle mb-3">
                            <i class="uil uil-eye"></i>
                        </div>
                        <h4 class="fw-bold text-success mb-2">Our Vision</h4>
                        <p class="text-muted small">
                            To be a global leader in blockchain innovation — inspiring trust, inclusivity, and growth
                            through digital finance.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values -->
        <div class="container text-center">
            <h3 class="fw-bold text-success mb-4">Our Core Values</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card h-100 p-4 rounded-4 shadow-sm bg-white">
                        <div class="icon-circle mb-3"><i class="uil uil-lightbulb-alt"></i></div>
                        <h5 class="fw-semibold">Innovation</h5>
                        <p class="text-muted small">
                            We push boundaries through creativity, research, and forward-thinking solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card h-100 p-4 rounded-4 shadow-sm bg-white">
                        <div class="icon-circle mb-3"><i class="uil uil-users-alt"></i></div>
                        <h5 class="fw-semibold">Community</h5>
                        <p class="text-muted small">
                            We grow stronger together — building an inclusive ecosystem of learners and leaders.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card h-100 p-4 rounded-4 shadow-sm bg-white">
                        <div class="icon-circle mb-3"><i class="uil uil-shield-check"></i></div>
                        <h5 class="fw-semibold">Integrity</h5>
                        <p class="text-muted small">
                            Transparency and accountability are the foundations of our commitment to you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .about-section {
            background: #f8f9fa;
        }

        .about-img img {
            transition: transform 0.4s ease;
        }

        .about-img:hover img {
            transform: scale(1.05);
        }

        .img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(25, 135, 84, 0.15), rgba(67, 206, 162, 0.15));
            border-radius: 1rem;
        }

        .icon-circle {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, #a3f0d1, #43cea2);
            color: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 4px 10px rgba(67, 206, 162, 0.3);
        }

        .info-card,
        .value-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .info-card:hover,
        .value-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(25, 135, 84, 0.15);
        }

        @media (max-width: 767px) {
            .about-section {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .about-img img {
                min-height: 200px;
            }

            .icon-circle {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }

            .value-card,
            .info-card {
                padding: 1.5rem !important;
            }
        }
    </style>
@endsection
