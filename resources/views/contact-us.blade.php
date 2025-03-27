@extends('Layout.layout')

@section('content')
    <section class="container py-5">
        <h2 class="text-center text-success mb-4">Contact Us</h2>
        <p class="text-center mb-5">We'd love to hear from you! Please fill out the form below or reach out to us directly.</p>

        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-6">
                <form action="" method="POST" class="p-4 shadow-lg rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-success">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-success">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-success">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Send Message</button>
                </form>
            </div>

            <!-- Contact Details -->
            <div class="col-md-6">
                <div class="p-4 shadow rounded">
                    <h4 class="text-success">Get in Touch</h4>
                    <p class="mb-2"><i class="uil uil-envelope text-success"></i> Email: support@fortefinance.com</p>
                    <p class="mb-2"><i class="uil uil-phone text-success"></i> Phone: +123 456 7890</p>
                    <p class="mb-2"><i class="uil uil-map-marker text-success"></i> Address: 123 Crypto Street, Blockchain City</p>
                    <h5 class="mt-4 text-success">Follow Us</h5>
                    <div class="social-icons">
                        <a href="https://facebook.com" target="_blank" class="text-success me-3"><i class="uil uil-facebook-f"></i></a>
                        <a href="https://twitter.com" target="_blank" class="text-success me-3"><i class="uil uil-twitter"></i></a>
                        <a href="https://instagram.com" target="_blank" class="text-success me-3"><i class="uil uil-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank" class="text-success"><i class="uil uil-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection