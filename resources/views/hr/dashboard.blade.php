<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HR Manager Dashboard') }}
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
        .ml-card-header-between {
            padding: 14px 22px;
            border-bottom: 1px solid #e8e3dd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f5f2ee;
        }
        .ml-card-header-left {
            display: flex;
            align-items: center;
            gap: 10px;
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
        .welcome-body { padding: 20px 22px; }
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
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
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
            color: #3d3530;
            line-height: 1;
        }
        .stat-card.accent-open .stat-value  { color: #15803d; }
        .stat-card.accent-closed .stat-value { color: #b91c1c; }
        .stat-card.accent-pending .stat-value { color: #92400e; }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: #7c5c4a;
            color: #fff;
            font-size: 0.78rem;
            font-weight: 700;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.02em;
            text-decoration: none;
        }
        .btn-primary:hover { background: #6a4d3e; }
        .job-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 22px;
            border-bottom: 1px solid #edeae5;
            transition: background 0.1s;
        }
        .job-row:last-child { border-bottom: none; }
        .job-row:hover { background: #f5f2ee; }
        .job-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: #3d3530;
            margin-bottom: 2px;
        }
        .job-meta {
            font-size: 0.75rem;
            color: #a09890;
        }
        .job-row-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }
        .badge-open   { background: #dcfce7; color: #15803d; }
        .badge-closed { background: #fee2e2; color: #b91c1c; }
        .action-edit {
            font-size: 0.78rem;
            font-weight: 600;
            color: #7c5c4a;
            text-decoration: none;
            transition: color 0.12s;
        }
        .action-edit:hover { color: #5a3f30; text-decoration: underline; }
        .empty-state {
            padding: 28px 22px;
            text-align: center;
        }
        .empty-state p { font-size: 0.82rem; color: #a09890; }
        .empty-state a { color: #7c5c4a; font-weight: 600; text-decoration: none; }
        .empty-state a:hover { text-decoration: underline; }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            {{-- Welcome --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">👋</div>
                    <span class="section-title">Welcome Back</span>
                </div>
                <div class="welcome-body">
                    <p class="welcome-name">Welcome, {{ Auth::user()->name }}!</p>
                    <p class="welcome-sub">Manage your job postings and applicants from this dashboard.</p>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-grid">
                <div class="stat-card">
                    <p class="stat-label">Total Job Posts</p>
                    <p class="stat-value">{{ $totalJobs ?? 0 }}</p>
                </div>
                <div class="stat-card accent-open">
                    <p class="stat-label">Open Positions</p>
                    <p class="stat-value">{{ $openJobs ?? 0 }}</p>
                </div>
                <div class="stat-card accent-closed">
                    <p class="stat-label">Closed Positions</p>
                    <p class="stat-value">{{ $closedJobs ?? 0 }}</p>
                </div>
                <div class="stat-card">
                    <p class="stat-label">Total Applicants</p>
                    <p class="stat-value">{{ $totalApplicants ?? 0 }}</p>
                </div>
                <div class="stat-card accent-pending">
                    <p class="stat-label">Pending Review</p>
                    <p class="stat-value">{{ $pendingApplications ?? 0 }}</p>
                </div>
            </div>

            {{-- Recent Jobs --}}
            <div class="ml-card">
                <div class="ml-card-header-between">
                    <div class="ml-card-header-left">
                        <div class="card-icon">💼</div>
                        <span class="section-title">Recent Job Postings</span>
                    </div>
                    <a href="{{ route('hr.jobs.create') }}" class="btn-primary">+ New Job Post</a>
                </div>

                @forelse($recentJobs ?? [] as $job)
                    <div class="job-row">
                        <div>
                            <p class="job-title">{{ $job->title }}</p>
                            <p class="job-meta">{{ $job->location }} &bull; {{ ucfirst($job->type) }}</p>
                        </div>
                        <div class="job-row-right">
                            <span class="badge {{ $job->status === 'open' ? 'badge-open' : 'badge-closed' }}">
                                {{ ucfirst($job->status) }}
                            </span>
                            <a href="{{ route('hr.jobs.edit', $job) }}" class="action-edit">Edit</a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <p>No job posts yet. <a href="{{ route('hr.jobs.create') }}">Create your first one.</a></p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>