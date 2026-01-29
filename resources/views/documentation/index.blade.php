@extends('layouts.app')

@section('title', 'Dokumentasi Penggunaan')

@section('content')
<div class="py-4 container">

    {{-- HEADER --}}
    <h1 class="mb-4 text-center fw-bold">
        Dokumentasi Penggunaan Aplikasi Job Portal
    </h1>
    <p class="text-center text-muted mb-5">
        Panduan lengkap penggunaan sistem Career Portal (Admin & Applicant)
    </p>

    {{-- FITUR APLIKASI --}}
    <div class="row mb-5">
        @foreach($features as $feature)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            {{ $feature['title'] }}
                        </h5>
                        <p class="card-text">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- AKUN DEMO --}}
    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">
            Contoh Akun Login (Demo)
        </div>
        <div class="card-body">
            <div class="row">

                {{-- ADMIN --}}
                <div class="col-md-6">
                    <h6 class="fw-bold">Akun Admin</h6>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            admin@careerportal.com | <b>admin123</b>
                        </li>
                        <li class="list-group-item">
                            hr.admin@careerportal.com | <b>admin123</b>
                        </li>
                        <li class="list-group-item">
                            tech.admin@careerportal.com | <b>admin123</b>
                        </li>
                    </ul>
                </div>

                {{-- APPLICANT --}}
                <div class="col-md-6">
                    <h6 class="fw-bold">Akun Applicant</h6>
                    <ul class="list-group">
                        <li class="list-group-item">
                            budi.santoso@email.com | <b>applicant123</b>
                        </li>
                        <li class="list-group-item">
                            siti.nurhaliza@email.com | <b>applicant123</b>
                        </li>
                        <li class="list-group-item">
                            ahmad.ridho@email.com | <b>applicant123</b>
                        </li>
                        <li class="list-group-item">
                            reza.firmansyah@email.com | <b>applicant123</b>
                        </li>
                        <li class="list-group-item">
                            dini.wijaya@email.com | <b>applicant123</b>
                        </li>
                        <li class="list-group-item">
                            fajar.santoso@email.com | <b>applicant123</b>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    {{-- SKEMA DATABASE --}}
    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">
            Visualisasi Skema Database
        </div>
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
applicant_skills              job_skills
(pivot table)                 (pivot table)

        ↓                           ↓
skills                      applications
├── id                      ├── id
├── name                    ├── applicant_id (FK)
└── timestamps              ├── job_id (FK)
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

    {{-- DOKUMENTASI LENGKAP --}}
    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">
            Dokumentasi Lengkap
        </div>
        <div class="card-body">

            <h5>Ringkasan Proyek</h5>
<pre class="bg-light p-3 rounded small">
CAREER PORTAL MVP - COMPLETE PROJECT SUMMARY

STATUS: FULLY COMPLETE & READY TO USE

✔ Laravel 11
✔ Role-based authentication
✔ Admin & Applicant dashboard
✔ Automatic skill screening
✔ Audit trail & application logs
✔ Clean architecture (MVC + Service)
</pre>

            <h5 class="mt-4">Fitur Utama</h5>
            <ul>
                <li>Registrasi & Login</li>
                <li>Manajemen profil & CV</li>
                <li>Apply pekerjaan</li>
                <li>Dashboard Admin & Applicant</li>
                <li>Screening otomatis</li>
                <li>Manajemen skill & user</li>
                <li>Riwayat & log aktivitas</li>
            </ul>

            <h5 class="mt-4">Instalasi Singkat</h5>
            <ol>
                <li>Clone repository</li>
                <li>Copy <code>.env</code></li>
                <li>Set database</li>
                <li><code>composer install</code></li>
                <li><code>php artisan key:generate</code></li>
                <li><code>php artisan migrate --seed</code></li>
                <li><code>php artisan serve</code></li>
            </ol>

            <h5 class="mt-4">Catatan Keamanan</h5>
            <ul>
                <li>Route <code>/dokumentasi</code> → admin only</li>
                <li>Admin: <code>/admin/dashboard</code></li>
                <li>Applicant: <code>/dashboard</code></li>
            </ul>

        </div>
    </div>

</div>
@endsection
