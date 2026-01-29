@extends('layouts.app')

@section('title', $job->title . ' - Career Portal')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title mb-3">{{ $job->title }}</h1>
                
                <div class="mb-4">
                    <span class="badge {{ $job->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $job->is_active ? 'Lowongan Aktif' : 'Lowongan Ditutup' }}
                    </span>
                </div>

                <div class="mb-4">
                    <h5>Deskripsi Pekerjaan</h5>
                    <p>{{ nl2br($job->description) }}</p>
                </div>

                @if($job->skills->count() > 0)
                    <div class="mb-4">
                        <h5>Skill yang Dibutuhkan</h5>
                        <div>
                            @foreach($job->skills as $skill)
                                <span class="badge bg-primary me-2 mb-2">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="d-flex gap-2">
                    @auth
                        @if(auth()->user()->isApplicant())
                            @if($userApplication)
                                <span class="badge bg-success py-2">Sudah melamar</span>
                                <form method="POST" action="{{ route('applicant.withdraw', $userApplication) }}" 
                                      onsubmit="return confirm('Yakin ingin menarik lamaran?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Tarik Lamaran</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('applicant.apply', $job) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Melamar Pekerjaan</button>
                                </form>
                            @endif
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Melamar</a>
                    @endauth

                    <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Informasi Lowongan</h5>
            </div>
            <div class="card-body">
                <p class="mb-2">
                    <strong>Total Pelamar:</strong> {{ $job->applications->count() }}
                </p>
                <p class="mb-2">
                    <strong>Dibuat:</strong> {{ $job->created_at->format('d M Y') }}
                </p>
                <p class="mb-0">
                    <strong>Terakhir Update:</strong> {{ $job->updated_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
