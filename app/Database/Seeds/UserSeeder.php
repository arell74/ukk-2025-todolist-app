<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'foto_profile' => 'default.jpg',
            'bio' => 'Halo, aku adalah manusia paling produktif di muka bumi ini!'
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
