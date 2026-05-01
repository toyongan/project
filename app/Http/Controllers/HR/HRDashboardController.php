<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;

class HRDashboardController extends Controller
{
    public function index()
    {
        $totalJobs    = Job::where('user_id', auth()->id())->count();
        $openJobs     = Job::where('user_id', auth()->id())->open()->count();
        $closedJobs   = Job::where('user_id', auth()->id())->closed()->count();
        $recentJobs   = Job::where('user_id', auth()->id())->latest()->take(5)->get();
        $totalApplicants = Application::whereHas('job', fn($q) => $q->where('user_id', auth()->id()))->count();
        $pendingApplications = Application::whereHas('job', fn($q) => $q->where('user_id', auth()->id()))
                                          ->where('status', 'pending')->count();

        return view('hr.dashboard', compact(
            'totalJobs',
            'openJobs',
            'closedJobs',
            'recentJobs',
            'totalApplicants',
            'pendingApplications'
        ));
    }
}