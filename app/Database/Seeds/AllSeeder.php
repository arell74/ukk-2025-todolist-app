<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TaskSeeder::class);

        echo "Database seeded successfully!\n";
        echo "- Users: " . $this->db->table('users')->countAll() . " record\n";
        echo "- Tasks: " . $this->db->table('tasks')->countAll() . " records\n";
    }
}
