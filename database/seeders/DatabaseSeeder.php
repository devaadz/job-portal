<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Run skill seeder
        $this->call(SkillSeeder::class);

        // ===== CREATE ADMIN USERS =====
        $admin1 = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@careerportal.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $admin2 = User::create([
            'name' => 'Admin HR',
            'email' => 'hr.admin@careerportal.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $admin3 = User::create([
            'name' => 'Admin Teknis',
            'email' => 'tech.admin@careerportal.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // ===== CREATE APPLICANT USERS WITH DIFFERENT PROFILES =====
        
        // Applicant 1: Senior Backend Developer
        $user1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@email.com',
            'password' => Hash::make('applicant123'),
            'role' => 'applicant',
        ]);

        $applicant1 = Applicant::create([
            'user_id' => $user1->id,
            'full_name' => 'Budi Santoso',
            'phone' => '08123456789',
            'short_description' => 'Senior Backend Developer dengan 7 tahun pengalaman di industri fintech dan e-commerce. Spesialis PHP, Laravel, dan Database Architecture.',
        ]);

        $applicant1->skills()->attach([1, 2, 14, 9, 13, 8]); // PHP, Laravel, REST API, PostgreSQL, Git, MySQL

        Education::create([
            'applicant_id' => $applicant1->id,
            'university' => 'Universitas Indonesia',
            'major' => 'Teknik Informatika',
            'study_duration_year' => 4,
            'gpa' => 3.75,
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant1->id,
            'company_name' => 'PT Fintech Solutions',
            'start_month' => 1,
            'start_year' => 2021,
            'end_month' => 12,
            'end_year' => 2024,
            'description' => 'Senior Backend Developer - Membangun sistem pembayaran dan manajemen keuangan',
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant1->id,
            'company_name' => 'PT E-Commerce Indonesia',
            'start_month' => 6,
            'start_year' => 2018,
            'end_month' => 12,
            'end_year' => 2020,
            'description' => 'Backend Developer - Mengembangkan API dan integrasi sistem',
        ]);

        // Applicant 2: Frontend Developer React
        $user2 = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti.nurhaliza@email.com',
            'password' => Hash::make('applicant123'),
            'role' => 'applicant',
        ]);

        $applicant2 = Applicant::create([
            'user_id' => $user2->id,
            'full_name' => 'Siti Nurhaliza',
            'phone' => '08234567890',
            'short_description' => 'Frontend Developer berpengalaman 5 tahun dengan expertise di React, TypeScript, dan responsive design. Berpengalaman di startup dan perusahaan skala menengah.',
        ]);

        $applicant2->skills()->attach([3, 5, 26, 16, 17, 13]); // JavaScript, React, TypeScript, HTML/CSS, Tailwind CSS, Git

        Education::create([
            'applicant_id' => $applicant2->id,
            'university' => 'Institut Teknologi Bandung',
            'major' => 'Ilmu Komputer',
            'study_duration_year' => 4,
            'gpa' => 3.65,
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant2->id,
            'company_name' => 'PT Digital Startup',
            'start_month' => 3,
            'start_year' => 2021,
            'end_month' => null,
            'end_year' => null,
            'description' => 'Senior Frontend Developer - Membangun UI/UX yang responsif dan performa tinggi',
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant2->id,
            'company_name' => 'PT Web Development Agency',
            'start_month' => 7,
            'start_year' => 2019,
            'end_month' => 2,
            'end_year' => 2021,
            'description' => 'Frontend Developer - Mengembangkan berbagai proyek web untuk klien korporat',
        ]);

        // Applicant 3: Full Stack Developer
        $user3 = User::create([
            'name' => 'Ahmad Ridho',
            'email' => 'ahmad.ridho@email.com',
            'password' => Hash::make('applicant123'),
            'role' => 'applicant',
        ]);

        $applicant3 = Applicant::create([
            'user_id' => $user3->id,
            'full_name' => 'Ahmad Ridho',
            'phone' => '08345678901',
            'short_description' => 'Full Stack Developer dengan 6 tahun pengalaman. Menguasai MERN stack dan Laravel. Berpengalaman membangun aplikasi skala besar dengan user base ribuan.',
        ]);

        $applicant3->skills()->attach([1, 2, 3, 5, 24, 25, 26, 13]); // PHP, Laravel, JavaScript, React, Node.js, Express.js, TypeScript, Git

        Education::create([
            'applicant_id' => $applicant3->id,
            'university' => 'Universitas Gadjah Mada',
            'major' => 'Teknik Informatika',
            'study_duration_year' => 4,
            'gpa' => 3.55,
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant3->id,
            'company_name' => 'PT Tech Solutions Indonesia',
            'start_month' => 4,
            'start_year' => 2020,
            'end_month' => null,
            'end_year' => null,
            'description' => 'Full Stack Developer - Mengembangkan aplikasi web dan mobile backend',
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant3->id,
            'company_name' => 'PT Freelance Developer',
            'start_month' => 1,
            'start_year' => 2018,
            'end_month' => 3,
            'end_year' => 2020,
            'description' => 'Full Stack Developer - Bekerja untuk berbagai klien internasional',
        ]);

        // Applicant 4: DevOps Engineer
        $user4 = User::create([
            'name' => 'Reza Firmansyah',
            'email' => 'reza.firmansyah@email.com',
            'password' => Hash::make('applicant123'),
            'role' => 'applicant',
        ]);

        $applicant4 = Applicant::create([
            'user_id' => $user4->id,
            'full_name' => 'Reza Firmansyah',
            'phone' => '08456789012',
            'short_description' => 'DevOps Engineer dengan 4 tahun pengalaman di cloud infrastructure. Expert di Docker, Kubernetes, AWS, dan CI/CD pipeline.',
        ]);

        $applicant4->skills()->attach([11, 12, 13, 9, 1, 2]); // Docker, AWS, Git, PostgreSQL, PHP, Laravel

        Education::create([
            'applicant_id' => $applicant4->id,
            'university' => 'Universitas Diponegoro',
            'major' => 'Teknik Informatika',
            'study_duration_year' => 4,
            'gpa' => 3.42,
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant4->id,
            'company_name' => 'PT Cloud Infrastructure',
            'start_month' => 2,
            'start_year' => 2021,
            'end_month' => null,
            'end_year' => null,
            'description' => 'DevOps Engineer - Mengelola infrastruktur cloud dan otomasi deployment',
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant4->id,
            'company_name' => 'PT System Administrator',
            'start_month' => 6,
            'start_year' => 2019,
            'end_month' => 1,
            'end_year' => 2021,
            'description' => 'System Administrator - Mengelola server dan network infrastruktur',
        ]);

        // Applicant 5: Data Analyst
        $user5 = User::create([
            'name' => 'Dini Wijaya',
            'email' => 'dini.wijaya@email.com',
            'password' => Hash::make('applicant123'),
            'role' => 'applicant',
        ]);

        $applicant5 = Applicant::create([
            'user_id' => $user5->id,
            'full_name' => 'Dini Wijaya',
            'phone' => '08567890123',
            'short_description' => 'Data Analyst dengan 3 tahun pengalaman. Ahli dalam SQL, Python, dan business intelligence. Berpengalaman dengan berbagai data visualization tools.',
        ]);

        $applicant5->skills()->attach([7, 9, 23, 8]); // Django, PostgreSQL, SQL, MySQL

        Education::create([
            'applicant_id' => $applicant5->id,
            'university' => 'Universitas Airlangga',
            'major' => 'Statistika',
            'study_duration_year' => 4,
            'gpa' => 3.68,
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant5->id,
            'company_name' => 'PT Data Analytics',
            'start_month' => 5,
            'start_year' => 2022,
            'end_month' => null,
            'end_year' => null,
            'description' => 'Data Analyst - Menganalisis data dan membuat laporan bisnis',
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant5->id,
            'company_name' => 'PT Business Intelligence',
            'start_month' => 8,
            'start_year' => 2020,
            'end_month' => 4,
            'end_year' => 2022,
            'description' => 'Junior Data Analyst - Pemrosesan data dan visualization',
        ]);

        // Applicant 6: Junior Developer (Fresh Grad)
        $user6 = User::create([
            'name' => 'Fajar Santoso',
            'email' => 'fajar.santoso@email.com',
            'password' => Hash::make('applicant123'),
            'role' => 'applicant',
        ]);

        $applicant6 = Applicant::create([
            'user_id' => $user6->id,
            'full_name' => 'Fajar Santoso',
            'phone' => '08678901234',
            'short_description' => 'Fresh graduate dengan passion di web development. Memiliki portfolio project dari bootcamp dan kuliah. Siap belajar dan berkembang dalam tim profesional.',
        ]);

        $applicant6->skills()->attach([1, 2, 3, 16, 17, 13]); // PHP, Laravel, JavaScript, HTML/CSS, Tailwind CSS, Git

        Education::create([
            'applicant_id' => $applicant6->id,
            'university' => 'Universitas Negeri Jakarta',
            'major' => 'Teknik Informatika',
            'study_duration_year' => 4,
            'gpa' => 3.45,
        ]);

        WorkExperience::create([
            'applicant_id' => $applicant6->id,
            'company_name' => 'PT Bootcamp Tech Academy',
            'start_month' => 1,
            'start_year' => 2024,
            'end_month' => 3,
            'end_year' => 2024,
            'description' => 'Peserta Bootcamp - Intensif belajar web development full stack',
        ]);

        // ===== CREATE JOBS =====
        $jobTitles = [
            [
                'title' => 'Senior PHP Developer',
                'description' => 'Mencari developer PHP senior dengan pengalaman minimal 5 tahun dalam membangun aplikasi web dengan Laravel. Harus menguasai REST API, database design, dan memiliki track record yang baik dalam project management. Akan bekerja pada sistem backend yang critical untuk business operations.',
                'skills' => [1, 2, 14, 9, 8],
                'is_active' => true,
            ],
            [
                'title' => 'Frontend Developer (React)',
                'description' => 'Kami mencari frontend developer yang berpengalaman dengan React dan TypeScript. Harus memiliki pemahaman yang kuat tentang HTML/CSS, responsive design, dan modern web standards. Idealnya memiliki pengalaman dengan state management dan performance optimization.',
                'skills' => [3, 5, 26, 16, 17],
                'is_active' => true,
            ],
            [
                'title' => 'Full Stack Developer',
                'description' => 'Dibutuhkan full stack developer yang dapat menangani baik backend maupun frontend. Pengalaman dengan Node.js dan Vue.js akan menjadi nilai tambah. Anda akan bekerja pada produk yang melayani jutaan users.',
                'skills' => [1, 2, 3, 24, 25, 4, 13],
                'is_active' => true,
            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'Kami mencari DevOps engineer untuk mengelola infrastruktur cloud kami. Pengalaman dengan Docker, Kubernetes, dan AWS sangat diperlukan. Anda akan bertanggung jawab pada reliability dan performance sistem kami.',
                'skills' => [11, 12, 13, 9, 1],
                'is_active' => true,
            ],
            [
                'title' => 'Data Analyst',
                'description' => 'Bergabunglah dengan tim analytics kami. Anda akan bekerja dengan SQL, Python, dan tools analytics lainnya untuk menghasilkan insights bisnis. Strong communication skills required untuk present findings kepada stakeholders.',
                'skills' => [7, 9, 23, 8],
                'is_active' => true,
            ],
            [
                'title' => 'Backend Developer (Entry Level)',
                'description' => 'Posisi untuk fresh graduate atau junior developer dengan passion di backend development. Kami menyediakan mentoring dan growth opportunity. Familiar dengan PHP dan framework seperti Laravel adalah plus.',
                'skills' => [1, 2, 13, 8],
                'is_active' => true,
            ],
        ];

        $jobs = [];
        foreach ($jobTitles as $jobData) {
            $job = Job::create([
                'title' => $jobData['title'],
                'description' => $jobData['description'],
                'is_active' => $jobData['is_active'],
            ]);

            $job->skills()->attach($jobData['skills']);
            $jobs[] = $job;
        }

        // ===== CREATE APPLICATIONS WITH DIFFERENT STATUSES =====
        
        // Applicant 1 (Senior) - Multiple applications
        Application::create([
            'applicant_id' => $applicant1->id,
            'job_id' => $jobs[0]->id, // Senior PHP Developer
            'status' => 'interview',
            'screening_result' => 'match',
            'current_step' => 'interview',
        ]);

        Application::create([
            'applicant_id' => $applicant1->id,
            'job_id' => $jobs[2]->id, // Full Stack Developer
            'status' => 'screening',
            'screening_result' => 'match',
            'current_step' => 'screening',
        ]);

        // Applicant 2 (Frontend) - Applications
        Application::create([
            'applicant_id' => $applicant2->id,
            'job_id' => $jobs[1]->id, // Frontend Developer (React)
            'status' => 'interview',
            'screening_result' => 'match',
            'current_step' => 'interview',
        ]);

        Application::create([
            'applicant_id' => $applicant2->id,
            'job_id' => $jobs[2]->id, // Full Stack Developer
            'status' => 'screening',
            'screening_result' => 'partial',
            'current_step' => 'screening',
        ]);

        // Applicant 3 (Full Stack) - Applications
        Application::create([
            'applicant_id' => $applicant3->id,
            'job_id' => $jobs[2]->id, // Full Stack Developer
            'status' => 'applied',
            'screening_result' => null,
            'current_step' => 'screening',
        ]);

        Application::create([
            'applicant_id' => $applicant3->id,
            'job_id' => $jobs[0]->id, // Senior PHP Developer
            'status' => 'screening',
            'screening_result' => 'partial',
            'current_step' => 'screening',
        ]);

        // Applicant 4 (DevOps) - Application
        Application::create([
            'applicant_id' => $applicant4->id,
            'job_id' => $jobs[3]->id, // DevOps Engineer
            'status' => 'interview',
            'screening_result' => 'match',
            'current_step' => 'interview',
        ]);

        // Applicant 5 (Data Analyst) - Application
        Application::create([
            'applicant_id' => $applicant5->id,
            'job_id' => $jobs[4]->id, // Data Analyst
            'status' => 'applied',
            'screening_result' => null,
            'current_step' => 'screening',
        ]);

        // Applicant 6 (Junior) - Applications
        Application::create([
            'applicant_id' => $applicant6->id,
            'job_id' => $jobs[5]->id, // Backend Developer (Entry Level)
            'status' => 'screening',
            'screening_result' => 'match',
            'current_step' => 'screening',
        ]);

        Application::create([
            'applicant_id' => $applicant6->id,
            'job_id' => $jobs[0]->id, // Senior PHP Developer
            'status' => 'applied',
            'screening_result' => 'not_match',
            'current_step' => 'screening',
        ]);
    }
}
