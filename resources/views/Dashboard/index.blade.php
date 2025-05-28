@extends('Layout.dashboard')

@section('content')
    <div class="py-4">
        <!-- Dashboard Header -->
        <div class="container-fluid py-3 px-4 bg-white rounded shadow-sm mb-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 d-flex align-items-center gap-3">
                    <img src="{{ asset('LogoFF.png') }}" alt="Logo" width="60" height="60"
                        class="rounded-circle border shadow-sm">
                    <h2 class="text-success fw-bold mb-0">Welcome, {{ $user->name }}!</h2>
                </div>

                <div class="col-md-6 d-flex justify-content-md-end gap-3 mt-3 mt-md-0">
                    <a href="#" class="btn btn-success btn-lg px-4 shadow">
                        <i class="uil uil-plus-circle me-2"></i> Add New Course
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg px-4 shadow">
                            <i class="uil uil-signout me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Dashboard Metrics -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-lg p-4 hover-popup text-center border-0" style="background: #f8f9fa;">
                    <i class="uil uil-users-alt text-success" style="font-size: 3rem;"></i>
                    <h5 class="text-success mt-3">Total Students</h5>
                    <h2 class="fw-bold">1,234</h2>
                    <p class="text-muted">Active students enrolled</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-lg p-4 hover-popup text-center border-0" style="background: #f8f9fa;">
                    <i class="uil uil-book-open text-success" style="font-size: 3rem;"></i>
                    <h5 class="text-success mt-3">Courses Available</h5>
                    <h2 class="fw-bold">56</h2>
                    <p class="text-muted">Courses currently available for this Phase</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-lg p-4 hover-popup text-center border-0" style="background: #f8f9fa;">
                    <i class="uil uil-graduation-cap text-success" style="font-size: 3rem;"></i>
                    <h5 class="text-success mt-3">Graduates</h5>
                    <h2 class="fw-bold">345</h2>
                    <p class="text-muted">Students who graduated</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-lg p-4 hover-popup text-center border-0" style="background: #f8f9fa;">
                    <i class="uil uil-clock text-success" style="font-size: 3rem;"></i>
                    <h5 class="text-success mt-3">Pending Assignments</h5>
                    <h2 class="fw-bold">12</h2>
                    <p class="text-muted">Assignments awaiting review</p>
                </div>
            </div>
        </div>

        <!-- Recent Activities & Quick Links -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card shadow-lg p-4 hover-popup border-0 h-100" style="background: #ffffff;">
                    <h5 class="text-success fw-bold"><i class="uil uil-history"></i> Recent Activities</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Student <strong>John Doe</strong> enrolled in <strong>"Blockchain
                                Basics"</strong>.</li>
                        <li class="list-group-item">New course <strong>"Advanced Crypto Trading"</strong> was added.</li>
                        <li class="list-group-item">Assignment <strong>"Smart Contracts 101"</strong> was submitted by
                            <strong>Jane Smith</strong>.</li>
                        <li class="list-group-item">Certificate issued to <strong>Michael Brown</strong> for completing
                            <strong>"Crypto Security"</strong>.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-lg p-4 hover-popup border-0 h-100" style="background: #ffffff;">
                    <h5 class="text-success fw-bold mb-3"><i class="uil uil-books"></i> Course Materials</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="#" class="text-success text-decoration-none">
                                <i class="uil uil-file-alt"></i> Introduction to Blockchain (PDF)
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-success text-decoration-none">
                                <i class="uil uil-play-circle"></i> Crypto Security Video Series
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-success text-decoration-none">
                                <i class="uil uil-presentation-play"></i> Smart Contracts Slide Deck
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-success text-decoration-none">
                                <i class="uil uil-link"></i> Recommended Articles & Blogs
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-lg p-4 hover-popup border-0" style="background: #f8f9fa;">
                    <h5 class="text-success fw-bold"><i class="uil uil-calendar-alt"></i> Upcoming Events</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Webinar on <strong>"Blockchain for Beginners"</strong> - <em>April 20,
                                2025</em></li>
                        <li class="list-group-item">Workshop: <strong>"Smart Contracts Development"</strong> - <em>April 25,
                                2025</em></li>
                        <li class="list-group-item">Hackathon: <strong>"Crypto Innovations"</strong> - <em>May 5, 2025</em>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Top Performing Students -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-lg p-4 hover-popup border-0" style="background: #ffffff;">
                    <h5 class="text-success fw-bold"><i class="uil uil-trophy"></i> Top Performing Students</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Jane Smith</strong> - 98% in <strong>"Blockchain
                                Basics"</strong></li>
                        <li class="list-group-item"><strong>Michael Brown</strong> - 95% in <strong>"Crypto
                                Security"</strong></li>
                        <li class="list-group-item"><strong>John Doe</strong> - 93% in <strong>"Smart Contracts
                                101"</strong></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Announcements -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-lg p-4 hover-popup border-0" style="background: #f8f9fa;">
                    <h5 class="text-success fw-bold"><i class="uil uil-bullhorn"></i> Announcements</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">New course <strong>"Advanced Blockchain Development"</strong> is now
                            available!</li>
                        <li class="list-group-item">Reminder: Submit assignments for <strong>"Crypto Security"</strong> by
                            <em>April 18, 2025</em>.
                        </li>
                        <li class="list-group-item">Congratulations to <strong>Jane Smith</strong> for achieving the
                            highest score in <strong>"Blockchain Basics"</strong>.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
