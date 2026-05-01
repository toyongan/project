<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'hr_manager') {
            return redirect()->route('hr.dashboard');
        }

        return redirect()->route('applicant.dashboard');
    }
}