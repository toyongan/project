<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReportsController extends Controller
{
    public function index(Request $request)
    {
        [$jobs, $users, $stats] = $this->getReportData($request);

        return view('admin.reports', array_merge($stats, compact('jobs', 'users')));
    }

    private function getReportData(Request $request): array
    {
        $jobsQuery  = Job::query();
        $usersQuery = User::whereIn('role', ['hr_manager', 'applicant']);

        if ($request->filled('date_from')) {
            $jobsQuery->whereDate('created_at', '>=', $request->date_from);
            $usersQuery->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $jobsQuery->whereDate('created_at', '<=', $request->date_to);
            $usersQuery->whereDate('created_at', '<=', $request->date_to);
        }

        $jobs  = $jobsQuery->latest()->get();
        $users = $usersQuery->latest()->get();

        $stats = [
            'totalUsers'      => User::whereIn('role', ['hr_manager', 'applicant'])->count(),
            'totalApplicants' => User::where('role', 'applicant')->count(),
            'totalJobs'       => Job::count(),
            'openJobs'        => Job::where('status', 'open')->count(),
        ];

        return [$jobs, $users, $stats];
    }
}