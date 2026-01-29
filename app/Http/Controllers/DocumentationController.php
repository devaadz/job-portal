<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index()
    {
        $features = [
            [
                'title' => 'Pendaftaran & Login',
                'description' => 'Pengguna dapat mendaftar sebagai pelamar dan login ke sistem.'
            ],
            [
                'title' => 'Manajemen Profil',
                'description' => 'Pelamar dapat mengedit profil, mengunggah CV, dan memperbarui data diri.'
            ],
            [
                'title' => 'Lowongan Pekerjaan',
                'description' => 'Semua pengguna dapat melihat daftar lowongan dan detail pekerjaan.'
            ],
            [
                'title' => 'Melamar Pekerjaan',
                'description' => 'Pelamar dapat melamar pekerjaan yang tersedia dan memantau status aplikasi.'
            ],
            [
                'title' => 'Screening Otomatis',
                'description' => 'Sistem melakukan screening otomatis berdasarkan kecocokan skill dan pengalaman.'
            ],
            [
                'title' => 'Dashboard Admin',
                'description' => 'Admin dapat mengelola lowongan, pelamar, dan melihat statistik aplikasi.'
            ],
            [
                'title' => 'Manajemen Skill',
                'description' => 'Admin dapat menambah, mengedit, dan menghapus skill yang tersedia.'
            ],
            [
                'title' => 'Riwayat Lamaran',
                'description' => 'Pelamar dapat melihat riwayat lamaran dan statusnya.'
            ],
        ];
        return view('documentation.index', compact('features'));
    }
}
