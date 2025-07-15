@extends('Layout.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Header -->
            <div class="mb-4 text-center">
                <h1 class="fw-bold text-success"><i class="uil uil-setting"></i> Platform Settings</h1>
                <p class="text-muted">Customize and manage the core configuration of your platform.</p>
            </div>

            <!-- Settings Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body px-4 py-5">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Platform Name -->
                        <div class="mb-4">
                            <label for="platform_name" class="form-label fw-semibold"><i class="uil uil-rocket"></i> Platform Name</label>
                            <input type="text" name="platform_name" id="platform_name" class="form-control" value="{{ old('platform_name', $settings->platform_name ?? '') }}" required>
                            @error('platform_name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Admin Email -->
                        <div class="mb-4">
                            <label for="admin_email" class="form-label fw-semibold"><i class="uil uil-envelope"></i> Admin Email</label>
                            <input type="email" name="admin_email" id="admin_email" class="form-control" value="{{ old('admin_email', $settings->admin_email ?? '') }}" required>
                            @error('admin_email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Timezone -->
                        <div class="mb-4">
                            <label for="timezone" class="form-label fw-semibold"><i class="uil uil-clock"></i> Timezone</label>
                            <select name="timezone" id="timezone" class="form-select">
                                <option value="UTC" {{ (old('timezone', $settings->timezone ?? '') == 'UTC') ? 'selected' : '' }}>UTC</option>
                                <option value="Africa/Lagos" {{ (old('timezone', $settings->timezone ?? '') == 'Africa/Lagos') ? 'selected' : '' }}>Africa/Lagos</option>
                                <option value="America/New_York" {{ (old('timezone', $settings->timezone ?? '') == 'America/New_York') ? 'selected' : '' }}>America/New_York</option>
                                <option value="Europe/London" {{ (old('timezone', $settings->timezone ?? '') == 'Europe/London') ? 'selected' : '' }}>Europe/London</option>
                            </select>
                            @error('timezone')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Maintenance Mode -->
                        <div class="mb-4">
                            <label for="maintenance_mode" class="form-label fw-semibold"><i class="uil uil-constructor"></i> Maintenance Mode</label>
                            <select name="maintenance_mode" id="maintenance_mode" class="form-select">
                                <option value="off" {{ (old('maintenance_mode', $settings->maintenance_mode ?? '') == 'off') ? 'selected' : '' }}>Off</option>
                                <option value="on" {{ (old('maintenance_mode', $settings->maintenance_mode ?? '') == 'on') ? 'selected' : '' }}>On</option>
                            </select>
                            <small class="text-muted">Temporarily disable platform access for maintenance.</small>
                            @error('maintenance_mode')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Support Email -->
                        <div class="mb-4">
                            <label for="support_email" class="form-label fw-semibold"><i class="uil uil-question-circle"></i> Support Email</label>
                            <input type="email" name="support_email" id="support_email" class="form-control" value="{{ old('support_email', $settings->support_email ?? '') }}">
                            @error('support_email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact Phone -->
                        <div class="mb-4">
                            <label for="contact_phone" class="form-label fw-semibold"><i class="uil uil-phone"></i> Contact Phone</label>
                            <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ old('contact_phone', $settings->contact_phone ?? '') }}">
                            @error('contact_phone')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="uil uil-save"></i> Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Last Updated -->
            <div class="text-center mt-4">
                {{-- <small class="text-muted">
                    Last updated: {{ $settings->updated_at ? $settings->updated_at->format('M d, Y - h:i A') : 'Never' }}
                </small> --}}
            </div>
        </div>
    </div>
</div>
@endsection
