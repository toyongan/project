<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
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
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #ede8e0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 15px;
        }

        .section-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #3d3530;
        }

        .ml-card-body {
            padding: 20px 22px;
        }

        /* Filter form */
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 6px;
        }

        .ml-input {
            display: block;
            width: 100%;
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 0.875rem;
            color: #3d3530;
            transition: border-color 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
            font-family: inherit;
        }

        .ml-input:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160, 112, 96, 0.15);
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
            background-color: #f0ede8;
            transition: border-color 0.15s;
            box-sizing: border-box;
            font-family: inherit;
        }

        .ml-select:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160, 112, 96, 0.15);
        }

        .filter-actions {
            display: flex;
            gap: 8px;
            align-items: center;
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
            font-family: inherit;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: #6a4d3e;
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            padding: 10px 16px;
            background: transparent;
            color: #a09890;
            font-size: 0.78rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid #ddd8d2;
            text-decoration: none;
            transition: all 0.15s;
        }

        .btn-ghost:hover {
            background: #f0ede8;
            color: #5a5048;
        }

        .btn-export {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 20px;
            background: #15803d;
            color: #fff;
            font-size: 0.82rem;
            font-weight: 700;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.02em;
            text-decoration: none;
            font-family: inherit;
        }

        .btn-export:hover {
            background: #166534;
            color: #fff;
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

        .stat-card.accent-users .stat-value {
            color: #3730a3;
        }

        .stat-card.accent-applicants .stat-value {
            color: #15803d;
        }

        .stat-card.accent-jobs .stat-value {
            color: #92400e;
        }

        .stat-card.accent-open .stat-value {
            color: #9d174d;
        }

        /* Tables */
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        thead tr {
            background: #f5f2ee;
        }

        th {
            padding: 10px 14px;
            text-align: left;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #a09890;
            border-bottom: 1px solid #e8e3dd;
        }

        td {
            padding: 11px 14px;
            border-bottom: 1px solid #edeae5;
            color: #5a5048;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: #f5f2ee;
        }

        .td-title {
            font-weight: 600;
            color: #3d3530;
        }

        .td-empty {
            text-align: center;
            padding: 28px 14px;
            color: #c4bdb7;
            font-size: 0.82rem;
        }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .badge-open {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-closed {
            background: #fee2e2;
            color: #b91c1c;
        }

        .badge-hr {
            background: #ede9fe;
            color: #4f46e5;
        }

        .badge-default {
            background: #f0ede8;
            color: #a09890;
        }

        @media print {

            nav,
            header,
            .ml-card:first-child,
            .filter-grid,
            .filter-actions {
                display: none !important;
            }

            body {
                background: #fff !important;
            }

            .py-8 {
                padding: 0 !important;
            }

            .max-w-7xl {
                max-width: 100% !important;
                padding: 0 !important;
            }

            .ml-card {
                border: 1px solid #ccc !important;
                border-radius: 0 !important;
                break-inside: avoid;
                margin-bottom: 16px;
            }

            table {
                font-size: 10px;
            }

            th,
            td {
                padding: 6px 10px;
            }

            .badge,
            .stat-card,
            thead tr {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            {{-- Filter --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">🔍</div>
                    <span class="section-title">Generate Report</span>
                </div>
                <div class="ml-card-body">
                    <form method="GET" action="{{ route('admin.reports') }}">
                        <div class="filter-grid">
                            <div>
                                <label class="form-label">Date From</label>
                                <input type="date" name="date_from" class="ml-input"
                                    value="{{ request('date_from') }}" />
                            </div>
                            <div>
                                <label class="form-label">Date To</label>
                                <input type="date" name="date_to" class="ml-input"
                                    value="{{ request('date_to') }}" />
                            </div>
                            <div>
                                <label class="form-label">Report Type</label>
                                <select name="type" class="ml-select">
                                    <option value="all" {{ request('type', 'all') === 'all'   ? 'selected' : '' }}>All</option>
                                    <option value="jobs" {{ request('type') === 'jobs'  ? 'selected' : '' }}>Job Posts</option>
                                    <option value="users" {{ request('type') === 'users' ? 'selected' : '' }}>Users</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-actions">
                            <button type="submit" class="btn-primary">
                                Filter
                            </button>
                            <a href="{{ route('admin.reports') }}" class="btn-ghost">Clear</a>

                            {{-- Export PDF — passes current filters to the PDF route --}}
                            <button type="button" onclick="window.print()" class="btn-export">
                                🖨 Save as PDF
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-grid">
                <div class="stat-card accent-users">
                    <p class="stat-label">Total Users</p>
                    <p class="stat-value">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="stat-card accent-applicants">
                    <p class="stat-label">Total Applicants</p>
                    <p class="stat-value">{{ $totalApplicants ?? 0 }}</p>
                </div>
                <div class="stat-card accent-jobs">
                    <p class="stat-label">Total Job Posts</p>
                    <p class="stat-value">{{ $totalJobs ?? 0 }}</p>
                </div>
                <div class="stat-card accent-open">
                    <p class="stat-label">Open Positions</p>
                    <p class="stat-value">{{ $openJobs ?? 0 }}</p>
                </div>
            </div>

            {{-- Jobs Table --}}
            @if(in_array(request('type', 'all'), ['all', 'jobs']))
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">💼</div>
                    <span class="section-title">Job Posts Report</span>
                </div>
                <div class="ml-card-body">
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs ?? [] as $job)
                                <tr>
                                    <td class="td-title">{{ $job->title }}</td>
                                    <td>{{ ucfirst($job->type) }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>
                                        <span class="badge {{ $job->status === 'open' ? 'badge-open' : 'badge-closed' }}">
                                            {{ ucfirst($job->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $job->created_at->format('M d, Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="td-empty">No job posts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            {{-- Users Table --}}
            @if(in_array(request('type', 'all'), ['all', 'users']))
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">👥</div>
                    <span class="section-title">Users Report</span>
                </div>
                <div class="ml-card-body">
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users ?? [] as $user)
                                <tr>
                                    <td class="td-title">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge {{ $user->role === 'hr_manager' ? 'badge-hr' : 'badge-default' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="td-empty">No users found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>