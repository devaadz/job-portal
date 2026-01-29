@extends('layouts.app')

@section('title', 'Lowongan Pekerjaan - Career Portal')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1>Lowongan Pekerjaan</h1>
    </div>
    @auth
        @if(auth()->user()->isAdmin())
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">+ Tambah Lowongan</a>
            </div>
        @endif
    @endauth
</div>

<div class="row">
    @forelse($jobs as $job)
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($job->description, 100) }}</p>
                    
                    @if($job->skills->count() > 0)
                        <div class="mb-3">
                            <strong>Skill yang dibutuhkan:</strong>
                            <div class="mt-2">
                                @foreach($job->skills as $skill)
                                    <span class="badge bg-light text-dark">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge {{ $job->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $job->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                Tidak ada lowongan pekerjaan yang tersedia saat ini.
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="row mt-4">
    <div class="col-12">
        {{ $jobs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
