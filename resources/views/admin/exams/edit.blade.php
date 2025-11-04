@extends('Layout.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow border-0">
            {{-- Match the green header style from the Create Exam page --}}
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="uil uil-edit me-2"></i> Edit Exam</h4>
                <a href="{{ route('admin.exams.index') }}" class="btn btn-light btn-sm">
                    <i class="uil uil-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST" id="examEditForm">
                    @csrf
                    @method('PUT')
                    {{-- Exam Title --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Exam Title</label>
                        <input type="text" name="title" value="{{ old('title', $exam->title) }}"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Enter exam title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Enter exam description (optional)">{{ old('description', $exam->description) }}</textarea>
                    </div>

                    {{-- Duration / Start / End Time --}}
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Duration (minutes)</label>
                            <input type="number" name="duration" value="{{ old('duration', $exam->duration) }}"
                                class="form-control @error('duration') is-invalid @enderror" placeholder="e.g., 45">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Start Time</label>
                            <input type="datetime-local" name="start_time"
                                value="{{ old('start_time', $exam->start_time ? $exam->start_time->format('Y-m-d\TH:i') : '') }}"
                                class="form-control @error('start_time') is-invalid @enderror">
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">End Time</label>
                            <input type="datetime-local" name="end_time"
                                value="{{ old('end_time', $exam->end_time ? $exam->end_time->format('Y-m-d\TH:i') : '') }}"
                                class="form-control @error('end_time') is-invalid @enderror">
                            @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Phase Section --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Phase Type</label>
                            <select name="phase_type" id="phaseType"
                                class="form-select @error('phase_type') is-invalid @enderror">
                                <option value="">-- Choose Type --</option>
                                <option value="predefined"
                                    {{ old('phase_type', $exam->phase_type) == 'predefined' ? 'selected' : '' }}>Predefined
                                </option>
                                <option value="custom"
                                    {{ old('phase_type', $exam->phase_type) == 'custom' ? 'selected' : '' }}>Custom
                                </option>
                            </select>
                            @error('phase_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row" id="predefinedPhase" style="display:none;">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-semibold">Select Predefined Phase</label>
                            <select name="phase" class="form-select">
                                <option value="">-- Choose Phase --</option>
                                <option value="Alpha" {{ old('phase', $exam->phase) == 'Alpha' ? 'selected' : '' }}>🟢
                                    Alpha</option>
                                <option value="Sigma" {{ old('phase', $exam->phase) == 'Sigma' ? 'selected' : '' }}>🔵
                                    Sigma</option>
                                <option value="Beta" {{ old('phase', $exam->phase) == 'Beta' ? 'selected' : '' }}>🟣 Beta
                                </option>
                                <option value="Omega" {{ old('phase', $exam->phase) == 'Omega' ? 'selected' : '' }}>🔴
                                    Omega</option>
                            </select>
                            @error('phase')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row" id="customPhase" style="display:none;">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-semibold">Custom Phase</label>
                            <input type="text" name="custom_phase"
                                value="{{ old('custom_phase', $exam->phase_type === 'custom' ? $exam->phase : '') }}"
                                class="form-control @error('custom_phase') is-invalid @enderror"
                                placeholder="Enter custom phase (e.g., Gamma)">
                            @error('custom_phase')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="uil uil-save me-1"></i> Update Exam
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script to toggle phase fields (same as Create page) --}}
    <script>
        const phaseTypeSelect = document.getElementById('phaseType');
        const predefinedSection = document.getElementById('predefinedPhase');
        const customSection = document.getElementById('customPhase');

        function togglePhaseFields() {
            const value = phaseTypeSelect.value;
            predefinedSection.style.display = value === 'predefined' ? 'block' : 'none';
            customSection.style.display = value === 'custom' ? 'block' : 'none';
        }

        phaseTypeSelect.addEventListener('change', togglePhaseFields);
        window.addEventListener('load', togglePhaseFields);
    </script>
@endsection
