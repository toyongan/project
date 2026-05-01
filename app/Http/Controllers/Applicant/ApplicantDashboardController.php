<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Job;

class ApplicantDashboardController extends Controller
{
    public function index()
    {
        $totalJobs  = Job::query()->open()->count();
        $newJobs    = Job::query()->open()
                         ->where('created_at', '>=', now()->startOfWeek())
                         ->count();
        $recentJobs = Job::query()->open()->latest()->take(5)->get();

        $myApplications = 0;

        return view('applicant.dashboard', compact(
            'totalJobs',
            'newJobs',
            'recentJobs',
            'myApplications'
        ));
    }
}