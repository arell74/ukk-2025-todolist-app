<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'judul' => 'Coding',
                'deskripsi' => 'Belajar Framework Codeigniter 4 Materi: Seeder',
                'deadline' => date('Y-m-d', strtotime('+7 days')),
                'prioritas' => 'sedang',
                'kategori' => 'pekerjaan',
                'status' => 'belum_selesai'
            ],
            [
                'user_id' => 1,
                'judul' => 'Ngaji',
                'deskripsi' => 'Baca Surah Al-Baqarah Minimal 30 ayat.',
                'deadline' => '2007-01-10 14:30:00',
                'prioritas' => 'tinggi',
                'kategori' => 'pribadi',
                'status' => 'belum_selesai'
            ]
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}
