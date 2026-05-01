<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold tracking-tight" style="color:#3d3530;">Create Job Post</h2>
                <p class="text-sm mt-0.5" style="color:#a09890;">Fill in the details to publish a new job opening</p>
            </div>
            <a href="{{ route('hr.jobs.index') }}"
                style="display:inline-flex;align-items:center;gap:6px;font-size:0.78rem;font-weight:600;color:#7c5c4a;background:#f0e8e2;border:1px solid #e0d0c6;padding:8px 14px;border-radius:8px;text-decoration:none;transition:all 0.15s;"
                onmouseover="this.style.background='#e8ddd5'" onmouseout="this.style.background='#f0e8e2'">
                <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Jobs
            </a>
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
            padding: 16px 24px;
            border-bottom: 1px solid #e8e3dd;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f5f2ee;
        }
        .card-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .section-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #3d3530;
            margin: 0;
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
        .form-hint {
            font-size: 0.68rem;
            color: #c4bdb7;
            margin-top: 4px;
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
            transition: border-color 0.15s;
            box-sizing: border-box;
        }
        .ml-select:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160,112,96,0.15);
        }
        .ml-select option { background: #faf8f5; }
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
        }
        .ml-textarea:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160,112,96,0.15);
        }
        .ml-textarea::placeholder { color: #c4bdb7; }
        .field-group { margin-bottom: 20px; }
        .section-divider {
            border: none;
            border-top: 1px solid #e8e3dd;
            margin: 4px 0 20px;
        }
        .section-group-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #c4bdb7;
            margin: 0 0 14px;
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
        .error-box {
            display: flex;
            gap: 12px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 20px;
        }
        .error-icon {
            width: 28px; height: 28px;
            background: #fee2e2;
            border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .error-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .error-list li {
            font-size: 0.82rem;
            color: #b91c1c;
            padding: 2px 0;
        }
        .error-list li::before {
            content: '—';
            margin-right: 6px;
            color: #fca5a5;
        }
    </style>

    <div class="py-8" style="background:#f0ede8;min-height:100vh;">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon" style="background:#e8ddd5;">
                        <svg style="width:16px;height:16px;color:#8b6f5e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="section-title">Job Details</p>
                </div>

                <div style="padding:24px;">

                    @if($errors->any())
                        <div class="error-box">
                            <div class="error-icon">
                                <svg style="width:14px;height:14px;color:#dc2626;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <ul class="error-list">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('hr.jobs.store') }}">
                        @csrf

                        {{-- Basic Info --}}
                        <p class="section-group-label">Basic Information</p>

                        <div class="field-group">
                            <label class="form-label" for="title">Job Title</label>
                            <input id="title" name="title" type="text" class="ml-input"
                                value="{{ old('title') }}" placeholder="e.g. Senior Software Engineer" required />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 field-group">
                            <div>
                                <label class="form-label" for="type">Job Type</label>
                                <select id="type" name="type" class="ml-select">
                                    <option value="full-time"  {{ old('type') == 'full-time'  ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time"  {{ old('type') == 'part-time'  ? 'selected' : '' }}>Part-time</option>
                                    <option value="contract"   {{ old('type') == 'contract'   ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label" for="status">Posting Status</label>
                                <select id="status" name="status" class="ml-select">
                                    <option value="open"   {{ old('status', 'open') == 'open'   ? 'selected' : '' }}>Open</option>
                                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                        </div>

                        <hr class="section-divider">
                        <p class="section-group-label">Location & Compensation</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 field-group">
                            <div>
                                <label class="form-label" for="location">Location</label>
                                <input id="location" name="location" type="text" class="ml-input"
                                    value="{{ old('location') }}" placeholder="e.g. Manila, Philippines" required />
                            </div>
                            <div>
                                <label class="form-label" for="salary">
                                    Salary
                                    <span style="font-weight:500;color:#c4bdb7;text-transform:none;letter-spacing:0;"> — optional</span>
                                </label>
                                <input id="salary" name="salary" type="text" class="ml-input"
                                    value="{{ old('salary') }}" placeholder="e.g. ₱20,000 – ₱30,000" />
                            </div>
                        </div>

                        <hr class="section-divider">
                        <p class="section-group-label">Description & Requirements</p>

                        <div class="field-group">
                            <label class="form-label" for="description">Job Description</label>
                            <textarea id="description" name="description" rows="5"
                                class="ml-textarea" required>{{ old('description') }}</textarea>
                            <p class="form-hint">Describe the role, responsibilities, and what a typical day looks like.</p>
                        </div>

                        <div class="field-group" style="margin-bottom:0;">
                            <label class="form-label" for="requirements">
                                Requirements
                                <span style="font-weight:500;color:#c4bdb7;text-transform:none;letter-spacing:0;"> — optional</span>
                            </label>
                            <textarea id="requirements" name="requirements" rows="4"
                                class="ml-textarea"
                                placeholder="List qualifications, skills, experience...">{{ old('requirements') }}</textarea>
                            <p class="form-hint">Include education level, years of experience, tools, or certifications needed.</p>
                        </div>

                        <div style="display:flex;gap:10px;margin-top:24px;padding-top:20px;border-top:1px solid #e8e3dd;">
                            <button type="submit" class="btn-primary">
                                <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Create Job Post
                            </button>
                            <a href="{{ route('hr.jobs.index') }}" class="btn-ghost">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>