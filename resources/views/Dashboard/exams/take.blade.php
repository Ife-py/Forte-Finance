@extends('Layout.dashboard')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="fw-bold text-success mb-3">{{ $exam->title }}</h2>
            <p class="text-muted mb-4">{{ $exam->description }}</p>

            <form action="{{ route('dashboard.exams.submit', $exam->id) }}" method="POST">
                @csrf
                @foreach ($exam->questions as $index => $question)
                    <div class="mb-4 p-3 border rounded bg-light">
                        <h5 class="fw-semibold">
                            {{ $index + 1 }}. {{ $question->question_text }}
                        </h5>

                        @foreach ($question->options as $option)
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="radio" 
                                       name="question_{{ $question->id }}" 
                                       id="option_{{ $option->id }}" 
                                       value="{{ $option->id }}" required>
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
@endsection
