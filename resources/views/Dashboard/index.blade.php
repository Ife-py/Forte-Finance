@extends('Layout.dashboard')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('LogoFF.png') }}" alt="Logo" width="65" height="65"
                        class="rounded-circle border shadow-sm">
                    <div>
                        <h3 class="fw-bold text-success mb-0">Welcome, {{ $user->name }}</h3>
                        @if (!empty($user->phase))
                            <span class="badge rounded-pill bg-light text-success border">
                                {{ ucfirst($user->phase) }}
                                @switch(strtolower($user->phase))
                                    @case('alpha')
                                        🦁
                                    @break

                                    @case('beta')
                                        🐺
                                    @break

                                    @case('omega')
                                        🦉
                                    @break

                                    @case('sigma')
                                        🐍
                                    @break

                                    @default
                                        🌟
                                @endswitch
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mt-3 mt-md-0 d-flex gap-2">
                    <a href="#" class="btn btn-outline-success px-4">
                        <i class="uil uil-plus-circle me-2"></i> Add Course
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger px-4">
                            <i class="uil uil-signout me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Metrics Section -->
        <div class="row g-4 mb-4">
            @php
                $stats = [
                    [
                        'icon' => 'uil-users-alt',
                        'title' => 'Total Students',
                        'value' => '1,234',
                        'desc' => 'Active Enrollments',
                    ],
                    [
                        'icon' => 'uil-book-open',
                        'title' => 'Courses Available',
                        'value' => '56',
                        'desc' => 'Open for this phase',
                    ],
                    [
                        'icon' => 'uil-graduation-cap',
                        'title' => 'Graduates',
                        'value' => '345',
                        'desc' => 'Completed successfully',
                    ],
                    [
                        'icon' => 'uil-clock',
                        'title' => 'Pending Assignments',
                        'value' => '12',
                        'desc' => 'Awaiting review',
                    ],
                ];
            @endphp

            @foreach ($stats as $stat)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="{{ $stat['icon'] }} text-success" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-semibold mt-2 text-success">{{ $stat['title'] }}</h5>
                            <h3 class="fw-bold mb-1">{{ $stat['value'] }}</h3>
                            <small class="text-muted">{{ $stat['desc'] }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Two Column Layout -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white border-0">
                        <h5 class="fw-bold text-success mb-0"><i class="uil uil-history me-2"></i> Recent Activities</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">🧑‍🎓 <strong>John Doe</strong> enrolled in <em>"Blockchain
                                    Basics"</em>.</li>
                            <li class="list-group-item px-0">📘 Added new course <em>"Advanced Crypto Trading"</em>.</li>
                            <li class="list-group-item px-0">📝 <strong>Jane Smith</strong> submitted <em>"Smart Contracts
                                    101"</em>.</li>
                            <li class="list-group-item px-0">🏆 Certificate issued to <strong>Michael Brown</strong>.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white border-0">
                        <h5 class="fw-bold text-success mb-0"><i class="uil uil-books me-2"></i> Course Materials</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-success"><i
                                        class="uil uil-file-alt me-2"></i> Blockchain Intro (PDF)</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-success"><i
                                        class="uil uil-play-circle me-2"></i> Security Video Series</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-success"><i
                                        class="uil uil-presentation-play me-2"></i> Smart Contracts Slides</a></li>
                            <li><a href="#" class="text-decoration-none text-success"><i
                                        class="uil uil-link me-2"></i> Blog Recommendations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events & Announcements -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white border-0">
                        <h5 class="fw-bold text-success mb-0"><i class="uil uil-calendar-alt me-2"></i> Upcoming Events</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">🗓 Webinar — <strong>"Blockchain for Beginners"</strong> on
                                <em>April 20, 2025</em></li>
                            <li class="list-group-item px-0">💻 Workshop — <strong>"Smart Contracts Dev"</strong> on
                                <em>April 25, 2025</em></li>
                            <li class="list-group-item px-0">⚡ Hackathon — <strong>"Crypto Innovations"</strong> on <em>May
                                    5, 2025</em></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white border-0">
                        <h5 class="fw-bold text-success mb-0"><i class="uil uil-bullhorn me-2"></i> Announcements</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">🚀 New course <strong>"Advanced Blockchain Dev"</strong> now
                                available!</li>
                            <li class="list-group-item px-0">📢 Submit <strong>"Crypto Security"</strong> assignments by
                                <em>April 18, 2025</em>.</li>
                            <li class="list-group-item px-0">🏅 Congrats <strong>Jane Smith</strong> for top score in
                                Blockchain Basics!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
