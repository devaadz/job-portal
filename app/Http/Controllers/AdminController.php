<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalJobs = \App\Models\Job::count();
        $totalApplicants = \App\Models\Applicant::count();
        $pendingScreening = \App\Models\Application::where('status', 'screening')->count();

        return view('admin.dashboard', compact('totalJobs', 'totalApplicants', 'pendingScreening'));
    }

    // Admin User Management
    public function listAdmins()
    {
        $admins = User::where('role', 'admin')->paginate(10);
        return view('admin.users.index', compact('admins'));
    }

    public function createAdmin()
    {
        return view('admin.users.create');
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Admin user created');
    }

    // Skill Management
    public function listSkills(Request $request)
    {
        $perPage = $request->input('perPage', 15); // default 15
        $query = Skill::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $skills = $query->paginate($perPage)->withQueryString();

        // total skill (tanpa pagination)
        $totalSkills = Skill::count();
        return view('admin.skills.index', compact('skills','totalSkills','perPage'));
    }

    public function createSkill()
    {
        return view('admin.skills.create');
    }

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:skills|max:255',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill created');
    }

    public function editSkill(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:skills,name,' . $skill->id . '|max:255',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated');
    }

    public function deleteSkill(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted');
    }
}
