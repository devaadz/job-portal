<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Skill;
use App\Models\Application;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::active()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load('skills');
        $userApplication = null;

        if (auth()->check() && auth()->user()->isApplicant()) {
            $userApplication = Application::where('applicant_id', auth()->user()->applicant->id)
                ->where('job_id', $job->id)
                ->first();
        }

        return view('jobs.show', compact('job', 'userApplication'));
    }

    // Admin functions
    public function adminIndex()
    {
        $jobs = Job::paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $skills = Skill::all();
        return view('admin.jobs.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',
            'skills' => 'array',
        ]);

        $job = Job::create($validated);
        $job->skills()->sync($request->input('skills', []));

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        $skills = Skill::all();
        $job->load('skills');
        return view('admin.jobs.edit', compact('job', 'skills'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',
            'skills' => 'array',
        ]);

        $job->update($validated);
        $job->skills()->sync($request->input('skills', []));

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully');
    }

    public function toggleActive(Job $job)
    {
        $job->update(['is_active' => !$job->is_active]);
        return redirect()->route('admin.jobs.index')->with('success', 'Job status updated');
    }
}
