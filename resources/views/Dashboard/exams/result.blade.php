@extends('Layout.dashboard')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold text-success">{{ $attempt->exam->title }}</h2>
            <p class="text-muted mb-4">Exam Result</p>

            <div class="alert alert-success text-center">
                <h4>Your Score: {{ $attempt->score }} / {{ $attempt->exam->questions->count() }}</h4>
            </div>

            <h5 class="fw-semibold mb-3">Review Questions</h5>
            @foreach ($attempt->exam->questions as $index => $question)
                <div class="mb-3 p-3 border rounded bg-light">
                    <p class="fw-semibold mb-1">{{ $index + 1 }}. {{ $question->question_text }}</p>

                    @foreach ($question->options as $option)
                        @php
                            $chosen = $attempt->answers->where('question_id', $question->id)->first();
                        @endphp
                        <div class="d-flex justify-content-between align-items-center
                            {{ $option->is_correct ? 'bg-success text-white p-2 rounded' : '' }}
                            {{ $chosen && $chosen->option_id == $option->id && !$option->is_correct ? 'bg-danger text-white p-2 rounded' : '' }}">
                            <span>{{ $option->option_text }}</span>
                            @if($option->is_correct)
                                <span>✔</span>
                            @elseif($chosen && $chosen->option_id == $option->id)
                                <span>✖</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach

            <a href="{{ route('dashboard.exams.index') }}" class="btn btn-outline-success mt-4">
                <i class="uil uil-arrow-left"></i> Back to Exams
            </a>
        </div>
    </div>
</div>
@endsection
