<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold tracking-tight" style="color:#3d3530;">Applications</h2>
                <p class="text-sm mt-0.5" style="color:#a09890;">Review and manage candidate applications</p>
            </div>
        </div>
    </x-slot>

    <style>
        .ml-card {
            background: #faf8f5;
            border: 1px solid #e2ddd7;
            border-radius: 14px;
        }
        .ml-card-header {
            padding: 16px 24px;
            border-bottom: 1px solid #e8e3dd;
        }
        .filter-label {
            display: block;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 6px;
        }
        .ml-select {
            display: block;
            width: 100%;
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 8px;
            padding: 9px 36px 9px 12px;
            font-size: 0.875rem;
            color: #3d3530;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%23a09890' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
            transition: border-color 0.15s;
        }
        .ml-select:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160,112,96,0.15);
        }
        .ml-select option { background: #faf8f5; }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 16px;
            background: #7c5c4a;
            color: #fff;
            font-size: 0.78rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
        }
        .btn-primary:hover { background: #6a4d3e; }
        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 16px;
            background: transparent;
            color: #a09890;
            font-size: 0.78rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid #ddd8d2;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-ghost:hover { background: #f0ede8; color: #5a5048; }
        .app-table { width: 100%; border-collapse: collapse; }
        .app-table th {
            padding: 12px 24px;
            text-align: left;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #b8b0a8;
        }
        .app-table td { padding: 14px 24px; }
        .app-table tbody tr { border-top: 1px solid #f0ede8; transition: background 0.12s; }
        .app-table tbody tr:hover { background: #f5f2ee; }
        .avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: #e8ddd5;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 0.75rem;
            font-weight: 700;
            color: #8b6f5e;
            letter-spacing: 0.04em;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }
        .status-badge::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .status-pending  { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .status-pending::before  { background: #d97706; }
        .status-reviewed { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }
        .status-reviewed::before { background: #3b82f6; }
        .status-approved { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .status-approved::before { background: #10b981; }
        .status-rejected { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .status-rejected::before { background: #ef4444; }
        .manage-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #7c5c4a;
            background: #f0e8e2;
            border: 1px solid #e0d0c6;
            border-radius: 7px;
            text-decoration: none;
            transition: all 0.15s;
        }
        .manage-btn:hover { background: #e8ddd5; color: #5a3d2e; }
        .section-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #b8b0a8;
            margin-bottom: 16px;
        }
        .count-pill {
            display: inline-block;
            padding: 2px 8px;
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #a09890;
        }
    </style>

    <div class="py-8" style="background:#f0ede8;min-height:100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">

            @if(session('success'))
                <div style="display:flex;align-items:center;gap:10px;background:#d1fae5;border:1px solid #a7f3d0;color:#065f46;padding:12px 16px;border-radius:10px;font-size:0.875rem;">
                    <svg style="width:16px;height:16px;flex-shrink:0;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filters --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <p class="section-label">Filter Applications</p>
                    <form method="GET" action="{{ route('hr.applications.index') }}">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="filter-label" for="job_id">Job Position</label>
                                <select id="job_id" name="job_id" class="ml-select">
                                    <option value="">All Positions</option>
                                    @foreach($jobs as $job)
                                        <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>
                                            {{ $job->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="filter-label" for="status">Status</label>
                                <select id="status" name="status" class="ml-select">
                                    <option value="">All Statuses</option>
                                    <option value="pending"  {{ request('status') == 'pending'  ? 'selected' : '' }}>Pending</option>
                                    <option value="reviewed" {{ request('status') == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn-primary">
                                <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                                </svg>
                                Apply Filters
                            </button>
                            <a href="{{ route('hr.applications.index') }}" class="btn-ghost">
                                <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Applications Table --}}
            <div class="ml-card overflow-hidden">
                <div class="ml-card-header" style="display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <h3 style="font-size:0.9rem;font-weight:700;color:#3d3530;margin:0;">All Applications</h3>
                        <p style="font-size:0.75rem;color:#a09890;margin:4px 0 0;">Showing {{ $applications->total() }} result{{ $applications->total() !== 1 ? 's' : '' }}</p>
                    </div>
                    <span class="count-pill">{{ $applications->total() }}</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="app-table">
                        <thead>
                            <tr>
                                <th>Applicant</th>
                                <th>Job Position</th>
                                <th>Status</th>
                                <th>Interview Date</th>
                                <th>Applied</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $application)
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:12px;">
                                            <div class="avatar">
                                                {{ strtoupper(substr($application->applicant->name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <p style="font-size:0.875rem;font-weight:600;color:#3d3530;margin:0;">{{ $application->applicant->name }}</p>
                                                <p style="font-size:0.75rem;color:#b8b0a8;margin:2px 0 0;">{{ $application->applicant->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-size:0.875rem;color:#5a5048;font-weight:500;">{{ $application->job->title }}</span>
                                    </td>
                                    <td>
                                        <span class="status-badge status-{{ $application->status }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($application->interview_date)
                                            <div style="display:flex;align-items:center;gap:6px;font-size:0.875rem;color:#5a5048;">
                                                <svg style="width:13px;height:13px;color:#b8b0a8;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ $application->interview_date->format('M d, Y') }}
                                            </div>
                                        @else
                                            <span style="font-size:0.875rem;color:#c4bdb7;">Not scheduled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span style="font-size:0.875rem;color:#b8b0a8;">{{ $application->created_at->format('M d, Y') }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('hr.applications.show', $application) }}" class="manage-btn">
                                            Manage
                                            <svg style="width:12px;height:12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding:64px 24px;text-align:center;">
                                        <div style="display:flex;flex-direction:column;align-items:center;gap:8px;">
                                            <svg style="width:40px;height:40px;color:#e2ddd7;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <p style="font-size:0.875rem;font-weight:600;color:#c4bdb7;margin:0;">No applications found</p>
                                            <p style="font-size:0.75rem;color:#ddd8d2;margin:0;">Try adjusting your filters</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($applications->hasPages())
                    <div style="padding:16px 24px;border-top:1px solid #e8e3dd;">
                        {{ $applications->withQueryString()->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>