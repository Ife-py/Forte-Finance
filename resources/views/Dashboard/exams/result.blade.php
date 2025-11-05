@extends('Layout.dashboard')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4">
                {{-- Header Section --}}
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success">{{ $attempt->exam->title }}</h2>
                    <p class="text-muted">Exam Results Summary</p>
                </div>

                {{-- Score Section --}}
                <div class="text-center mb-5">
                    @php
                        $total = $attempt->exam->questions->count();
                        $score = $attempt->score;
                        $percent = $total > 0 ? round(($score / $total) * 100, 1) : 0;
                    @endphp

                    <div class="position-relative d-inline-block">
                        <div class="progress-circle mx-auto mb-3" style="--percent: {{ $percent }};">
                            <span class="percent-text">{{ $percent }}%</span>
                        </div>
                    </div>

                    <h4 class="fw-semibold text-dark">Score:
                        <span class="text-success">{{ $score }}</span> / {{ $total }}
                    </h4>
                    <p class="text-muted small">
                        {{ $percent >= 50 ? 'Great job! Keep it up!' : 'Keep practicing, you’ll improve!' }}
                    </p>
                </div>

                {{-- Questions Review Section --}}
                <h5 class="fw-bold text-dark mb-3">
                    <i class="uil uil-list-ul me-1"></i> Question Review
                </h5>

                @foreach ($attempt->exam->questions as $index => $question)
                    <div class="mb-4 p-3 border rounded-3 bg-light shadow-sm hover-card">
                        <p class="fw-semibold mb-2">
                            {{ $index + 1 }}. {{ $question->question_text }}
                        </p>

                        @php
                            $chosen = $attempt->answers->where('question_id', $question->id)->first();
                        @endphp

                        @foreach ($question->options as $option)
                            @php
                                $isChosen = $chosen && $chosen->option_id == $option->id;
                                $isCorrect = $option->is_correct;
                                $bgClass = $isCorrect
                                    ? 'bg-success text-white'
                                    : ($isChosen
                                        ? 'bg-danger text-white'
                                        : 'bg-white');
                            @endphp

                            <div
                                class="d-flex justify-content-between align-items-center border rounded-3 p-2 mb-2 option-item {{ $bgClass }}">
                                <span>{{ $option->option_text }}</span>
                                @if ($isCorrect)
                                    <i class="uil uil-check-circle"></i>
                                @elseif ($isChosen)
                                    <i class="uil uil-times-circle"></i>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach

                {{-- Footer --}}
                <div class="text-center mt-4">
                    <a href="{{ route('dashboard.exams.index') }}" class="btn btn-outline-success rounded-pill px-4">
                        <i class="uil uil-arrow-left me-1"></i> Back to Exams
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Styles --}}
    <style>
        /* Circular progress visual */
        .progress-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(var(--bs-success) calc(var(--percent)*1%), #e9ecef 0);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all 0.5s ease-in-out;
        }

        .percent-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #212529;
        }

        .hover-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .hover-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .option-item {
            transition: all 0.3s ease;
        }

        .option-item.bg-success,
        .option-item.bg-danger {
            font-weight: 500;
        }

        @media (max-width: 576px) {
            .progress-circle {
                width: 90px;
                height: 90px;
            }

            .percent-text {
                font-size: 1.2rem;
            }
        }
    </style>
@endsection
