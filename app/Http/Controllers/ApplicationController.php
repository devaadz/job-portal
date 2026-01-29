<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Skill;
use App\Models\WorkExperience;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $applicant = $user->applicant->load(['applications', 'applications.job', 'skills', 'education', 'workExperiences']);
        // dd($applicant->applications);
        return view('applicant.dashboard', compact('applicant'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        $applicant = $user->applicant->load(['skills', 'education', 'workExperiences']);
        $allSkills = Skill::all();
        return view('applicant.edit-profile', compact('applicant', 'allSkills'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'short_description' => 'nullable|string',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120'
        ]);


        if ($request->hasFile('cv_file')) {
             if ($applicant->cv_file) {
                Storage::disk('public')->delete($applicant->cv_file);
            }
            $file = $request->file('cv_file');

            $path = $request->file('cv_file')->store('cv', 'public');
            $validated['cv_file'] = $path;
            $validated['cv_original'] = $file->getClientOriginalName();
        }

        $applicant->update($validated);
        
        return redirect()->route('applicant.dashboard')->with('success', 'Profil updated berhasil');
    }

    public function addWorkExperience(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'start_month' => 'required|integer|min:1|max:12',
            'start_year' => 'required|integer|min:1970',
            'end_month' => 'required|integer|min:1|max:12',
            'end_year' => 'required|integer|min:1970',
            'description' => 'required|string',
        ]);

        $user->applicant->workExperiences()->create($validated);

        return redirect()->route('applicant.edit-profile')->with('success', 'Work experience added');
    }

    public function updateWorkExperience(Request $request, WorkExperience $workExperience)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'start_month' => 'required|integer|min:1|max:12',
            'start_year' => 'required|integer|min:1970',
            'end_month' => 'required|integer|min:1|max:12',
            'end_year' => 'required|integer|min:1970',
            'description' => 'required|string',
        ]);

        $workExperience->update($validated);

        return redirect()->route('applicant.edit-profile')->with('success', 'Work experience updated');
    }

    public function deleteWorkExperience(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->route('applicant.edit-profile')->with('success', 'Work experience deleted');
    }

    public function addEducation(Request $request)
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        $validated = $request->validate([
            'major' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'study_duration_year' => 'required|integer|min:1',
            'gpa' => 'nullable|decimal:0,2|min:0|max:4',
        ]);

        $applicant->education()->updateOrCreate(['applicant_id' => $applicant->id], $validated);

        return redirect()->route('applicant.edit-profile')->with('success', 'Education info updated');
    }

        
    public function downloadCv()
    {
        $applicant = Auth::user()->applicant;

        if (!$applicant || !$applicant->cv_file) {
            return redirect()->back()->with('error', 'CV belum di-upload');
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

    
    // add skill
    public function updateSkills(Request $request)
    {   
        $applicant = Auth::user()->applicant;

        // ambil data dari request
        $selected = $request->input('skills', []) ?? [];
        $newSkills = json_decode($request->input('new_skills', '[]'), true) ?? [];

        // Gabungkan semua ke array untuk validasi sekaligus
        $dataToValidate = [
            'skills' => $selected,
            'new_skills' => $newSkills,
        ];
        // dd( $dataToValidate);
        $validator = Validator::make($dataToValidate, [
            'skills' => 'nullable|array',
            'skills.*' => 'integer|exists:skills,id',
            'new_skills' => 'nullable|array',
            'new_skills.*' => 'string|max:50|regex:/^[A-Za-z0-9\s\+\-\#\.,_]+$/',
        ], [
            'new_skills.*.regex' => 'Skill hanya boleh berisi huruf, angka, spasi, atau simbol + - # . , _',
            'new_skills.*.max' => 'Skill maksimal 50 karakter',
        ]);

        // ✅ validasi tambahan: total maksimal 15
        $validator->after(function ($validator) use ($selected, $newSkills) {
            if (count($selected) + count($newSkills) > 15) {
                $validator->errors()->add('skills', 'Total skill maksimal 15');
            }
        });
        $validator->validate(); // trigger validasi, akan redirect balik kalau gagal


        $skillIds = $selected;

        foreach ($newSkills as $name) {
            $name = strtolower(trim($name));

            $skill = Skill::firstOrCreate(
                ['name' => $name],
                ['name' => ucfirst($name)]
            );

            $skillIds[] = $skill->id;
        }

        // sync (otomatis remove yg di-uncheck)
        $applicant->skills()->sync(array_unique($skillIds));

        return back()->with('success', 'Skill berhasil diperbarui');
    }

}
