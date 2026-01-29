<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationLog;
use App\Models\Job;
use App\Services\ScreeningService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    protected $screeningService;

    public function __construct(ScreeningService $screeningService)
    {
        $this->screeningService = $screeningService;
    }

    public function apply(Request $request, Job $job)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $applicant = auth()->user()->applicant;
        
        // Check for duplicate application
        $existingApplication = Application::where('applicant_id', $applicant->id)
            ->where('job_id', $job->id)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Anda sudah melamar untuk posisi ini');
        }

        // Create application
        $application = Application::create([
            'applicant_id' => $applicant->id,
            'job_id' => $job->id,
            'status' => 'applied',
        ]);

        // Run screening
        $screeningResult = $this->screeningService->screenApplication($application);
        $application->update([
            'screening_result' => $screeningResult,
        ]);

        return redirect()->route('applicant.dashboard')->with('success', 'Lamaran berhasil dikirim');
    }

    public function withdraw(Application $application)
    {
        if ($application->applicant->user_id !== auth()->id()) {
            abort(403);
        }

        $application->delete();
        return redirect()->route('applicant.dashboard')->with('success', 'Lamaran berhasil ditarik');
    }

    // Admin functions
    public function adminIndex(Request $request)
    {
        $query = Application::with(['applicant', 'job']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('applicant', fn($q2) => $q2->where('full_name', 'like', "%{$search}%"))
                ->orWhereHas('job', fn($q2) => $q2->where('title', 'like', "%{$search}%"));
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter job (posisi)
        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        // Limit per page
        $perPage = $request->input('per_page', 10);

        $applications = $query->paginate($perPage)->withQueryString();

        $jobs = \App\Models\Job::all();

        // Request AJAX -> return JSON
        if ($request->ajax()) {
            return response()->json([
                'data' => $applications->items(),
                'pagination' => [
                    'total' => $applications->total(),
                    'per_page' => $applications->perPage(),
                    'current_page' => $applications->currentPage(),
                    'last_page' => $applications->lastPage(),
                ]
            ]);
        }

        return view('admin.applications.index', compact('applications', 'jobs'));
    }


    public function adminShow(Application $application)
    {
        $application->load(['applicant', 'applicant.skills', 'applicant.education', 'applicant.workExperiences', 'job', 'job.skills', 'logs']);
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:applied,screening,interview,accepted,rejected',
            'current_step' => 'required|in:screening,interview,final',
        ]);

        $oldStatus = $application->status;
        $application->update($validated);

        // Log the change
        ApplicationLog::create([
            'application_id' => $application->id,
            'old_status' => $oldStatus,
            'new_status' => $validated['status'],
            'changed_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Status lamaran updated');
    }

    public function downloadApplicantCv(Application $application)
    {
        $applicant = $application->applicant;

        if (!$applicant->cv_file) {
            return redirect()->back()->with('error', 'CV belum di-upload oleh pelamar');
        }

        $filePath = $applicant->cv_file;
        
        if (!Storage::disk('public')->exists($filePath)) {
            return redirect()->back()->with('error', 'File CV tidak ditemukan');
        }

         return Storage::disk('public')->download(
            $filePath,
            $applicant->cv_original 
                ?? 'cv_' . $applicant->full_name . '.' . pathinfo($filePath, PATHINFO_EXTENSION)
        );
    }
}
