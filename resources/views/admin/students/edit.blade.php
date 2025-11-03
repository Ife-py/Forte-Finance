@extends('Layout.admin')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <a href="{{ route('admin.students.index', $student->id) }}" class="btn btn-outline-success mb-3">
                    <i class="uil uil-arrow-left"></i> Back to Student Profile
                </a>
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="fw-bold mb-4 text-success"><i class="uil uil-edit"></i> Edit Student</h2>
                        <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $student->name) }}" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email', $student->email) }}" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Phase Selection --}}
                            <div class="mb-3">
                                <label for="phase" class="form-label fw-semibold">Phase</label>
                                <select name="phase_select" id="phase_select" class="form-select">
                                    <option value="">-- Select Phase --</option>
                                    <option value="Alpha" {{ $student->phase == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                    <option value="Beta" {{ $student->phase == 'Beta' ? 'selected' : '' }}>Beta</option>
                                    <option value="Omega" {{ $student->phase == 'Omega' ? 'selected' : '' }}>Omega</option>
                                    <option value="Sigma" {{ $student->phase == 'Sigma' ? 'selected' : '' }}>Sigma</option>
                                    <option value="Custom"
                                        {{ !in_array($student->phase, ['Alpha', 'Beta', 'Omega', 'Sigma']) && !empty($student->phase) ? 'selected' : '' }}>
                                        Custom
                                    </option>
                                </select>
                            </div>

                            {{-- Custom Phase --}}
                            <div class="mb-3" id="customPhaseField" style="display: none;">
                                <label for="custom_phase" class="form-label fw-semibold">Custom Phase</label>
                                <input type="text" name="custom_phase" id="custom_phase" class="form-control"
                                    value="{{ old('custom_phase', !in_array($student->phase, ['Alpha', 'Beta', 'Omega', 'Sigma']) ? $student->phase : '') }}"
                                    placeholder="Enter a custom phase name">
                            </div>
                            {{-- Courses --}}
                            <div class="mb-3">
                                <label for="courses" class="form-label fw-semibold">Enrolled Courses</label>
                                <select name="courses[]" id="courses" class="form-select" multiple>
                                    {{-- @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ in_array($course->id, old('courses', $student->courses->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach --}}
                                </select>
                                <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple
                                    courses.</small>
                                @error('courses')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success"><i class="uil uil-save"></i> Save
                                    Changes</button>
                                <a href="{{ route('admin.students.index', $student->id) }}"
                                    class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phaseSelect = document.getElementById('phase');
            const customPhaseField = document.getElementById('customPhaseField');
            const customPhaseInput = document.getElementById('custom_phase');

            function toggleCustomField() {
                if (phaseSelect.value === 'Custom' || (phaseSelect.value === '' && customPhaseInput.value.trim() !==
                        '')) {
                    customPhaseField.style.display = 'block';
                } else {
                    customPhaseField.style.display = 'none';
                }
            }

            toggleCustomField(); // check on page load
            phaseSelect.addEventListener('change', toggleCustomField);
            customPhaseInput.addEventListener('input', toggleCustomField);
        });
    </script>
@endsection
