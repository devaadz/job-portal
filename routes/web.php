<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes - Guest can view job list and job detail

Route::get('/debug-session', function () {
    dd(auth::user(), session()->all());
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    // Profile management for all authenticated users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Applicant routes - only for applicant role
Route::middleware(['auth', 'applicant'])->group(function () {
    Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');
    Route::get('/profile/edit', [ApplicantController::class, 'editProfile'])->name('applicant.edit-profile');
    Route::post('/profile/update', [ApplicantController::class, 'updateProfile'])->name('applicant.update-profile');
    Route::get('/cv/download', [ApplicantController::class, 'downloadCv'])->name('applicant.download-cv');
    
    // Skill routes
    Route::post('/skills/update', [ApplicantController::class, 'updateSkills'])->name('applicant.skills.update');
    // Route::post('/skills/add', [ApplicantController::class, 'addSkill'])->name('applicant.skills.add');
    // Route::delete('/skills/{skill}', [ApplicantController::class, 'deleteSkill'])->name('applicant.skills.delete');

    // Work Experience routes
    Route::post('/work-experience/add', [ApplicantController::class, 'addWorkExperience'])->name('applicant.work-experience.add');
    Route::post('/work-experience/{workExperience}/update', [ApplicantController::class, 'updateWorkExperience'])->name('applicant.work-experience.update');
    Route::delete('/work-experience/{workExperience}', [ApplicantController::class, 'deleteWorkExperience'])->name('applicant.work-experience.delete');
    
    // Education routes
    Route::post('/education/add', [ApplicantController::class, 'addEducation'])->name('applicant.education.add');
    
    // Application routes
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'apply'])->name('applicant.apply');
    Route::delete('/applications/{application}', [ApplicationController::class, 'withdraw'])->name('applicant.withdraw');
});

// Admin routes - only for admin role
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // Documentation route 
    Route::get('/dokumentasi', [\App\Http\Controllers\DocumentationController::class, 'index'])->name('documentation');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Job Management
    Route::get('/jobs', [JobController::class, 'adminIndex'])->name('admin.jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('admin.jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('admin.jobs.store');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
    Route::patch('/jobs/{job}/toggle', [JobController::class, 'toggleActive'])->name('admin.jobs.toggle');
    
    // skil management
    Route::get('/skills', [AdminController::class, 'listSkills'])->name('admin.skills.index');
    Route::get('/skills/create', [AdminController::class, 'createSkill'])->name('admin.skills.create');
    Route::post('/skills', [AdminController::class, 'storeSkill'])->name('admin.skills.store');
    Route::get('/skills/{skill}/edit', [AdminController::class, 'edit   Skill'])->name('admin.skills.edit');
    Route::patch('/skills/{skill}', [AdminController::class, 'updateSkill'])->name('admin.skills.update');
    Route::delete('/skills/{skill}', [AdminController::class, 'deleteSkill'])->name('admin.skills.delete'); 

    // Application Screening
    Route::get('/applications', [ApplicationController::class, 'adminIndex'])->name('admin.applications.index');
    Route::get('/applications/{application}', [ApplicationController::class, 'adminShow'])->name('admin.applications.show');
    Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('admin.applications.update-status');
    Route::get('/applications/{application}/cv/download', [ApplicationController::class, 'downloadApplicantCv'])->name('admin.applications.download-cv');
    
    // Admin User Management
    Route::get('/users', [AdminController::class, 'listAdmins'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'createAdmin'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'storeAdmin'])->name('admin.users.store');
});

require __DIR__.'/auth.php';

