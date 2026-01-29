@extends('layouts.app')

@section('title', 'Career Portal - Platform Rekrutmen Modern')

@section('content')
<div class="row mb-5">
    <div class="col-lg-8 mx-auto text-center">
        <h1 class="display-4 fw-bold mb-4">Selamat Datang di Career Portal</h1>
        <p class="lead mb-4">Platform manajemen lowongan kerja dan rekrutmen yang modern dan efisien</p>
        
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="btn btn-lg btn-primary me-2">Admin Dashboard</a>
            @else
                <a href="{{ route('applicant.dashboard') }}" class="btn btn-lg btn-primary me-2">Dashboard Pelamar</a>
            @endif
        @else
            <a href="{{ route('jobs.index') }}" class="btn btn-lg btn-primary me-2">Lihat Lowongan</a>
            <a href="{{ route('register') }}" class="btn btn-lg btn-outline-primary">Daftar Sekarang</a>
        @endauth
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="h1 mb-3">📊</div>
                <h5 class="card-title">Manajemen Lowongan</h5>
                <p class="card-text">Kelola lowongan pekerjaan dengan mudah dan efisien melalui dashboard admin</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="h1 mb-3">🔍</div>
                <h5 class="card-title">Screening Otomatis</h5>
                <p class="card-text">Sistem screening berdasarkan skill matching untuk mempercepat proses rekrutmen</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="h1 mb-3">💼</div>
                <h5 class="card-title">Kelola Aplikasi</h5>
                <p class="card-text">Pantau status lamaran kerja dan berkomunikasi dengan calon karyawan</p>
            </div>
        </div>
    </div>
</div>

@guest
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card bg-light">
                <div class="card-body p-5 text-center">
                    <h4 class="mb-3">Siap untuk memulai?</h4>
                    <p class="mb-4">Daftar sebagai pelamar atau hubungi admin untuk mendapatkan akses admin</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sebagai Pelamar</a>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection
