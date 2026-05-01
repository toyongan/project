<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class HRJobsController extends Controller
{
    /**
     * List all job posts by this HR manager with search & filter.
     */
    public function index(Request $request)
    {
        $query = Job::where('user_id', auth()->id());

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $jobs = $query->latest()->paginate(10);

        return view('hr.jobs.index', compact('jobs'));
    }

    /**
     * Show the create form.
     */
    public function create()
    {
        return view('hr.jobs.create');
    }

    /**
     * Store a new job post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'type'         => ['required', 'in:full-time,part-time,contract,internship'],
            'location'     => ['required', 'string', 'max:255'],
            'salary'       => ['nullable', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'status'       => ['required', 'in:open,closed'],
        ]);

        $validated['user_id'] = auth()->id();

        Job::create($validated);

        return redirect()->route('hr.jobs.index')
                         ->with('success', 'Job post created successfully.');
    }

    /**
     * Show the edit form.
     */
    public function edit(Job $job)
    {
        // Make sure HR managers can only edit their own posts
        abort_if($job->user_id !== auth()->id(), 403);

        return view('hr.jobs.edit', compact('job'));
    }

    /**
     * Update the job post.
     */
    public function update(Request $request, Job $job)
    {
        abort_if($job->user_id !== auth()->id(), 403);

        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'type'         => ['required', 'in:full-time,part-time,contract,internship'],
            'location'     => ['required', 'string', 'max:255'],
            'salary'       => ['nullable', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'status'       => ['required', 'in:open,closed'],
        ]);

        $job->update($validated);

        return redirect()->route('hr.jobs.index')
                         ->with('success', 'Job post updated successfully.');
    }

    /**
     * Delete the job post.
     */
    public function destroy(Job $job)
    {
        abort_if($job->user_id !== auth()->id(), 403);

        $job->delete();

        return redirect()->route('hr.jobs.index')
                         ->with('success', 'Job post deleted successfully.');
    }
}