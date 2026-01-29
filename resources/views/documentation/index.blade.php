@extends('layouts.app')

@section('title', 'Dokumentasi Penggunaan')

@section('content')
<div class="py-4">
    <h1 class="mb-4 text-center fw-bold">Dokumentasi Penggunaan Aplikasi Job Portal</h1>

    <div class="row mb-5">
        @foreach($features as $feature)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $feature['title'] }}</h5>
                        <p class="card-text">{{ $feature['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">Contoh Akun Login (Demo)</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold">Akun Admin</h6>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">Email: <b>admin@careerportal.com</b> | Password: <b>admin123</b></li>
                        <li class="list-group-item">Email: <b>hr.admin@careerportal.com</b> | Password: <b>admin123</b></li>
                        <li class="list-group-item">Email: <b>tech.admin@careerportal.com</b> | Password: <b>admin123</b></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold">Akun Applicant</h6>
                    <ul class="list-group">
                        <li class="list-group-item">Email: <b>budi.santoso@email.com</b> | Password: <b>applicant123</b></li>
                        <li class="list-group-item">Email: <b>siti.nurhaliza@email.com</b> | Password: <b>applicant123</b></li>
                        <li class="list-group-item">Email: <b>ahmad.ridho@email.com</b> | Password: <b>applicant123</b></li>
                        <li class="list-group-item">Email: <b>reza.firmansyah@email.com</b> | Password: <b>applicant123</b></li>
                        <li class="list-group-item">Email: <b>dini.wijaya@email.com</b> | Password: <b>applicant123</b></li>
                        <li class="list-group-item">Email: <b>fajar.santoso@email.com</b> | Password: <b>applicant123</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">Visualisasi Skema Database</div>
        <div class="card-body">
            <pre class="bg-light p-3 rounded small">
users                    applicants              jobs
├── id (PK)             ├── id (PK)            ├── id (PK)
├── name                ├── user_id (FK)       ├── title
├── email               ├── full_name          ├── description
├── password            ├── phone              ├── is_active
├── role (enum)         ├── short_desc         └── timestamps
└── timestamps          └── timestamps

            ↓                           ↓
    applicant_skills            job_skills
    (pivot table)               (pivot table)

            ↓                           ↓
        skills                    applications
        ├── id                    ├── id
        ├── name                  ├── applicant_id (FK)
        └── timestamps            ├── job_id (FK)
                                  ├── status
                                  ├── screening_result
                                  └── timestamps
                                        ↓
                                  application_logs
                                  ├── id
                                  ├── application_id (FK)
                                  ├── old_status
                                  ├── new_status
                                  └── changed_by (FK)
            </pre>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">Dokumentasi Lengkap</div>
        <div class="card-body">
            <h5>Ringkasan Proyek</h5>
            <pre class="bg-light p-3 rounded small">
CAREER PORTAL MVP - COMPLETE PROJECT SUMMARY

PROJECT STATUS: FULLY COMPLETE & READY TO USE

A production-ready Laravel 11 Career Portal application dengan:
- Backend architecture (models, controllers, services)
- Database schema (10 optimized tables, all migrated)
- Authentication & authorization (role-based access)
- Frontend views (Blade + Tailwind CSS)
- Complete routing (40+ named routes)
- Business logic (automatic skill screening)
- Documentation (5 comprehensive guides)
            </pre>
            <h5 class="mt-4">Fitur Utama</h5>
            <ul>
                <li>Registrasi & login</li>
                <li>Kelola profil lengkap (CV, skill, pendidikan, pengalaman)</li>
                <li>Cari & lamar pekerjaan</li>
                <li>Dashboard admin & applicant</li>
                <li>Screening otomatis & status lamaran</li>
                <li>Manajemen skill & user</li>
                <li>Riwayat lamaran & audit trail</li>
            </ul>
            <h5 class="mt-4">Panduan Instalasi & Setup</h5>
            <ol>
                <li>Clone project & copy .env</li>
                <li>Generate application key</li>
                <li>Konfigurasi database di .env</li>
                <li>Install dependencies (composer, npm)</li>
                <li>Migrasi database</li>
                <li>Jalankan server: <code>php artisan serve</code></li>
            </ol>
            <h5 class="mt-4">Testing & Akun Demo</h5>
            <ul>
                <li>Login admin: <b>admin@careerportal.com</b> / <b>admin123</b></li>
                <li>Login applicant: <b>budi.santoso@email.com</b> / <b>applicant123</b></li>
                <li>Register applicant baru & coba apply pekerjaan</li>
            </ul>
            <h5 class="mt-4">Checklist Implementasi</h5>
            <ul>
                <li>Database & migrations</li>
                <li>Models & relationships</li>
                <li>Controllers & services</li>
                <li>Authentication & authorization</li>
                <li>Routes & views</li>
                <li>Testing & seeder</li>
            </ul>
            <h5 class="mt-4">Catatan Middleware</h5>
            <ul>
                <li>Route <code>/dokumentasi</code> hanya untuk admin (auth, admin)</li>
                <li>Route applicant & admin sudah diproteksi sesuai role</li>
            </ul>
        </div>
    </div>
</div>
@endsection
