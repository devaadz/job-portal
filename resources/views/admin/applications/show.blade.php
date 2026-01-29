@extends('layouts.app')

@section('title', 'Detail Lamaran - Career Portal')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary mb-3">← Kembali</a>
        <h1>Detail Lamaran</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Applicant Profile -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Profil Pelamar</h5>
            </div>
            <div class="card-body">
                <h5>{{ $application->applicant->full_name }}</h5>
                <p>
                    <strong>Email:</strong> {{ $application->applicant->user->email }}<br>
                    <strong>Phone:</strong> {{ $application->applicant->phone }}<br>
                    <strong>Deskripsi:</strong> {{ $application->applicant->short_description ?: '-' }}
                </p>
                @if($application->applicant->cv_file)
                    <div class="mt-3">
                        <p class="mb-2">
                            <strong>CV:</strong> 
                            <small class="text-muted">{{ basename($application->applicant->cv_original) }}</small>
                        </p>
                        <a href="{{ route('admin.applications.download-cv', $application) }}" class="btn btn-sm btn-success" download>
                            <i class="bi bi-download"></i> Download CV
                        </a>
                    </div>
                @else
                    <div class="mt-3">
                        <p class="text-muted"><em>CV belum di-upload</em></p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Skills -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Skill Pelamar</h5>
            </div>
            <div class="card-body">
                @if($application->applicant->skills->count() > 0)
                    @foreach($application->applicant->skills as $skill)
                        <span class="badge bg-primary me-2 mb-2">{{ $skill->name }}</span>
                    @endforeach
                @else
                    <p class="text-muted mb-0">Belum menambahkan skill</p>
                @endif
            </div>
        </div>

        <!-- Work Experience -->
        @if($application->applicant->workExperiences->count() > 0)
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Pengalaman Kerja</h5>
                </div>
                <div class="card-body">
                    @foreach($application->applicant->workExperiences as $experience)
                        <div class="mb-3 pb-3 border-bottom">
                            <h6 class="mb-1">{{ $experience->company_name }}</h6>
                            <p class="text-muted small mb-2">
                                {{ $experience->start_month }}/{{ $experience->start_year }} - 
                                {{ $experience->end_month }}/{{ $experience->end_year }}
                            </p>
                            <p class="mb-0">{{ $experience->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Education -->
        @if($application->applicant->education)
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Pendidikan</h5>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Universitas:</strong> {{ $application->applicant->education->university }}<br>
                        <strong>Jurusan:</strong> {{ $application->applicant->education->major }}<br>
                        <strong>Lama Studi:</strong> {{ $application->applicant->education->study_duration_year }} tahun<br>
                        <strong>IPK:</strong> {{ $application->applicant->education->gpa ?? '-' }}
                    </p>
                </div>
            </div>
        @endif

        <!-- Job Details -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Detail Posisi</h5>
            </div>
            <div class="card-body">
                <h5>{{ $application->job->title }}</h5>
                <p>{{ $application->job->description }}</p>
                
                <div class="mt-3">
                    <strong>Skill yang Dibutuhkan:</strong>
                    <div class="mt-2">
                        @foreach($application->job->skills as $skill)
                            <span class="badge bg-warning text-dark me-2">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Logs -->
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Riwayat Perubahan Status</h5>
            </div>
            <div class="card-body">
                @if($application->logs->count() > 0)
                    <div class="timeline">
                        @foreach($application->logs as $log)
                            <div class="timeline-item mb-3">
                                <p class="text-muted small mb-1">{{ $log->created_at->format('d M Y H:i') }}</p>
                                <p class="mb-1">
                                    <strong>{{ $log->changedByUser->name }}</strong> 
                                    mengubah status dari <span class="badge bg-secondary">{{ $log->old_status }}</span> 
                                    ke <span class="badge bg-success">{{ $log->new_status }}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">Belum ada riwayat perubahan</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Screening Result -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Hasil Screening</h5>
            </div>
            <div class="card-body">
                @if($application->screening_result)
                    <p>
                        <strong>Status:</strong> 
                        <span class="badge bg-info">{{ $application->screeningResultLabelAttribute }}</span>
                    </p>
                @else
                    <p class="text-muted">Belum di-screening</p>
                @endif
            </div>
        </div>

        <!-- Application Status -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Status Lamaran</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.applications.update-status', $application) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="applied" {{ $application->status === 'applied' ? 'selected' : '' }}>Melamar</option>
                            <option value="screening" {{ $application->status === 'screening' ? 'selected' : '' }}>Screening</option>
                            <option value="interview" {{ $application->status === 'interview' ? 'selected' : '' }}>Interview</option>
                            <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Diterima</option>
                            <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="current_step" class="form-label">Tahap Saat Ini</label>
                        <select class="form-select @error('current_step') is-invalid @enderror" id="current_step" name="current_step" required>
                            <option value="screening" {{ $application->current_step === 'screening' ? 'selected' : '' }}>Screening</option>
                            <option value="interview" {{ $application->current_step === 'interview' ? 'selected' : '' }}>Interview</option>
                            <option value="final" {{ $application->current_step === 'final' ? 'selected' : '' }}>Final</option>
                        </select>
                        @error('current_step')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Status</button>
                </form>
            </div>
        </div>

        <!-- Application Info -->
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Informasi Lamaran</h5>
            </div>
            <div class="card-body">
                <p class="mb-2">
                    <strong>Tanggal Melamar:</strong><br>
                    {{ $application->created_at->format('d M Y H:i') }}
                </p>
                <p class="mb-0">
                    <strong>Terakhir Update:</strong><br>
                    {{ $application->updated_at->format('d M Y H:i') }}
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .timeline {
        position: relative;
        padding-left: 0;
    }

    .timeline-item {
        padding-left: 20px;
        position: relative;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 10px;
        height: 10px;
        background-color: #2563eb;
        border-radius: 50%;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        left: 4px;
        top: 15px;
        width: 2px;
        height: 30px;
        background-color: #e2e8f0;
    }

    .timeline-item:last-child::after {
        display: none;
    }
</style>
@endsection
