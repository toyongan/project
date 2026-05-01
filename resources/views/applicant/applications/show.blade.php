<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Application Details') }}
            </h2>
            <a href="{{ route('applicant.applications') }}" class="text-sm text-indigo-600 hover:text-indigo-900">← Back</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Job Info --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-base font-medium text-gray-900 mb-4">Job Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Job Title</p>
                            <p class="font-medium text-gray-900">{{ $application->job->title }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Location</p>
                            <p class="font-medium text-gray-900">{{ $application->job->location }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Type</p>
                            <p class="font-medium text-gray-900">{{ ucfirst($application->job->type) }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Applied On</p>
                            <p class="font-medium text-gray-900">{{ $application->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Application Status --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-base font-medium text-gray-900 mb-4">Application Status</h3>
                    <span @class([
                        'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium',
                        'bg-yellow-100 text-yellow-800' => $application->status === 'pending',
                        'bg-blue-100 text-blue-800'     => $application->status === 'reviewed',
                        'bg-green-100 text-green-800'   => $application->status === 'approved',
                        'bg-red-100 text-red-800'       => $application->status === 'rejected',
                    ])>
                        {{ ucfirst($application->status) }}
                    </span>
                </div>
            </div>

            {{-- Interview Details --}}
            @if($application->interview_date || $application->contact_number || $application->interview_notes)
                <div class="bg-indigo-50 border border-indigo-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-base font-medium text-indigo-900 mb-4">📅 Interview Details</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            @if($application->interview_date)
                                <div>
                                    <p class="text-indigo-600">Interview Date</p>
                                    <p class="font-medium text-indigo-900">{{ $application->interview_date->format('F d, Y') }}</p>
                                </div>
                            @endif
                            @if($application->contact_number)
                                <div>
                                    <p class="text-indigo-600">Contact Number</p>
                                    <p class="font-medium text-indigo-900">{{ $application->contact_number }}</p>
                                </div>
                            @endif
                        </div>
                        @if($application->interview_notes)
                            <div class="mt-4">
                                <p class="text-indigo-600 text-sm mb-1">Notes</p>
                                <p class="text-indigo-900 text-sm whitespace-pre-line">{{ $application->interview_notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Cover Letter --}}
            @if($application->cover_letter)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-base font-medium text-gray-900 mb-4">Your Cover Letter</h3>
                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $application->cover_letter }}</p>
                    </div>
                </div>
            @endif

            {{-- Cancel Application --}}
            @if($application->status === 'pending')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Cancel this application?</p>
                            <p class="text-xs text-gray-500 mt-1">This action cannot be undone.</p>
                        </div>
                        <form
                            method="POST"
                            action="{{ route('applicant.applications.cancel', $application) }}"
                            onsubmit="return confirm('Are you sure you want to cancel this application?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition"
                            >
                                Cancel Application
                            </button>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>