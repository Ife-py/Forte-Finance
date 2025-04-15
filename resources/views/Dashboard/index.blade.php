@extends('Layout.dashboard')

@section('content')
    <div class="container-fluid py-4">
        <!-- Dashboard Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success fw-bold">Dashboard</h1>
            <a href="#" class="btn btn-success btn-lg">+ Add New Item</a>
        </div>

        <!-- Dashboard Metrics -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm p-4 hover-popup text-center">
                    <i class="uil uil-users-alt text-success" style="font-size: 2.5rem;"></i>
                    <h5 class="text-success mt-3">Total Users</h5>
                    <h2 class="fw-bold">1,234</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-4 hover-popup text-center">
                    <i class="uil uil-briefcase-alt text-success" style="font-size: 2.5rem;"></i>
                    <h5 class="text-success mt-3">Active Projects</h5>
                    <h2 class="fw-bold">56</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-4 hover-popup text-center">
                    <i class="uil uil-dollar-sign-alt text-success" style="font-size: 2.5rem;"></i>
                    <h5 class="text-success mt-3">Revenue</h5>
                    <h2 class="fw-bold">$12,345</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-4 hover-popup text-center">
                    <i class="uil uil-tasks text-success" style="font-size: 2.5rem;"></i>
                    <h5 class="text-success mt-3">Pending Tasks</h5>
                    <h2 class="fw-bold">8</h2>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm p-4 hover-popup">
                    <h5 class="text-success fw-bold">Recent Activities</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">User <strong>John Doe</strong> registered.</li>
                        <li class="list-group-item">Project <strong>"Crypto Wallet"</strong> was updated.</li>
                        <li class="list-group-item">Revenue report for <strong>April</strong> was generated.</li>
                        <li class="list-group-item">Task <strong>"Update Documentation"</strong> was completed.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4 hover-popup">
                    <h5 class="text-success fw-bold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-success"><i class="uil uil-user-circle"></i> Manage Users</a></li>
                        <li><a href="#" class="text-success"><i class="uil uil-chart-line"></i> View Reports</a></li>
                        <li><a href="#" class="text-success"><i class="uil uil-cog"></i> Settings</a></li>
                        <li><a href="#" class="text-success"><i class="uil uil-question-circle"></i> Help Center</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection