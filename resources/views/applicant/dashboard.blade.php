@extends('layouts.app')

@section('title', 'Dashboard Pelamar - Career Portal')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1>Dashboard Pelamar</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('applicant.edit-profile') }}" class="btn btn-primary">Edit Profil</a>
    </div>
</div>

<!-- Profile Summary Card -->
<div class="row mb-4">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $applicant->applications->count() }}</h3>
                <p class="text-muted mb-0">Total Lamaran</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $applicant->applications->where('status', 'accepted')->count() }}</h3>
                <p class="text-muted mb-0">Diterima</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $applicant->applications->where('status', 'screening')->count() }}</h3>
                <p class="text-muted mb-0">Screening</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $applicant->skills->count() }}</h3>
                <p class="text-muted mb-0">Skill</p>
            </div>
        </div>
    </div>
</div>

<!-- Profile Information -->
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Informasi Profil</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $applicant->full_name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Phone:</strong> {{ $applicant->phone ?: 'Belum diisi' }}</p>
                <p><strong>Deskripsi:</strong> {{ $applicant->short_description ?: 'Belum diisi' }}</p>
                <p class="mb-0"><strong>CV:</strong> 
                    @if($applicant->cv_file)
                        <br>
                        <small class="text-muted">
                            File: <strong>{{ basename($applicant->cv_original) }}</strong>
                        </small>
                        <br>
                        <a href="{{ route('applicant.download-cv') }}" class="btn btn-sm btn-success mt-2">
                            <i class="bi bi-download"></i> Download CV
                        </a>
                    @else
                        <span class="text-muted">Belum upload CV</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Skill</h5>
            </div>
            <div class="card-body">
                @if($applicant->skills->count() > 0)
                    @foreach($applicant->skills as $skill)
                        <span class="badge bg-primary me-2 mb-2">{{ $skill->name }}</span>
                    @endforeach
                @else
                    <p class="text-muted mb-0">Belum menambahkan skill</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Applications Status -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Status Lamaran</h5>
            </div>
            <div class="card-body">
                @if($applicant->applications->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Posisi</th>
                                    <th>Status</th>
                                    <th>Tahap</th>
                                    <th>Tanggal Melamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applicant->applications as $application)
                                    <tr>
                                        <td>
                                            <a href="{{ route('jobs.show', $application->job) }}">
                                                {{ $application->job->title }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $application->status === 'accepted' ? 'success' : ($application->status === 'rejected' ? 'danger' : 'warning') }}">
                                                {{ $application->status }}
                                            </span>
                                        </td>       
                                        <td>
                                            <small class="text-muted">{{ ucfirst($application->current_step) }}</small>
                                        </td>
                                        <td>{{ $application->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if($application->status !== 'rejected' && $application->status !== 'accepted')
                                                <form method="POST" action="{{ route('applicant.withdraw', $application) }}" 
                                                      style="display: inline;" 
                                                      onsubmit="return confirm('Yakin ingin menarik lamaran?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Tarik</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        Anda belum melamar ke posisi manapun. <a href="{{ route('jobs.index') }}">Lihat lowongan pekerjaan</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
