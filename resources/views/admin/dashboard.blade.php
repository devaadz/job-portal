@extends('layouts.app')

@section('title', 'Admin Dashboard - Career Portal')

@section('content')
<h1 class="mb-4">Admin Dashboard</h1>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="display-4">{{ $totalJobs }}</h2>
                <p class="text-muted mb-0">Total Lowongan</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="display-4">{{ $totalApplicants }}</h2>
                <p class="text-muted mb-0">Total Pelamar</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="display-4">{{ $pendingScreening }}</h2>
                <p class="text-muted mb-0">Pending Screening</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="display-4">{{ \App\Models\User::where('role', 'admin')->count() }}</h2>
                <p class="text-muted mb-0">Admin Users</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Manajemen</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('admin.jobs.index') }}" class="text-decoration-none">
                            Kelola Lowongan Pekerjaan
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.skills.index') }}" class="text-decoration-none">
                            Kelola Skill
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                            Kelola Admin User
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.applications.index') }}" class="text-decoration-none">
                            Screening Lamaran
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">
                        + Tambah Lowongan Pekerjaan
                    </a>
                    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">
                        + Tambah Skill
                    </a>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        + Tambah Admin User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
