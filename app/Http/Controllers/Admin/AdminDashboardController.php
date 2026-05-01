<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers      = User::whereIn('role', ['hr_manager', 'applicant'])->count();
        $totalApplicants = User::where('role', 'applicant')->count();
        $totalHrManagers = User::where('role', 'hr_manager')->count();
        $totalJobs       = Job::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalApplicants',
            'totalHrManagers',
            'totalJobs'
        ));
    }
}