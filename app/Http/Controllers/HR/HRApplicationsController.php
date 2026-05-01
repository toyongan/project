<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class HRApplicationsController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('user_id', auth()->id())->get();

        $jobIds = $jobs->pluck('id');

        $query = Application::with(['applicant', 'job'])
            ->whereIn('job_id', $jobIds);

        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->latest()->paginate(10);

        return view('hr.applications.index', compact('applications', 'jobs'));
    }

    public function show(Application $application)
    {
        abort_if($application->job->user_id !== auth()->id(), 403);

        $application->load(['applicant', 'job']);

        return view('hr.applications.show', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        abort_if($application->job->user_id !== auth()->id(), 403);

        $validated = $request->validate([
            'status'          => ['required', 'in:pending,reviewed,approved,rejected'],
            'interview_date'  => ['nullable', 'date'],
            'contact_number'  => ['nullable', 'string', 'max:20'],
            'interview_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $application->update($validated);

        return redirect()->route('hr.applications.index')
            ->with('success', 'Application updated successfully.');
    }
}
