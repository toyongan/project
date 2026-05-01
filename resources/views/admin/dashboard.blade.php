<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .ml-card {
            background: #faf8f5;
            border: 1px solid #e2ddd7;
            border-radius: 14px;
            overflow: hidden;
        }
        .ml-card-header {
            padding: 14px 22px;
            border-bottom: 1px solid #e8e3dd;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f5f2ee;
        }
        .card-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: #ede8e0;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 15px;
        }
        .section-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #3d3530;
        }
        .ml-card-body { padding: 20px 22px; }

        /* Welcome */
        .welcome-name {
            font-size: 1rem;
            font-weight: 700;
            color: #3d3530;
            margin-bottom: 4px;
        }
        .welcome-sub {
            font-size: 0.82rem;
            color: #a09890;
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }
        .stat-card {
            background: #faf8f5;
            border: 1px solid #e2ddd7;
            border-radius: 14px;
            padding: 18px 16px 16px;
        }
        .stat-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 10px;
        }
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            color: #3d3530;
        }
        .stat-card.accent-users .stat-value    { color: #3730a3; }
        .stat-card.accent-applicants .stat-value { color: #15803d; }
        .stat-card.accent-hr .stat-value       { color: #92400e; }
        .stat-card.accent-jobs .stat-value     { color: #9d174d; }

        /* Quick links grid */
        .quicklinks-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        .quicklink-card {
            background: #faf8f5;
            border: 1px solid #e2ddd7;
            border-radius: 14px;
            overflow: hidden;
        }
        .quicklink-header {
            padding: 14px 22px;
            border-bottom: 1px solid #e8e3dd;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f5f2ee;
        }
        .quicklink-body {
            padding: 18px 22px;
        }
        .quicklink-desc {
            font-size: 0.82rem;
            color: #a09890;
            margin-bottom: 16px;
            line-height: 1.6;
        }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 20px;
            background: #7c5c4a;
            color: #fff;
            font-size: 0.82rem;
            font-weight: 700;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.02em;
            text-decoration: none;
        }
        .btn-primary:hover { background: #6a4d3e; }
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 20px;
            background: #5b4a6e;
            color: #fff;
            font-size: 0.82rem;
            font-weight: 700;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.02em;
            text-decoration: none;
        }
        .btn-secondary:hover { background: #4a3a5c; }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            {{-- Welcome --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">👋</div>
                    <span class="section-title">Welcome Back</span>
                </div>
                <div class="ml-card-body">
                    <p class="welcome-name">Welcome, {{ Auth::user()->name }}!</p>
                    <p class="welcome-sub">Manage users and generate reports from this panel.</p>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-grid">
                <div class="stat-card accent-users">
                    <p class="stat-label">Total Users</p>
                    <p class="stat-value">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="stat-card accent-applicants">
                    <p class="stat-label">Applicants</p>
                    <p class="stat-value">{{ $totalApplicants ?? 0 }}</p>
                </div>
                <div class="stat-card accent-hr">
                    <p class="stat-label">HR Managers</p>
                    <p class="stat-value">{{ $totalHrManagers ?? 0 }}</p>
                </div>
                <div class="stat-card accent-jobs">
                    <p class="stat-label">Total Job Posts</p>
                    <p class="stat-value">{{ $totalJobs ?? 0 }}</p>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="quicklinks-grid">

                <div class="quicklink-card">
                    <div class="quicklink-header">
                        <div class="card-icon">👥</div>
                        <span class="section-title">User Management</span>
                    </div>
                    <div class="quicklink-body">
                        <p class="quicklink-desc">Create HR managers, view and manage all users.</p>
                        <a href="{{ route('admin.users') }}" class="btn-primary">Manage Users</a>
                    </div>
                </div>

                <div class="quicklink-card">
                    <div class="quicklink-header">
                        <div class="card-icon">📊</div>
                        <span class="section-title">Reports</span>
                    </div>
                    <div class="quicklink-body">
                        <p class="quicklink-desc">View and generate system reports.</p>
                        <a href="{{ route('admin.reports') }}" class="btn-secondary">View Reports</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>