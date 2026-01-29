@extends('layouts.app')

@section('title', 'Edit Profil - Career Portal')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h1 class="mb-4">Edit Profil Pelamar</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#personal">Data Pribadi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#skills">Skill</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#experience">Pengalaman Kerja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#education">Pendidikan</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Personal Data Tab -->
            <div id="personal" class="tab-pane fade show active">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant.update-profile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" 
                                       id="full_name" name="full_name" value="{{ old('full_name', $applicant->full_name) }}" required>
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone', $applicant->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="short_description" class="form-label">Deskripsi Singkat</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                          id="short_description" name="short_description" rows="4">{{ old('short_description', $applicant->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cv_file" class="form-label">Upload CV (PDF/DOC/DOCX)</label>
                                @if($applicant->cv_file)
                                    <p class="text-muted small">
                                        File saat ini: <a href="{{ asset('storage/' . $applicant->cv_file) }}" target="_blank">Download</a>
                                    </p>
                                @endif
                                <input type="file" class="form-control @error('cv_file') is-invalid @enderror" 
                                       id="cv_file" name="cv_file" accept=".pdf,.doc,.docx">
                                @error('cv_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Skills Tab -->
            {{-- <div id="skills" class="tab-pane fade">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant.update-profile') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Cari Skill</label>
                                <input type="text" id="skillSearch" class="form-control" placeholder="Ketik nama skill...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tambah Skill Baru</label>
                                <input type="text" id="newSkillInput" class="form-control" placeholder="Contoh: Laravel, Docker, Figma">
                                <small class="text-muted">Tekan Enter untuk menambah (maks total 15 skill)</small>

                                <div id="newSkillContainer" class="mt-2"></div>
                            </div>
                            <div class="border p-3 rounded" style="max-height: 300px; overflow-y: auto;">
                                @foreach($allSkills as $skill)
                                    <div class="form-check skill-item">
                                        <input class="form-check-input skill-checkbox" type="checkbox"
                                            name="skills[]"
                                            value="{{ $skill->id }}"
                                            id="skill_{{ $skill->id }}"
                                            {{ $applicant->skills->contains($skill->id) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="skill_{{ $skill->id }}">
                                            {{ $skill->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <input type="hidden" name="new_skills[]" id="newSkillsHidden">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Skill</button>
                        </form>
                    </div>
                </div>
            </div> --}}
            <div id="skills" class="tab-pane fade">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant.skills.update') }}">
                            @csrf

                            {{-- Search --}}
                            <div class="mb-3">
                                <label class="form-label">Cari Skill</label>
                                <input type="text" id="skillSearch" class="form-control" placeholder="Ketik nama skill...">
                            </div>

                            {{-- Add new skill --}}
                            <div class="mb-3">
                                <label class="form-label">Tambah Skill Baru</label>
                                <input type="text" id="newSkillInput" class="form-control"
                                    placeholder="Contoh: Laravel, Docker, Figma">
                                <small class="text-muted">Tekan Enter (maks total 15 skill)</small>
                                <div id="newSkillContainer" class="mt-2"></div>
                            </div>

                            {{-- Skill list --}}
                            <div class="border p-3 rounded" style="max-height:300px; overflow-y:auto;">
                                @foreach($allSkills as $skill)
                                    <div class="form-check skill-item">
                                        <input class="form-check-input skill-checkbox"
                                            type="checkbox"
                                            name="skills[]"
                                            value="{{ $skill->id }}"
                                            id="skill_{{ $skill->id }}"
                                            {{ $applicant->skills->contains($skill->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="skill_{{ $skill->id }}">
                                            {{ $skill->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Hidden new skills --}}
                            <input type="hidden" name="new_skills" id="newSkillsHidden">

                            @error('skills')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary mt-3">
                                Simpan Skill
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Work Experience Tab -->
            <div id="experience" class="tab-pane fade">
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Daftar Pengalaman Kerja</h5>
                    </div>
                    <div class="card-body">
                        @forelse($applicant->workExperiences as $experience)
                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <h6>{{ $experience->company_name }}</h6>
                                    <p class="text-muted small mb-2">
                                        {{ $experience->start_month }}/{{ $experience->start_year }} - 
                                        {{ $experience->end_month }}/{{ $experience->end_year }}
                                        <strong>({{ $experience->duration }})</strong>
                                    </p>
                                    <p>{{ $experience->description }}</p>
                                    <form method="POST" action="{{ route('applicant.work-experience.delete', $experience) }}" 
                                          style="display: inline;" onsubmit="return confirm('Hapus pengalaman ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum menambahkan pengalaman kerja</p>
                        @endforelse
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Tambah Pengalaman Kerja</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant.work-experience.add') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="company_name" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" 
                                       id="company_name" name="company_name" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_month" class="form-label">Bulan Mulai</label>
                                    <select class="form-select @error('start_month') is-invalid @enderror" 
                                            id="start_month" name="start_month" required>
                                        <option value="">Pilih bulan</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="start_year" class="form-label">Tahun Mulai</label>
                                    <input type="number" class="form-control @error('start_year') is-invalid @enderror" 
                                           id="start_year" name="start_year" min="1970" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="end_month" class="form-label">Bulan Selesai</label>
                                    <select class="form-select @error('end_month') is-invalid @enderror" 
                                            id="end_month" name="end_month" required>
                                        <option value="">Pilih bulan</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_year" class="form-label">Tahun Selesai</label>
                                    <input type="number" class="form-control @error('end_year') is-invalid @enderror" 
                                           id="end_year" name="end_year" min="1970" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" required></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah Pengalaman</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Education Tab -->
            <div id="education" class="tab-pane fade">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Informasi Pendidikan</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant.education.add') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="university" class="form-label">Universitas</label>
                                <input type="text" class="form-control @error('university') is-invalid @enderror" 
                                       id="university" name="university" 
                                       value="{{ old('university', $applicant->education->university ?? '') }}">
                                @error('university')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="major" class="form-label">Jurusan</label>
                                <input type="text" class="form-control @error('major') is-invalid @enderror" 
                                       id="major" name="major" 
                                       value="{{ old('major', $applicant->education->major ?? '') }}">
                                @error('major')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="study_duration_year" class="form-label">Lama Studi (Tahun)</label>
                                    <input type="number" class="form-control @error('study_duration_year') is-invalid @enderror" 
                                           id="study_duration_year" name="study_duration_year" min="1" 
                                           value="{{ old('study_duration_year', $applicant->education->study_duration_year ?? '') }}">
                                    @error('study_duration_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gpa" class="form-label">IPK</label>
                                    <input type="number" step="0.01" class="form-control @error('gpa') is-invalid @enderror" 
                                           id="gpa" name="gpa" min="0" max="4" 
                                           value="{{ old('gpa', $applicant->education->gpa ?? '') }}">
                                    @error('gpa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Pendidikan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
const maxSkills = 15;
let newSkills = [];

// search skill
document.getElementById('skillSearch').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.skill-item').forEach(item => {
        item.style.display = item.innerText.toLowerCase().includes(q) ? '' : 'none';
    });
});

// hitung total
function totalSelected() {
    return document.querySelectorAll('.skill-checkbox:checked').length + newSkills.length;
}

// add skill baru
document.getElementById('newSkillInput').addEventListener('keypress', function (e) {
    if (e.key !== 'Enter') return;
    e.preventDefault();

    let skill = this.value.trim().toLowerCase();
    if (!skill) return;

    if (totalSelected() >= maxSkills) {
        alert('Maksimal 15 skill');
        return;
    }

    // cek apakah skill sudah ada di checkbox
    const existing = [...document.querySelectorAll('.skill-checkbox')]
        .find(cb => cb.nextElementSibling.innerText.toLowerCase() === skill);

    // kalau sudah ada → auto checklist
    if (existing) {
        existing.checked = true;
        this.value = '';
        return;
    }

    // cek duplikat new skill
    if (newSkills.includes(skill)) {
        this.value = '';
        return;
    }

    newSkills.push(skill);
    updateHidden();

    const badge = document.createElement('span');
    badge.className = 'badge bg-secondary me-2 mb-2';
    badge.dataset.skill = skill;
    badge.innerHTML = `${skill}
        <span style="cursor:pointer" onclick="removeNewSkill(this)"> ×</span>`;

    document.getElementById('newSkillContainer').appendChild(badge);
    this.value = '';
});

// remove new skill
function removeNewSkill(el) {
    const skill = el.parentElement.dataset.skill;
    newSkills = newSkills.filter(s => s !== skill);
    el.parentElement.remove();
    updateHidden();
}

// limit checkbox
document.querySelectorAll('.skill-checkbox').forEach(cb => {
    cb.addEventListener('change', function () {
        if (totalSelected() > maxSkills) {
            alert('Maksimal 15 skill');
            this.checked = false;
        }
    });
});

function updateHidden() {
    document.getElementById('newSkillsHidden').value = JSON.stringify(newSkills);
}
</script>
@endsection
