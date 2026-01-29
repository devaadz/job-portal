# Career Portal MVP

Platform manajemen lowongan kerja dan proses rekrutmen yang modern, dibangun dengan Laravel, Blade, dan MySQL.

## 🎯 Tujuan Proyek

Membangun aplikasi web monolith yang memudahkan:
- **HR/Admin**: Mengelola lowongan pekerjaan, skill, dan melakukan screening aplikasi
- **Pelamar**: Mencari dan melamar lowongan pekerjaan, mengelola profil, dan melacak status lamaran

## 🛠️ Tech Stack

- **Backend**: Laravel 11 (PHP >= 8.2)
- **Frontend**: Blade Templates + Bootstrap 5
- **Database**: MySQL
- **Authentication**: Laravel Session Auth
- **Architecture**: Monolith (Web + Blade)

## ✨ Fitur Utama

### Untuk Pelamar (Applicant)
- 📋 Registrasi dan login
- 🔍 Cari dan lihat detail lowongan pekerjaan
- 📝 Melamar pekerjaan
- 👤 Kelola profil lengkap:
  - Informasi dasar (nama, email, phone)
  - Upload CV
  - Pilih skill
  - Tambah pendidikan
  - Riwayat pekerjaan
- 📊 Pantau status lamaran
- 🚫 Tarik lamaran

### Untuk Admin/HR
- 🏢 Dashboard dengan statistik
- 💼 Manajemen lowongan pekerjaan:
  - Buat lowongan baru
  - Edit lowongan
  - Aktifkan/nonaktifkan
  - Hapus lowongan
- 🏷️ Manajemen skill
- 👥 Manajemen user admin
- 📧 Review aplikasi pelamar:
  - Lihat profil lengkap pelamar
  - Lihat CV
  - Automatic skill matching (match/partial/not match)
  - Update status lamaran
  - Lihat riwayat perubahan status

### Untuk Guest
- 🔓 Lihat daftar lowongan aktif
- 👀 Lihat detail lowongan
- 🔐 Diminta login untuk melamar

## 🗂️ Struktur Database

```
users (id, name, email, password, role)
├── applicants (1-to-1)
│   ├── applicant_skills (many-to-many with skills)
│   ├── work_experiences (1-to-many)
│   ├── educations (1-to-1)
│   └── applications (1-to-many)
│       └── application_logs (1-to-many)

jobs (id, title, description, is_active)
├── job_skills (many-to-many with skills)
└── applications (1-to-many)

skills (id, name)
├── job_skills (many-to-many with jobs)
└── applicant_skills (many-to-many with applicants)

application_logs (id, application_id, old_status, new_status, changed_by)
```

## 🚀 Quick Start

### Setup Lokal

```bash
# 1. Clone project
cd test-job-portal

# 2. Install dependencies
composer install
npm install && npm run build

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Database setup
# Edit .env: DB_DATABASE=career_portal
php artisan migrate
php artisan db:seed

# 5. Create storage link
php artisan storage:link

# 6. Start server
php artisan serve
```

**Default Credentials** (setelah seeding):
- Admin: admin@careerportal.com / password
- Applicant: applicant1@example.com / password

Lihat [INSTALLATION.md](INSTALLATION.md) untuk detail lengkap.

## 📁 Project Structure

```
career-portal/
├── app/
│   ├── Http/
│   │   ├── Controllers/        # Business logic
│   │   └── Middleware/         # Custom middleware
│   ├── Models/                 # Eloquent models
│   └── Services/               # Business services
├── database/
│   ├── migrations/             # Database schema
│   └── seeders/                # Test data
├── resources/
│   └── views/                  # Blade templates
│       ├── layouts/
│       ├── auth/
│       ├── jobs/
│       ├── applicant/
│       └── admin/
├── routes/
│   └── web.php                 # Route definitions
└── public/
```

## 🔑 Konsep Penting

### Screening Logic
Sistem screening otomatis menghitung kecocokan skill:
- **Match**: 100% skill requirements terpenuhi
- **Partial**: Sebagian skill requirements terpenuhi
- **Not Match**: Tidak ada skill yang match

HR dapat menggunakan hasil ini untuk membuat keputusan interview.

### Role-Based Access
- **Guest**: Hanya bisa view
- **Applicant**: Kelola profil dan lamaran
- **Admin**: Kelola sistem dan screening

### File Storage
CV dan file diupload ke `storage/app/public/` dan dapat diakses via `public/storage/`

## 📝 API Routes Overview

### Public Routes
- `GET /` - Homepage
- `GET /jobs` - Job list
- `GET /jobs/{job}` - Job detail
- `GET /login` - Login page
- `POST /login` - Login action
- `GET /register` - Register page
- `POST /register` - Register action

### Applicant Routes (protected by auth + applicant middleware)
- `GET /applicant/dashboard` - Dashboard
- `GET /applicant/profile/edit` - Edit profile form
- `POST /applicant/profile/update` - Update profile
- `POST /applicant/jobs/{job}/apply` - Apply for job
- `DELETE /applicant/applications/{application}` - Withdraw application
- `POST /applicant/work-experiences` - Add work experience
- `POST /applicant/education` - Add education

### Admin Routes (protected by auth + admin middleware)
- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/jobs` - Job list
- `POST /admin/jobs` - Create job
- `GET /admin/jobs/{job}/edit` - Edit form
- `POST /admin/jobs/{job}` - Update job
- `DELETE /admin/jobs/{job}` - Delete job
- `POST /admin/jobs/{job}/toggle` - Toggle active status
- `GET /admin/skills` - Skills list
- `POST /admin/skills` - Create skill
- `GET /admin/applications` - Applications list
- `GET /admin/applications/{application}` - Application detail
- `POST /admin/applications/{application}/status` - Update status
- `GET /admin/users` - Admin users list
- `POST /admin/users` - Create admin user

## 🛡️ Security Features

- ✅ CSRF protection
- ✅ SQL injection prevention (prepared statements)
- ✅ Password hashing (bcrypt)
- ✅ Session-based authentication
- ✅ Role-based authorization
- ✅ File upload validation
- ✅ Duplicate application prevention

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Blade Documentation](https://laravel.com/docs/blade)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)

## 📄 License

MIT License - Feel free to use this project for educational and commercial purposes.

---

**Created**: January 2026  
**Status**: MVP Ready for Deployment
