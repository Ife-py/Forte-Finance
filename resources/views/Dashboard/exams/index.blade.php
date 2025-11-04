@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold text-success mb-4">Available Exams</h2>

        @php
            $availableExams = $exams->filter(function ($exam) {
                return now()->lt($exam->end_time);
            });

            $pastExams = $exams->filter(function ($exam) {
                return now()->gt($exam->end_time);
            });
        @endphp

        {{-- ===== AVAILABLE EXAMS SECTION ===== --}}
        @forelse ($availableExams as $exam)
            @if (strtolower($exam->phase) === strtolower(Auth::user()->phase))
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="flex-grow-1">
                                <h4 class="fw-semibold text-dark mb-1">{{ $exam->title }}</h4>
                                <p class="text-muted mb-1">{{ $exam->description }}</p>
                                <p class="mb-1"><strong>Phase:</strong> {{ ucfirst($exam->phase) }}</p>
                                <p class="text-muted small mb-2">
                                    <strong>Scheduled:</strong>
                                    {{ $exam->start_time ? $exam->start_time->format('M d, Y h:i A') : 'Not set' }}
                                    –
                                    {{ $exam->end_time ? $exam->end_time->format('M d, Y h:i A') : 'Not set' }}
                                </p>

                                {{-- Countdown Display --}}
                                @if ($exam->start_time && $exam->end_time)
                                    <div class="text-primary small" id="countdown-{{ $exam->id }}"></div>
                                @endif
                            </div>

                            <div style="min-width: 180px;">
                                @php
                                    $userAttempt = $exam->attempts->where('user_id', Auth::id())->first();
                                @endphp

                                {{-- Updated Exam Button Logic --}}
                                @if ($userAttempt && $userAttempt->is_completed)
                                    <a href="{{ route('dashboard.exams.result', $userAttempt->id) }}"
                                        class="btn btn-outline-success w-100">
                                        <i class="uil uil-eye"></i> View Result
                                    </a>
                                @elseif (now()->lt($exam->start_time))
                                    <button class="btn btn-secondary w-100" disabled>
                                        <i class="uil uil-clock"></i> Starts Soon
                                    </button>
                                @elseif (now()->between($exam->start_time, $exam->end_time))
                                    <a href="{{ route('dashboard.exams.start', $exam->id) }}" class="btn btn-success w-100">
                                        <i class="uil uil-play"></i> Start Exam
                                    </a>
                                @elseif (now()->gt($exam->end_time))
                                    <button class="btn btn-danger w-100" disabled>
                                        <i class="uil uil-times"></i> Closed
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Countdown Timer Script --}}
                @if ($exam->start_time && $exam->end_time)
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const countdownEl = document.getElementById('countdown-{{ $exam->id }}');
                            const startTime = new Date("{{ $exam->start_time }}").getTime();
                            const endTime = new Date("{{ $exam->end_time }}").getTime();

                            function updateCountdown() {
                                const now = new Date().getTime();
                                let timeLeft = 0;
                                let label = '';

                                if (now < startTime) {
                                    timeLeft = startTime - now;
                                    label = 'Starts in: ';
                                } else if (now >= startTime && now <= endTime) {
                                    timeLeft = endTime - now;
                                    label = 'Ends in: ';
                                } else {
                                    countdownEl.innerHTML = "<span class='text-danger'>Exam Closed</span>";
                                    return;
                                }

                                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                                countdownEl.innerHTML = label + `<strong>${hours}h ${minutes}m ${seconds}s</strong>`;
                            }

                            updateCountdown();
                            setInterval(updateCountdown, 1000);
                        });
                    </script>
                @endif
            @endif
        @empty
            <p class="text-muted">No upcoming exams available.</p>
        @endforelse

        {{-- No Available Exams Message --}}
        @if ($availableExams->where('phase', Auth::user()->phase)->isEmpty())
            <div class="alert alert-info text-center mt-4">
                <i class="uil uil-info-circle"></i> No exams currently available for your phase.
            </div>
        @endif

        {{-- ===== PAST EXAMS SECTION ===== --}}
        <hr class="my-5">
        <h4 class="fw-bold text-dark mb-3">Past Exams</h4>

        @forelse ($pastExams as $exam)
            @if (strtolower($exam->phase) === strtolower(Auth::user()->phase))
                <div class="card mb-3 shadow-sm border-0 bg-light">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h5 class="fw-semibold text-dark mb-1">{{ $exam->title }}</h5>
                                <p class="text-muted small mb-1">{{ $exam->description }}</p>
                                <p class="text-muted small mb-0">
                                    <strong>Ended:</strong>
                                    {{ $exam->end_time ? $exam->end_time->format('M d, Y h:i A') : 'Not set' }}
                                </p>
                            </div>

                            <div style="min-width: 160px;">
                                @php
                                    $userAttempt = $exam->attempts->where('user_id', Auth::id())->first();
                                @endphp

                                @if ($userAttempt && $userAttempt->is_completed)
                                    <a href="{{ route('dashboard.exams.result', $userAttempt->id) }}"
                                        class="btn btn-outline-success w-100">
                                        <i class="uil uil-eye"></i> View Result
                                    </a>
                                @else
                                    <button class="btn btn-outline-danger w-100" disabled>
                                        <i class="uil uil-times"></i> Not Attempted
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <p class="text-muted">No past exams yet.</p>
        @endforelse
    </div>
@endsection
