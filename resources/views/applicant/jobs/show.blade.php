<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $job->title }}
            </h2>
            <a href="{{ route('applicant.jobs.index') }}" class="ml-back-link">← Back to Jobs</a>
        </div>
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

        /* Back link */
        .ml-back-link {
            font-size: 0.82rem;
            font-weight: 600;
            color: #7c5c4a;
            text-decoration: none;
            transition: color 0.12s;
        }
        .ml-back-link:hover { color: #5a3f30; text-decoration: underline; }

        /* Alerts */
        .success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            color: #15803d;
        }
        .error-alert {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            color: #b91c1c;
        }

        /* Job detail meta grid */
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 20px;
        }
        .meta-item { }
        .meta-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 3px;
        }
        .meta-value {
            font-size: 0.875rem;
            font-weight: 600;
            color: #3d3530;
        }

        /* Badge */
        .badge-open   { display: inline-flex; align-items: center; padding: 3px 10px; border-radius: 99px; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.04em; background: #dcfce7; color: #15803d; }
        .badge-closed { display: inline-flex; align-items: center; padding: 3px 10px; border-radius: 99px; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.04em; background: #fee2e2; color: #b91c1c; }

        /* Section divider */
        .section-divider {
            border: none;
            border-top: 1px solid #e8e3dd;
            margin: 18px 0;
        }

        /* Content blocks */
        .content-block { margin-bottom: 18px; }
        .content-block:last-child { margin-bottom: 0; }
        .content-heading {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 8px;
        }
        .content-text {
            font-size: 0.875rem;
            color: #5a5048;
            white-space: pre-line;
            line-height: 1.7;
        }

        /* Apply form */
        .form-label {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 6px;
        }
        .ml-textarea {
            display: block;
            width: 100%;
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 0.875rem;
            color: #3d3530;
            resize: vertical;
            line-height: 1.65;
            transition: border-color 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
            font-family: inherit;
        }
        .ml-textarea:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160,112,96,0.15);
        }
        .ml-textarea::placeholder { color: #c4bdb7; }
        .field-error {
            font-size: 0.72rem;
            color: #b91c1c;
            margin-top: 4px;
        }
        .field-group { margin-bottom: 18px; }

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

        /* Already applied / closed notices */
        .notice-applied {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #15803d;
        }
        .notice-closed {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #b91c1c;
        }
    </style>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if(session('success'))
                <div class="success-box">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="error-alert">{{ session('error') }}</div>
            @endif

            {{-- Job Details --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="ml-card-header-left">
                        <div class="card-icon">📋</div>
                        <span class="section-title">{{ $job->title }}</span>
                    </div>
                    <span class="{{ $job->status === 'open' ? 'badge-open' : 'badge-closed' }}">
                        {{ ucfirst($job->status) }}
                    </span>
                </div>
                <div class="ml-card-body">

                    <div class="meta-grid">
                        <div class="meta-item">
                            <p class="meta-label">Type</p>
                            <p class="meta-value">{{ ucfirst($job->type) }}</p>
                        </div>
                        <div class="meta-item">
                            <p class="meta-label">Location</p>
                            <p class="meta-value">{{ $job->location }}</p>
                        </div>
                        <div class="meta-item">
                            <p class="meta-label">Salary</p>
                            <p class="meta-value">{{ $job->salary ?? 'Not specified' }}</p>
                        </div>
                    </div>

                    <hr class="section-divider">

                    <div class="content-block">
                        <p class="content-heading">Description</p>
                        <p class="content-text">{{ $job->description }}</p>
                    </div>

                    @if($job->requirements)
                        <hr class="section-divider">
                        <div class="content-block">
                            <p class="content-heading">Requirements</p>
                            <p class="content-text">{{ $job->requirements }}</p>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Apply / Status --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="ml-card-header-left">
                        <div class="card-icon">✉️</div>
                        <span class="section-title">Apply for this Job</span>
                    </div>
                </div>
                <div class="ml-card-body">

                    @if($hasApplied)
                        <div class="notice-applied">
                            ✓ You have already applied for this job.
                        </div>

                    @elseif($job->status === 'closed')
                        <div class="notice-closed">
                            ✕ This job is no longer accepting applications.
                        </div>

                    @else
                        <form method="POST" action="{{ route('applicant.jobs.apply', $job) }}">
                            @csrf
                            <div class="field-group">
                                <label for="cover_letter" class="form-label">Cover Letter (optional)</label>
                                <textarea id="cover_letter" name="cover_letter" rows="5"
                                    class="ml-textarea"
                                    placeholder="Tell the employer why you're a great fit...">{{ old('cover_letter') }}</textarea>
                                @error('cover_letter')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn-primary">Submit Application</button>
                        </form>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>