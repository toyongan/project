<?php

use App\Http\Controllers\HR\HRApplicationsController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminReportsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Applicant\ApplicantDashboardController;
use App\Http\Controllers\Applicant\ApplicantJobsController;
use App\Http\Controllers\HR\HRDashboardController;
use App\Http\Controllers\HR\HRJobsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// --- Applicant routes ---
Route::middleware(['auth', 'verified', 'role:applicant'])->prefix('applicant')->name('applicant.')->group(function () {
    Route::get('/dashboard', [ApplicantDashboardController::class, 'index'])->name('dashboard');
    Route::get('/jobs', [ApplicantJobsController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [ApplicantJobsController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{job}/apply', [ApplicantJobsController::class, 'apply'])->name('jobs.apply');
    Route::get('/applications', [ApplicantJobsController::class, 'applications'])->name('applications');
    Route::get('/applications/{application}', [ApplicantJobsController::class, 'showApplication'])->name('applications.show');
    Route::delete('/applications/{application}/cancel', [ApplicantJobsController::class, 'cancel'])->name('applications.cancel');
});

// --- HR Manager routes ---
Route::middleware(['auth', 'verified', 'role:hr_manager'])->prefix('hr')->name('hr.')->group(function () {
    Route::get('/dashboard', [HRDashboardController::class, 'index'])->name('dashboard');
    Route::resource('jobs', HRJobsController::class);
    Route::get('/applications', [HRApplicationsController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [HRApplicationsController::class, 'show'])->name('applications.show');
    Route::patch('/applications/{application}', [HRApplicationsController::class, 'update'])->name('applications.update');
});

// --- Admin routes ---
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/reports', [AdminReportsController::class, 'index'])->name('reports');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


// --- Profile ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
