@extends('Layout.admin')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <h1 class="text-success fw-bold mb-3">Platform Settings</h1>
            <p class="text-muted mb-4">Manage general platform settings, update admin information, and configure preferences.</p>
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="platform_name" class="form-label fw-semibold">Platform Name</label>
                            <input type="text" name="platform_name" id="platform_name" class="form-control" value="{{ old('platform_name', $settings->platform_name ?? '') }}" required>
                            @error('platform_name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="admin_email" class="form-label fw-semibold">Admin Email</label>
                            <input type="email" name="admin_email" id="admin_email" class="form-control" value="{{ old('admin_email', $settings->admin_email ?? '') }}" required>
                            @error('admin_email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="timezone" class="form-label fw-semibold">Timezone</label>
                            <select name="timezone" id="timezone" class="form-select">
                                <option value="UTC" {{ (old('timezone', $settings->timezone ?? '') == 'UTC') ? 'selected' : '' }}>UTC</option>
                                <option value="Africa/Lagos" {{ (old('timezone', $settings->timezone ?? '') == 'Africa/Lagos') ? 'selected' : '' }}>Africa/Lagos</option>
                                <option value="America/New_York" {{ (old('timezone', $settings->timezone ?? '') == 'America/New_York') ? 'selected' : '' }}>America/New_York</option>
                                <option value="Europe/London" {{ (old('timezone', $settings->timezone ?? '') == 'Europe/London') ? 'selected' : '' }}>Europe/London</option>
                                <!-- Add more as needed -->
                            </select>
                            @error('timezone')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="maintenance_mode" class="form-label fw-semibold">Maintenance Mode</label>
                            <select name="maintenance_mode" id="maintenance_mode" class="form-select">
                                <option value="off" {{ (old('maintenance_mode', $settings->maintenance_mode ?? '') == 'off') ? 'selected' : '' }}>Off</option>
                                <option value="on" {{ (old('maintenance_mode', $settings->maintenance_mode ?? '') == 'on') ? 'selected' : '' }}>On</option>
                            </select>
                            <small class="text-muted">Enable to temporarily disable user access for maintenance.</small>
                            @error('maintenance_mode')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="support_email" class="form-label fw-semibold">Support Email</label>
                            <input type="email" name="support_email" id="support_email" class="form-control" value="{{ old('support_email', $settings->support_email ?? '') }}">
                            @error('support_email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact_phone" class="form-label fw-semibold">Contact Phone</label>
                            <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ old('contact_phone', $settings->contact_phone ?? '') }}">
                            @error('contact_phone')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="uil uil-save"></i> Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="mt-4 text-center">
                <small class="text-muted">Last updated: {{ $settings->updated_at ? $settings->updated_at->format('M d, Y H:i') : 'Never' }}</small>
            </div> --}}
        </div>
    </div>
</div>
@endsection