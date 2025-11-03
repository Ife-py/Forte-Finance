@extends('Layout.admin')

@section('content')
<div class="container py-4">

    {{-- ✅ Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-success mb-1">{{ $exam->title }}</h2>
            <p class="text-muted mb-0">{{ $exam->description }}</p>
            <small class="text-secondary">Phase: <strong>{{ ucfirst($exam->phase) }}</strong></small>
        </div>
        <a href="{{ route('admin.exams.index') }}" class="btn btn-outline-secondary">
            <i class="uil uil-arrow-left me-1"></i> Back to Exams
        </a>
    </div>

    {{-- ✅ Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="uil uil-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr class="my-4">

    {{-- ✅ Add Question Section --}}
    <div class="card border-success shadow-sm mb-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="uil uil-plus-circle me-2"></i>Add New Question</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.exams.questions.store', $exam->id) }}" method="POST">
                @csrf

                {{-- Question Text --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Question Text</label>
                    <textarea name="question_text" class="form-control" rows="2" placeholder="Enter your question here..." required></textarea>
                </div>

                {{-- Options --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Options</label>
                    @for ($i = 0; $i < 4; $i++)
                        <div class="input-group mb-2">
                            <div class="input-group-text">
                                <input type="radio" name="correct_option" value="{{ $i }}" required>
                            </div>
                            <input type="text" name="options[]" class="form-control" placeholder="Option {{ $i + 1 }}" required>
                        </div>
                    @endfor
                    <small class="text-muted d-block mt-1">Select the radio button next to the correct answer.</small>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="uil uil-save me-2"></i> Save Question
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ List of Added Questions --}}
    <div>
        <h4 class="fw-semibold text-success mb-3">
            <i class="uil uil-list-ul me-2"></i>Added Questions
        </h4>

        @forelse ($exam->questions as $question)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="fw-bold mb-2">{{ $loop->iteration }}. {{ $question->question_text }}</h5>

                        {{-- Delete Question --}}
                        <form action="{{ route('admin.exams.questions.delete', [$exam->id, $question->id]) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this question?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="uil uil-trash-alt"></i>
                            </button>
                        </form>
                    </div>

                    {{-- Options List --}}
                    <ul class="list-group mt-2">
                        @foreach ($question->options as $option)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $option->option_text }}
                                @if ($option->is_correct)
                                    <span class="badge bg-success">✔ Correct</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @empty
            <div class="alert alert-warning">
                <i class="uil uil-exclamation-circle me-2"></i> No questions have been added yet.
            </div>
        @endforelse
    </div>
</div>
@endsection
