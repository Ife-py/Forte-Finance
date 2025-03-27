<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoEdge - Education & Industrial Solutions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?cryptocurrency,bitcoin') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .hero-overlay {
            background: rgba(0, 128, 0, 0.6); /* Green overlay */
            padding: 100px 20px;
        }
        .navbar {
            background-color: #008000 !important; /* Dark Green */
        }
        .btn-primary {
            background-color: #008000;
            border: none;
        }
        .btn-primary:hover {
            background-color: #006400;
        }
        .service-box {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            background: #fff;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .service-box img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
            height: 200px;
            object-fit: cover;
        }
        .testimonials {
            background: #006400; /* Dark Green */
            color: white;
            padding: 50px 0;
        }
        .testimonial-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .footer {
            background: #004d00; /* Deep Green */
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">CryptoEdge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="student-login.html">Student Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-overlay">
            <h1>Welcome to CryptoEdge</h1>
            <p>Your trusted partner for cryptocurrency education and industry solutions.</p>
            <a href="#services" class="btn btn-primary btn-lg">Explore Services</a>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="container py-5">
        <h2 class="text-center text-success">Our Services</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="service-box">
                    <img src="https://source.unsplash.com/500x300/?bitcoin,trading" alt="Crypto Education">
                    <h3 class="text-success">Crypto Education</h3>
                    <p>Learn everything about blockchain, trading, and crypto investments from experts.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-box">
                    <img src="https://source.unsplash.com/500x300/?blockchain,technology" alt="Industrial Solutions">
                    <h3 class="text-success">Industrial Solutions</h3>
                    <p>We provide blockchain development, smart contracts, and crypto security solutions.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
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
                    <img src="https://source.unsplash.com/100x100/?person,man" alt="Client 1" class="testimonial-img">
                    <p>"CryptoEdge transformed the way I invest in cryptocurrency!"</p>
                    <small>- John Doe</small>
                </div>
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/100x100/?person,woman" alt="Client 2" class="testimonial-img">
                    <p>"Their blockchain solutions helped scale our business securely."</p>
                    <small>- Sarah Lee</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="container text-center py-5">
        <h2 class="text-success">Subscribe to Our Newsletter</h2>
        <p>Stay updated with the latest trends in cryptocurrency and blockchain.</p>
        <form class="d-flex justify-content-center">
            <input type="email" class="form-control w-50" placeholder="Enter your email" required>
            <button class="btn btn-primary ms-2">Subscribe</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 CryptoEdge. All rights reserved.</p>
        <p>Contact us: support@cryptoedge.com | +123 456 7890</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
