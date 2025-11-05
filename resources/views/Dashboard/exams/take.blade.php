@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="fw-bold text-success mb-3">{{ $exam->title }}</h2>
                <p class="text-muted mb-4">{{ $exam->description }}</p>

                {{-- Countdown Timer --}}
                <div class="alert alert-warning text-center">
                    ⏰ Time Remaining: <span id="timer" class="fw-bold text-danger"></span>
                </div>

                <form id="examForm" action="{{ route('dashboard.exams.submit', $exam->id) }}" method="POST">
                    @csrf
                    @foreach ($exam->questions as $index => $question)
                        <div class="mb-4 p-3 border rounded bg-light">
                            <h5 class="fw-semibold">
                                {{ $index + 1 }}. {{ $question->question_text }}
                            </h5>

                            @foreach ($question->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question_{{ $question->id }}"
                                        id="option_{{ $option->id }}" value="{{ $option->id }}">
                                    <label class="form-check-label" for="option_{{ $option->id }}">
                                        {{ $option->option_text }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-success btn-lg w-100 mt-3">
                        <i class="uil uil-check-circle me-2"></i> Submit Exam
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Countdown Timer Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Exam duration in minutes (from database)
            const duration = {{ $exam->duration }};
            const startTime = new Date("{{ $attempt->started_at }}").getTime();
            const endTime = startTime + duration * 60 * 1000;

            const timerDisplay = document.getElementById("timer");
            const form = document.getElementById("examForm");

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    clearInterval(interval);
                    timerDisplay.innerHTML = "Time's up!";
                    form.submit(); // Auto-submit when time ends
                    return;
                }

                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                timerDisplay.innerHTML = `${minutes}m ${seconds}s`;
            }, 1000);
        });
    </script>
@endsection
