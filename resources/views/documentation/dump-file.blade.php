 ↓
    @extends('layouts.app')
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
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .flow-step .content {
            flex: 1;
        }

        .flow-step .label {
            font-weight: bold;
            color: #333;
            font-size: 1.05em;
        }

        .flow-step .description {
            color: #666;
            font-size: 0.95em;
            margin-top: 5px;
        }

        .arrow {
            text-align: center;
            color: #667eea;
            font-size: 1.5em;
            margin: 5px 0;
        }

        </div>
    </div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white fw-semibold">Dokumentasi Lengkap</div>
        <div class="card-body">
            <h5>Ringkasan Proyek</h5>
            <pre class="bg-light p-3 rounded small">
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            border-radius: 5px;
        .warning-box {
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
            background: #fff3e0;
            border-left: 4px solid #ff9800;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .warning-box strong {
            color: #e65100;
        }

        .success-box {
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .success-box strong {
            color: #2e7d32;
        }

        .url-box {
            background: #f5f5f5;
            padding: 12px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            color: #d32f2f;
            margin: 10px 0;
            word-break: break-all;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th {
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .code-block {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            line-height: 1.5;
        }

        .highlight {
            background: #fff9c4;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }

        .button-example {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-success {
            background: #4caf50;
            color: white;
        }

        .btn-danger {
            background: #f44336;
            color: white;
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }

        .comparison-item {
            padding: 20px;
            border-radius: 8px;
            background: white;
            border: 2px solid #ddd;
        }

        .comparison-item h4 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            border-top: 1px solid #ddd;
        }

        .breadcrumb {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .nav-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .nav-button:hover {
            background: #764ba2;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .content {
                padding: 20px;
            }

            .comparison-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Career Portal</h1>
            <p>Dokumentasi Lengkap Alur Aplikasi</p>
        </div>

        <div class="content">
            <div class="breadcrumb">
                <a href="/">🏠 Home</a>
                <span>→</span>
                <span>📖 Dokumentasi</span>
            </div>

            <!-- LOGIN SECTION -->
            <div class="section">
                <h2>🔐 ALUR LOGIN (Masuk ke Aplikasi)</h2>

                <div class="flow-diagram">
                    <div class="flow-step">
                        <div class="number">1</div>
                        <div class="content">
                            <div class="label">Akses halaman login</div>
                            <div class="description">User membuka halaman login di browser</div>
                            <div class="url-box">GET /login</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">2</div>
                        <div class="content">
                            <div class="label">Tampil form login</div>
                            <div class="description">Halaman menampilkan form input email dan password</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">3</div>
                        <div class="content">
                            <div class="label">Input data login</div>
                            <div class="description">User memasukkan email dan password yang sudah terdaftar</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">4</div>
                        <div class="content">
                            <div class="label">Submit form ke server</div>
                            <div class="description">Form di-submit ke controller untuk divalidasi</div>
                            <div class="url-box">POST /login</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">5</div>
                        <div class="content">
                            <div class="label">Verifikasi kredensial</div>
                            <div class="description">
                                Controller <span class="highlight">AuthenticatedSessionController@store</span> 
                                memverifikasi email & password di database
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">6</div>
                        <div class="content">
                            <div class="label">Create session</div>
                            <div class="description">Session dibuat dan disimpan di database sessions table</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">7</div>
                        <div class="content">
                            <div class="label">Cek role user</div>
                            <div class="description">
                                Sistem memeriksa field <span class="highlight">role</span> di table users
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">8</div>
                        <div class="content">
                            <div class="label">Redirect ke dashboard</div>
                            <div class="description">
                                <strong>Jika role = 'applicant':</strong> Redirect ke <span class="highlight">/dashboard</span><br>
                                <strong>Jika role = 'admin':</strong> Redirect ke <span class="highlight">/admin/dashboard</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-box">
                    <strong>💡 Informasi:</strong> Login menggunakan session-based authentication. 
                    Session disimpan di database (tabel: <span class="highlight">sessions</span>).
                </div>

                <h3 style="margin-top: 25px; color: #667eea;">📋 Tabel Relasi Login</h3>
                <table>
                    <tr>
                        <th>Step</th>
                        <th>Tabel Database</th>
                        <th>Informasi yang Dicek</th>
                    </tr>
                    <tr>
                        <td>Verifikasi</td>
                        <td><span class="highlight">users</span></td>
                        <td>email & password (hashed)</td>
                    </tr>
                    <tr>
                        <td>Cek Role</td>
                        <td><span class="highlight">users.role</span></td>
                        <td>'admin' atau 'applicant'</td>
                    </tr>
                    <tr>
                        <td>Session Store</td>
                        <div class="list-group">
                            @foreach($features as $feature)
                                <div class="list-group-item mb-3">
                                    <h5 class="mb-1">{{ $feature['title'] }}</h5>
                                    <p class="mb-1">{{ $feature['description'] }}</p>
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-5">
                        <h2 class="mb-3">Dokumentasi Lengkap</h2>
                        <div class="mb-4">
                            <h4>Ringkasan Proyek</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim
                        <h4>👨‍💼 Login sebagai Applicant</h4>
                        <p><strong>Email:</strong> budi.santoso@email.com</p>
                        <p><strong>Password:</strong> applicant123</p>
                        <p><strong>Redirect:</strong> /dashboard</p>
                        <p><strong>Role:</strong> applicant</p>
                    </div>
                </div>
            </div>

            <!-- REGISTER SECTION -->
            <div class="section">
                <h2>📝 ALUR REGISTER (Membuat Akun Baru)</h2>

                <div class="flow-diagram">
                    <div class="flow-step">
                        <div class="number">1</div>
                        <div class="content">
                            <div class="label">Akses halaman register</div>
                            <div class="description">User membuka halaman pendaftaran</div>

                            <h4 class="mt-4">Fitur Utama</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim
                    <div class="flow-step">
                    <div class="flow-step">
                            <h4 class="mt-4">Panduan Instalasi & Setup</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim
                        <div class="number">3</div>
                        <div class="content">
                            <div class="label">Input data baru</div>
                            <div class="description">User mengisi form dengan data lengkap dan unik</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>
                            <h4 class="mt-4">Testing & Akun Demo</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim

                    <div class="flow-step">
                        <div class="number">4</div>
                        <div class="content">
                            <div class="label">Submit form</div>
                            <div class="description">Form dikirim ke server untuk diproses</div>
                            <div class="url-box">POST /register</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                            <h4 class="mt-4">Checklist Implementasi</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim
                        <div class="number">5</div>
                                </ul>
                            <h4 class="mt-4">Seeder & Data Dummy</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim
                            </div>
                    <div class="arrow">↓</div>
                            <h4 class="mt-4">Status Proyek</h4>
                            <pre class="bg-light p-3 rounded small">@verbatim

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
                                            <pre class="bg-light p-3 rounded small">@verbatim
                        Email: admin@careerportal.com
                        Password: admin123

                        Email: hr.admin@careerportal.com
                        Password: admin123

                        Email: tech.admin@careerportal.com
                        Password: admin123
                        @endverbatim</pre>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Akun Applicant</h6>
                                            <pre class="bg-light p-3 rounded small">@verbatim
                        Email: budi.santoso@email.com
                        Password: applicant123

                        Email: siti.nurhaliza@email.com
                        Password: applicant123

                        Email: ahmad.ridho@email.com
                        Password: applicant123

                        Email: reza.firmansyah@email.com
                        Password: applicant123

                        Email: dini.wijaya@email.com
                        Password: applicant123

                        Email: fajar.santoso@email.com
                        Password: applicant123
                        @endverbatim</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-5">
                                <div class="card-header bg-primary text-white fw-semibold">Visualisasi Skema Database</div>
                                <div class="card-body">
                                    <pre class="bg-light p-3 rounded small">@verbatim
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
                        @endverbatim</pre>
                                </div>
                            </div>

                            <div class="card mb-5">
                                <div class="card-header bg-primary text-white fw-semibold">Dokumentasi Lengkap</div>
                                <div class="card-body">
                                    <h5>Ringkasan Proyek</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # CAREER PORTAL MVP - COMPLETE PROJECT SUMMARY

                        ## PROJECT STATUS: FULLY COMPLETE & READY TO USE

                        A production-ready Laravel 11 Career Portal application with complete:
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Fitur Utama</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Fitur Utama
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Panduan Instalasi & Setup</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Instalasi
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Testing & Akun Demo</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Akun Admin
                        Email: admin@careerportal.com
                        Password: admin123

                        # Akun Applicant
                        Email: budi.santoso@email.com
                        Password: applicant123
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Checklist Implementasi</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Implementation Checklist
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Seeder & Data Dummy</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Seeder
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Status Proyek</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Complete Status
                        ...existing code...
                        @endverbatim</pre>
                                    <h5 class="mt-4">Catatan Middleware</h5>
                                    <pre class="bg-light p-3 rounded small">@verbatim
                        # Middleware
                        ...existing code...
                        @endverbatim</pre>
                                </div>
                            </div>
                        </div>
                        @endsection
                        <div class="number">3</div>
                        <div class="content">
                            <div class="label">Tampil detail job dengan tombol apply</div>
                            <div class="description">
                                Halaman menampilkan:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li>Job title & description</li>
                                    <li>Required skills</li>
                                    <li>Tombol "Apply" (jika user sudah login)</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">4</div>
                        <div class="content">
                            <div class="label">User klik tombol "Apply"</div>
                            <div class="description">Form disubmit untuk melamar posisi ini</div>
                            <div class="url-box">POST /jobs/{job_id}/apply</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">5</div>
                        <div class="content">
                            <div class="label">Request masuk ke controller</div>
                            <div class="description">
                                Controller <span class="highlight">ApplicationController@apply</span> 
                                menerima request
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">6</div>
                        <div class="content">
                            <div class="label">Cek middleware protection</div>
                            <div class="description">
                                Middleware chain memeriksa:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li><span class="highlight">web</span> - CSRF protection ✓</li>
                                    <li><span class="highlight">auth</span> - User harus login ✓</li>
                                    <li><span class="highlight">applicant</span> - User harus role applicant ✓</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">7</div>
                        <div class="content">
                            <div class="label">Cek aplikasi duplikat</div>
                            <div class="description">
                                Sistem cek apakah user sudah melamar job yang sama sebelumnya
                                di tabel <span class="highlight">applications</span>
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">8</div>
                        <div class="content">
                            <div class="label">Buat application record</div>
                            <div class="description">
                                Insert ke tabel <span class="highlight">applications</span>:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li>applicant_id - dari user yang login</li>
                                    <li>job_id - dari job yang dipilih</li>
                                    <li>status - 'applied'</li>
                                    <li>created_at - timestamp sekarang</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">9</div>
                        <div class="content">
                            <div class="label">Automated skill matching screening</div>
                            <div class="description">
                                <strong>ScreeningService</strong> otomatis melakukan:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li>Ambil skills dari applicant (tabel: applicant_skills)</li>
                                    <li>Ambil required skills dari job (tabel: job_skills)</li>
                                    <li>Hitung kecocokan antara skills</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">10</div>
                        <div class="content">
                            <div class="label">Set screening result</div>
                            <div class="description">
                                Hasil screening di-update ke field 
                                <span class="highlight">screening_result</span> di aplikasi:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li><strong>match</strong> - Semua skills cocok</li>
                                    <li><strong>partial</strong> - Beberapa skills cocok</li>
                                    <li><strong>not_match</strong> - Tidak ada skills yang cocok</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">11</div>
                        <div class="content">
                            <div class="label">Redirect ke dashboard</div>
                            <div class="description">
                                User diarahkan kembali ke dashboard dengan pesan sukses
                            </div>
                            <div class="url-box">Redirect ke /dashboard</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">12</div>
                        <div class="content">
                            <div class="label">Aplikasi tampil di dashboard</div>
                            <div class="description">
                                Aplikasi yang baru saja dibuat muncul di dashboard dengan 
                                status "Applied" dan hasil screening
                            </div>
                        </div>
                    </div>
                </div>

                <div class="success-box">
                    <strong>✅ Apply Job Selesai:</strong> Aplikasi sudah tercatat di database 
                    dan admin bisa melihatnya di admin panel.
                </div>

                <h3 style="margin-top: 25px; color: #667eea;">🔄 Screening Result Explained</h3>
                <table>
                    <tr>
                        <th>Hasil</th>
                        <th>Kondisi</th>
                        <th>Contoh</th>
                    </tr>
                    <tr>
                        <td><span class="highlight">match</span></td>
                        <td>Semua skill job ada di applicant</td>
                        <td>Job butuh: PHP, Laravel | Applicant punya: PHP, Laravel ✓</td>
                    </tr>
                    <tr>
                        <td><span class="highlight">partial</span></td>
                        <td>Hanya sebagian skill yang cocok</td>
                        <td>Job butuh: PHP, Laravel | Applicant punya: PHP ✗</td>
                    </tr>
                    <tr>
                        <td><span class="highlight">not_match</span></td>
                        <td>Tidak ada skill yang cocok</td>
                        <td>Job butuh: PHP, Laravel | Applicant punya: Python, Java ✗</td>
                    </tr>
                </table>

                <h3 style="margin-top: 25px; color: #667eea;">📊 Tabel yang Terisi Saat Apply</h3>
                <table>
                    <tr>
                        <th>Tabel</th>
                        <th>Aksi</th>
                        <th>Data yang Diisi</th>
                    </tr>
                    <tr>
                        <td><span class="highlight">applications</span></td>
                        <td>INSERT</td>
                        <td>applicant_id, job_id, status='applied', screening_result</td>
                    </tr>
                    <tr>
                        <td><span class="highlight">sessions</span></td>
                        <td>UPDATE</td>
                        <td>last_activity, payload (updated)</td>
                    </tr>
                </table>
            </div>

            <!-- ADMIN FLOW SECTION -->
            <div class="section">
                <h2>👨‍💼 ALUR ADMIN (Kelola Aplikasi)</h2>

                <div class="info-box">
                    <strong>ℹ️ Info:</strong> Hanya user dengan role <span class="highlight">admin</span> 
                    yang bisa akses halaman admin.
                </div>

                <div class="flow-diagram">
                    <div class="flow-step">
                        <div class="number">1</div>
                        <div class="content">
                            <div class="label">Login sebagai admin</div>
                            <div class="description">Admin login dengan akun admin terlebih dahulu</div>
                            <div class="url-box">POST /login (role: admin)</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">2</div>
                        <div class="content">
                            <div class="label">Masuk admin panel</div>
                            <div class="description">
                                Admin middleware mengverifikasi role di request session
                            </div>
                            <div class="url-box">GET /admin/dashboard</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">3</div>
                        <div class="content">
                            <div class="label">Lihat aplikasi masuk</div>
                            <div class="description">
                                Admin bisa lihat semua aplikasi dari pelamar
                            </div>
                            <div class="url-box">GET /admin/applications</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">4</div>
                        <div class="content">
                            <div class="label">Review detail aplikasi</div>
                            <div class="description">
                                Admin bisa lihat profil lengkap pelamar:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li>Nama, email, phone</li>
                                    <li>Skills yang dimiliki</li>
                                    <li>Work experience</li>
                                    <li>Education</li>
                                    <li>Screening result</li>
                                </ul>
                            </div>
                            <div class="url-box">GET /admin/applications/{application_id}</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">5</div>
                        <div class="content">
                            <div class="label">Update status aplikasi</div>
                            <div class="description">
                                Admin bisa ubah status menjadi:
                                <ul style="margin-top: 8px; margin-left: 20px;">
                                    <li>applied - baru apply</li>
                                    <li>screening - dalam proses screening</li>
                                    <li>interview - lanjut interview</li>
                                    <li>accepted - diterima</li>
                                    <li>rejected - ditolak</li>
                                </ul>
                            </div>
                            <div class="url-box">PATCH /admin/applications/{application_id}/status</div>
                        </div>
                    </div>

                    <div class="arrow">↓</div>

                    <div class="flow-step">
                        <div class="number">6</div>
                        <div class="content">
                            <div class="label">Status di-update</div>
                            <div class="description">
                                Perubahan status dicatat di tabel 
                                <span class="highlight">application_logs</span> 
                                untuk audit trail
                            </div>
                        </div>
                    </div>
                </div>

                <div class="success-box">
                    <strong>✅ Admin dapat mengelola:</strong> Job postings, review aplikasi, 
                    update status, dan manage admin users lain.
                </div>
            </div>

            <!-- SUMMARY TABLE -->
            <div class="section">
                <h2>📊 RINGKASAN ALUR LENGKAP</h2>

                <table>
                    <tr>
                        <th>Alur</th>
                        <th>URL Entry Point</th>
                        <th>Controller</th>
                        <th>Middleware</th>
                        <th>Redirect Ke</th>
                    </tr>
                    <tr>
                        <td><strong>LOGIN</strong></td>
                        <td>GET /login → POST /login</td>
                        <td>AuthenticatedSessionController@store</td>
                        <td>guest</td>
                        <td>/dashboard (applicant) atau /admin/dashboard (admin)</td>
                    </tr>
                    <tr>
                        <td><strong>REGISTER</strong></td>
                        <td>GET /register → POST /register</td>
                        <td>RegisteredUserController@store</td>
                        <td>guest</td>
                        <td>/dashboard (auto-login)</td>
                    </tr>
                    <tr>
                        <td><strong>APPLY JOB</strong></td>
                        <td>GET /jobs/{id} → POST /jobs/{id}/apply</td>
                        <td>ApplicationController@apply</td>
                        <td>auth, applicant</td>
                        <td>/dashboard dengan success message</td>
                    </tr>
                    <tr>
                        <td><strong>ADMIN REVIEW</strong></td>
                        <td>GET /admin/applications</td>
                        <td>ApplicationController@adminIndex</td>
                        <td>auth, admin</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>UPDATE STATUS</strong></td>
                        <td>PATCH /admin/applications/{id}/status</td>
                        <td>ApplicationController@updateStatus</td>
                        <td>auth, admin</td>
                        <td>Back dengan success message</td>
                    </tr>
                </table>
            </div>

            <!-- MIDDLEWARE SECURITY -->
            <div class="section">
                <h2>🔒 Keamanan & Middleware Protection</h2>

                <h3 style="color: #667eea; margin-bottom: 15px;">Middleware Stack untuk Setiap Rute</h3>

                <div class="comparison-grid">
                    <div class="comparison-item">
                        <h4>Public Routes</h4>
                        <p>Middleware: <span class="highlight">web</span></p>
                        <ul style="margin-top: 10px; margin-left: 20px;">
                            <li>GET /</li>
                            <li>GET /login</li>
                            <li>GET /register</li>
                            <li>GET /jobs</li>
                            <li>GET /jobs/{id}</li>
                        </ul>
                    </div>
                    <div class="comparison-item">
                        <h4>Auth Routes</h4>
                        <p>Middleware: <span class="highlight">web → auth</span></p>
                        <ul style="margin-top: 10px; margin-left: 20px;">
                            <li>GET /profile</li>
                            <li>POST /logout</li>
                        </ul>
                    </div>
                    <div class="comparison-item">
                        <h4>Applicant Routes</h4>
                        <p>Middleware: <span class="highlight">web → auth → applicant</span></p>
                        <ul style="margin-top: 10px; margin-left: 20px;">
                            <li>GET /dashboard</li>
                            <li>POST /jobs/{id}/apply</li>
                            <li>POST /work-experience/add</li>
                            <li>POST /education/add</li>
                        </ul>
                    </div>
                    <div class="comparison-item">
                        <h4>Admin Routes</h4>
                        <p>Middleware: <span class="highlight">web → auth → admin</span></p>
                        <ul style="margin-top: 10px; margin-left: 20px;">
                            <li>GET /admin/dashboard</li>
                            <li>GET /admin/jobs</li>
                            <li>GET /admin/applications</li>
                            <li>PATCH /admin/applications/{id}/status</li>
                        </ul>
                    </div>
                </div>

                <h3 style="color: #667eea; margin-top: 25px; margin-bottom: 15px;">Apa yang Dilindungi Middleware?</h3>

                <div class="info-box">
                    <strong>web</strong><br>
                    ✓ CSRF Token Protection - Mencegah Cross-Site Request Forgery<br>
                    ✓ Session Management - Mengelola user session<br>
                    ✓ Cookie Encryption - Enkripsi cookie untuk keamanan<br>
                    ✓ Error Handling - Menampilkan pesan error dengan aman
                </div>

                <div class="info-box">
                    <strong>auth</strong><br>
                    ✓ User Authentication - Verifikasi user sudah login<br>
                    ✓ Auto Redirect - Redirect ke login jika belum authenticated<br>
                    ✓ Session Validation - Memastikan session valid
                </div>

                <div class="info-box">
                    <strong>applicant</strong><br>
                    ✓ Role Check - Memastikan user adalah applicant<br>
                    ✓ Authorization - 403 Forbidden jika bukan applicant<br>
                    ✓ Applied only untuk applicant actions
                </div>

                <div class="info-box">
                    <strong>admin</strong><br>
                    ✓ Role Check - Memastikan user adalah admin<br>
                    ✓ Authorization - 403 Forbidden jika bukan admin<br>
                    ✓ Applied only untuk admin actions
                </div>
            </div>

            <!-- QUICK REFERENCE -->
            <div class="section">
                <h2>⚡ Quick Reference - Alur Cepat</h2>

                <div class="code-block">
<span style="color: #66d9ef;">FLOW 1: REGISTER → LOGIN → APPLY</span>

1️⃣  User baru: GET /register
    ↓
    Isi form → POST /register
    ↓
    CREATE user (role='applicant')
    CREATE applicant profile
    CREATE session
    ↓
    REDIRECT to /dashboard ✓

2️⃣  Existing user: GET /login
    ↓
    Isi email & password → POST /login
    ↓
    VERIFY email & password
    CHECK user.role
    CREATE session
    ↓
    REDIRECT to /dashboard (applicant) atau /admin/dashboard (admin) ✓

3️⃣  User applicant: GET /jobs/{id}
    ↓
    Klik "Apply" → POST /jobs/{id}/apply
    ↓
    CHECK auth middleware ✓
    CHECK applicant middleware ✓
    CREATE application record
    RUN skill matching screening
    UPDATE screening_result
    ↓
    REDIRECT to /dashboard ✓
                </div>
            </div>

            <!-- HELPFUL NOTES -->
            <div class="section">
                <h2>💡 Catatan Penting</h2>

                <div class="success-box">
                    <strong>✅ Password Security:</strong> Semua password di-hash menggunakan 
                    bcrypt sebelum disimpan ke database. Tidak ada plaintext password.
                </div>

                <div class="success-box">
                    <strong>✅ Session Storage:</strong> Session data disimpan di database 
                    (tabel: <span class="highlight">sessions</span>), bukan di file. 
                    Lebih aman dan scalable.
                </div>

                <div class="success-box">
                    <strong>✅ CSRF Protection:</strong> Semua form POST menggunakan CSRF token 
                    untuk mencegah serangan CSRF.
                </div>

                <div class="warning-box">
                    <strong>⚠️ Auto-login:</strong> Setelah register, user langsung di-login 
                    tanpa perlu input email & password lagi.
                </div>

                <div class="info-box">
                    <strong>ℹ️ Skill Matching:</strong> Automatic screening berdasarkan skill 
                    applicant vs required skills job.
                </div>

                <div class="info-box">
                    <strong>ℹ️ Role Based:</strong> User baru default mendapat role 'applicant'. 
                    Hanya admin yang bisa membuat admin baru.
                </div>
            </div>

            <!-- CONTACT & HELP -->
            <div class="section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-left: none;">
                <h2 style="color: white;">📞 Butuh Bantuan?</h2>
                <p>
                    Dokumentasi ini menjelaskan alur aplikasi Career Portal secara detail.
                    Jika ada pertanyaan atau kebingungan, silakan baca kembali section yang relevan
                    atau hubungi developer.
                </p>
                <a href="/" class="nav-button" style="background: white; color: #667eea;">← Kembali ke Home</a>
            </div>
        </div>

        <div class="footer">
            <p>Career Portal Documentation v1.0</p>
            <p>Generated: January 26, 2026 | Updated: Dokumentasi Alur Aplikasi</p>
        </div>
    </div>
</body>
</html>
