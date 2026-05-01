<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicantJobsController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query()->open();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $jobs = $query->latest()->paginate(10);

        return view('applicant.jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $hasApplied = Application::where('user_id', auth()->id())
                                 ->where('job_id', $job->id)
                                 ->exists();

        return view('applicant.jobs.show', compact('job', 'hasApplied'));
    }

    public function apply(Request $request, Job $job)
    {
        abort_if($job->status === 'closed', 403, 'This job is no longer accepting applications.');

        $alreadyApplied = Application::where('user_id', auth()->id())
                                     ->where('job_id', $job->id)
                                     ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You have already applied for this job.');
        }

        $validated = $request->validate([
            'cover_letter' => ['nullable', 'string', 'max:2000'],
        ]);

        Application::create([
            'user_id'      => auth()->id(),
            'job_id'       => $job->id,
            'cover_letter' => $validated['cover_letter'] ?? null,
        ]);

        return back()->with('success', 'Your application has been submitted successfully!');
    }

    public function applications()
    {
        $applications = Application::where('user_id', auth()->id())
                                   ->with('job')
                                   ->latest()
                                   ->get();

        return view('applicant.applications.index', compact('applications'));
    }

    public function showApplication(Application $application)
    {
        abort_if($application->user_id !== auth()->id(), 403);

        $application->load('job');

        return view('applicant.applications.show', compact('application'));
    }

    public function cancel(Application $application)
    {
        abort_if($application->user_id !== auth()->id(), 403);
        abort_if($application->status !== 'pending', 403, 'Only pending applications can be cancelled.');

        $application->delete();

        return redirect()->route('applicant.applications')
                         ->with('success', 'Your application has been cancelled.');
    }
}