<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse Jobs') }}
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

        /* Form */
        .filter-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
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
        }
        .ml-input:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160,112,96,0.15);
        }
        .ml-input::placeholder { color: #c4bdb7; }
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
        }
        .ml-select:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160,112,96,0.15);
        }
        .filter-actions { display: flex; gap: 8px; }
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
        }
        .btn-primary:hover { background: #6a4d3e; }
        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 6px;
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
        .btn-ghost:hover { background: #f0ede8; color: #5a5048; }

        /* Job count */
        .table-count {
            font-size: 0.78rem;
            color: #a09890;
            margin-bottom: 16px;
        }

        /* Job listing cards */
        .job-listing {
            background: #f5f2ee;
            border: 1px solid #e2ddd7;
            border-radius: 10px;
            padding: 16px 18px;
            margin-bottom: 12px;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .job-listing:last-of-type { margin-bottom: 0; }
        .job-listing:hover {
            border-color: #a07060;
            box-shadow: 0 2px 8px rgba(160,112,96,0.10);
        }
        .job-listing-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
        }
        .job-listing-title {
            font-size: 0.9375rem;
            font-weight: 700;
            color: #3d3530;
            margin-bottom: 3px;
        }
        .job-listing-meta {
            font-size: 0.75rem;
            color: #a09890;
            margin-bottom: 6px;
        }
        .job-listing-desc {
            font-size: 0.82rem;
            color: #6b5f58;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .job-listing-right {
            text-align: right;
            flex-shrink: 0;
        }
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
        .job-listing-age {
            font-size: 0.7rem;
            color: #c4bdb7;
            margin-top: 5px;
        }
        .job-listing-footer {
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #e8e3dd;
        }
        .link-details {
            font-size: 0.8rem;
            font-weight: 700;
            color: #7c5c4a;
            text-decoration: none;
            transition: color 0.12s;
            letter-spacing: 0.01em;
        }
        .link-details:hover { color: #5a3f30; text-decoration: underline; }

        /* Empty */
        .empty-state {
            padding: 28px 0 10px;
            text-align: center;
        }
        .empty-state p { font-size: 0.82rem; color: #a09890; }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            {{-- Search & Filter --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">🔍</div>
                    <span class="section-title">Search & Filter</span>
                </div>
                <div class="ml-card-body">
                    <form method="GET" action="{{ route('applicant.jobs.index') }}">
                        <div class="filter-grid">

                            <div>
                                <label for="search" class="form-label">Search</label>
                                <input id="search" name="search" type="text" class="ml-input"
                                    placeholder="Job title or keyword..."
                                    value="{{ request('search') }}" />
                            </div>

                            <div>
                                <label for="type" class="form-label">Job Type</label>
                                <select id="type" name="type" class="ml-select">
                                    <option value="">All Types</option>
                                    <option value="full-time"  {{ request('type') == 'full-time'  ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time"  {{ request('type') == 'part-time'  ? 'selected' : '' }}>Part-time</option>
                                    <option value="contract"   {{ request('type') == 'contract'   ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                            </div>

                            <div>
                                <label for="location" class="form-label">Location</label>
                                <input id="location" name="location" type="text" class="ml-input"
                                    placeholder="City or remote..."
                                    value="{{ request('location') }}" />
                            </div>

                        </div>
                        <div class="filter-actions">
                            <button type="submit" class="btn-primary">Search</button>
                            <a href="{{ route('applicant.jobs.index') }}" class="btn-ghost">Clear</a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Jobs List --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">💼</div>
                    <span class="section-title">Available Positions</span>
                </div>
                <div class="ml-card-body">
                    <p class="table-count">Showing {{ $jobs->total() }} job(s)</p>

                    @forelse($jobs as $job)
                        <div class="job-listing">
                            <div class="job-listing-top">
                                <div>
                                    <p class="job-listing-title">{{ $job->title }}</p>
                                    <p class="job-listing-meta">{{ $job->location }} &bull; {{ ucfirst($job->type) }}</p>
                                    <p class="job-listing-desc">{{ Str::limit($job->description, 120) }}</p>
                                </div>
                                <div class="job-listing-right">
                                    <span class="badge-open">Open</span>
                                    <p class="job-listing-age">{{ $job->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="job-listing-footer">
                                <a href="{{ route('applicant.jobs.show', $job) }}" class="link-details">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <p>No jobs found matching your criteria.</p>
                        </div>
                    @endforelse

                    <div class="mt-4">
                        {{ $jobs->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>