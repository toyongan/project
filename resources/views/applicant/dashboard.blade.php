<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Dashboard') }}
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
            grid-template-columns: repeat(3, 1fr);
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
        .stat-card.accent-open .stat-value   { color: #15803d; }
        .stat-card.accent-new .stat-value    { color: #92400e; }

        /* View all link */
        .ml-view-all {
            font-size: 0.78rem;
            font-weight: 700;
            color: #7c5c4a;
            text-decoration: none;
            letter-spacing: 0.01em;
            transition: color 0.12s;
        }
        .ml-view-all:hover { color: #5a3f30; text-decoration: underline; }

        /* Job rows */
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
        .job-row-right { text-align: right; }
        .badge-open {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            background: #dcfce7;
            color: #15803d;
        }
        .job-age {
            font-size: 0.7rem;
            color: #c4bdb7;
            margin-top: 4px;
        }

        /* Empty state */
        .empty-state {
            padding: 28px 22px;
            text-align: center;
        }
        .empty-state p { font-size: 0.82rem; color: #a09890; }
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
                    <p class="welcome-sub">Browse available job postings and apply for positions that match your skills.</p>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-grid">
                <div class="stat-card accent-open">
                    <p class="stat-label">Available Jobs</p>
                    <p class="stat-value">{{ $totalJobs ?? 0 }}</p>
                </div>
                <div class="stat-card">
                    <p class="stat-label">My Applications</p>
                    <p class="stat-value">{{ $myApplications ?? 0 }}</p>
                </div>
                <div class="stat-card accent-new">
                    <p class="stat-label">New This Week</p>
                    <p class="stat-value">{{ $newJobs ?? 0 }}</p>
                </div>
            </div>

            {{-- Recent Job Listings --}}
            <div class="ml-card">
                <div class="ml-card-header-between">
                    <div class="ml-card-header-left">
                        <div class="card-icon">💼</div>
                        <span class="section-title">Recent Job Postings</span>
                    </div>
                    <a href="{{ route('applicant.jobs.index') }}" class="ml-view-all">View All →</a>
                </div>

                @forelse($recentJobs ?? [] as $job)
                    <div class="job-row">
                        <div>
                            <p class="job-title">{{ $job->title }}</p>
                            <p class="job-meta">{{ $job->location }} &bull; {{ ucfirst($job->type) }}</p>
                        </div>
                        <div class="job-row-right">
                            <span class="badge-open">{{ ucfirst($job->status) }}</span>
                            <p class="job-age">{{ $job->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <p>No job postings available at the moment.</p>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>