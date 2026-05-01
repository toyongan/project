<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Application') }}
            </h2>
            <a href="{{ route('hr.applications.index') }}" class="ml-back-link">← Back</a>
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

        /* Info grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 0;
        }
        .info-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 3px;
        }
        .info-value {
            font-size: 0.875rem;
            font-weight: 600;
            color: #3d3530;
        }

        /* Cover letter box */
        .cover-letter-box {
            margin-top: 18px;
        }
        .cover-letter-content {
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 0.82rem;
            color: #5a5048;
            white-space: pre-line;
            line-height: 1.65;
        }

        /* Section divider */
        .section-divider {
            border: none;
            border-top: 1px solid #e8e3dd;
            margin: 20px 0;
        }

        /* Form */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 18px;
        }
        .field-group { margin-bottom: 0; }
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
        .field-group-full { margin-bottom: 18px; }

        /* Buttons */
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

        /* Back link */
        .ml-back-link {
            font-size: 0.82rem;
            font-weight: 600;
            color: #7c5c4a;
            text-decoration: none;
            transition: color 0.12s;
        }
        .ml-back-link:hover { color: #5a3f30; text-decoration: underline; }

        /* Success banner */
        .success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            color: #15803d;
        }

        /* Error text */
        .field-error {
            font-size: 0.72rem;
            color: #b91c1c;
            margin-top: 4px;
        }
    </style>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if(session('success'))
                <div class="success-box">{{ session('success') }}</div>
            @endif

            {{-- Applicant Info --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">👤</div>
                    <span class="section-title">Applicant Information</span>
                </div>
                <div class="ml-card-body">
                    <div class="info-grid">
                        <div>
                            <p class="info-label">Name</p>
                            <p class="info-value">{{ $application->applicant->name }}</p>
                        </div>
                        <div>
                            <p class="info-label">Email</p>
                            <p class="info-value">{{ $application->applicant->email }}</p>
                        </div>
                        <div>
                            <p class="info-label">Applied For</p>
                            <p class="info-value">{{ $application->job->title }}</p>
                        </div>
                        <div>
                            <p class="info-label">Applied On</p>
                            <p class="info-value">{{ $application->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    @if($application->cover_letter)
                        <div class="cover-letter-box">
                            <p class="info-label">Cover Letter</p>
                            <div class="cover-letter-content">{{ $application->cover_letter }}</div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Update Application --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">✏️</div>
                    <span class="section-title">Update Application</span>
                </div>
                <div class="ml-card-body">
                    <form method="POST" action="{{ route('hr.applications.update', $application) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-grid">

                            {{-- Status --}}
                            <div class="field-group">
                                <label for="status" class="form-label">Application Status</label>
                                <select id="status" name="status" class="ml-select">
                                    <option value="pending"  {{ $application->status === 'pending'  ? 'selected' : '' }}>Pending</option>
                                    <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                    <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                                @error('status')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Contact Number --}}
                            <div class="field-group">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input id="contact_number" name="contact_number" type="text" class="ml-input"
                                    value="{{ old('contact_number', $application->contact_number) }}"
                                    placeholder="e.g. 09XX-XXX-XXXX" />
                                @error('contact_number')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Interview Date --}}
                            <div class="field-group">
                                <label for="interview_date" class="form-label">Interview Date</label>
                                <input id="interview_date" name="interview_date" type="date" class="ml-input"
                                    value="{{ old('interview_date', $application->interview_date?->format('Y-m-d')) }}" />
                                @error('interview_date')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Interview Notes --}}
                        <div class="field-group-full">
                            <label for="interview_notes" class="form-label">Interview Notes / Description</label>
                            <textarea id="interview_notes" name="interview_notes" rows="4"
                                class="ml-textarea"
                                placeholder="Add notes about the interview or applicant...">{{ old('interview_notes', $application->interview_notes) }}</textarea>
                            @error('interview_notes')
                                <p class="field-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>