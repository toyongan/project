<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Applications') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md text-sm mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @forelse($applications as $application)
                        <div class="border border-gray-200 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-base font-semibold text-gray-900">{{ $application->job->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ $application->job->location }} &bull; {{ ucfirst($application->job->type) }}
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">Applied {{ $application->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="text-right">
                                    <span @class([
                                        'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',
                                        'bg-yellow-100 text-yellow-800' => $application->status === 'pending',
                                        'bg-blue-100 text-blue-800'     => $application->status === 'reviewed',
                                        'bg-green-100 text-green-800'   => $application->status === 'approved',
                                        'bg-red-100 text-red-800'       => $application->status === 'rejected',
                                    ])>
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </div>
                            </div>

                            @if($application->cover_letter)
                                <div class="mt-3 text-sm text-gray-600 bg-gray-50 rounded p-3">
                                    <p class="font-medium text-gray-700 mb-1">Your Cover Letter:</p>
                                    <p class="whitespace-pre-line">{{ $application->cover_letter }}</p>
                                </div>
                            @endif

                            {{-- Interview details if available --}}
                            @if($application->interview_date)
                                <div class="mt-3 bg-indigo-50 border border-indigo-200 rounded p-3 text-sm">
                                    <p class="font-medium text-indigo-800 mb-1">📅 Interview Scheduled</p>
                                    <p class="text-indigo-700">Date: {{ $application->interview_date->format('F d, Y') }}</p>
                                    @if($application->contact_number)
                                        <p class="text-indigo-700">Contact: {{ $application->contact_number }}</p>
                                    @endif
                                    @if($application->interview_notes)
                                        <p class="text-indigo-700 mt-1">Notes: {{ $application->interview_notes }}</p>
                                    @endif
                                </div>
                            @endif

                            <div class="mt-3">
                                <a href="{{ route('applicant.applications.show', $application) }}"
                                    class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">You haven't applied for any jobs yet.
                            <a href="{{ route('applicant.jobs.index') }}" class="text-indigo-600 hover:underline">Browse jobs</a>
                        </p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>