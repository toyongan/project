<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Job Posts') }}
            </h2>
            <a href="{{ route('hr.jobs.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                + New Job
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
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filters --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" action="{{ route('hr.jobs.index') }}">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <x-input-label for="search" :value="__('Search')" />
                                <x-text-input id="search" name="search" type="text" class="mt-1 block w-full"
                                    placeholder="Job title..." value="{{ request('search') }}" />
                            </div>
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">All</option>
                                    <option value="open"   {{ request('status') == 'open'   ? 'selected' : '' }}>Open</option>
                                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="type" :value="__('Type')" />
                                <select id="type" name="type"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">All</option>
                                    <option value="full-time"  {{ request('type') == 'full-time'  ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time"  {{ request('type') == 'part-time'  ? 'selected' : '' }}>Part-time</option>
                                    <option value="contract"   {{ request('type') == 'contract'   ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <x-primary-button>{{ __('Filter') }}</x-primary-button>
                            <a href="{{ route('hr.jobs.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                                Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Jobs Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-4">Showing {{ $jobs->total() }} job(s)</p>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Posted</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($jobs as $job)
                                    <tr>
                                        <td class="px-4 py-3 font-medium text-gray-900">{{ $job->title }}</td>
                                        <td class="px-4 py-3 text-gray-500">{{ ucfirst($job->type) }}</td>
                                        <td class="px-4 py-3 text-gray-500">{{ $job->location }}</td>
                                        <td class="px-4 py-3">
                                            <span @class([
                                                'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',
                                                'bg-green-100 text-green-800' => $job->status === 'open',
                                                'bg-red-100 text-red-800'     => $job->status === 'closed',
                                            ])>
                                                {{ ucfirst($job->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-gray-500">{{ $job->created_at->format('M d, Y') }}</td>
                                        <td class="px-4 py-3 flex gap-3">
                                            <a href="{{ route('hr.jobs.edit', $job) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form method="POST" action="{{ route('hr.jobs.destroy', $job) }}"
                                                onsubmit="return confirm('Delete this job?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No job posts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $jobs->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>