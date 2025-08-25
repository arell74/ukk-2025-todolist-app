<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tasks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
            ],
            'deadline' => [
                'type' => 'DATETIME',
            ],
            'kategori' => [
                'type'       => 'ENUM',
                'constraint' => ['prbadi', 'hiburan', 'pekerjaan'],
            ],
            'prioritas' => [
                'type' => 'ENUM',
                'constraint' => ['rendah', 'sedang', 'tinggi'],
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['belum_selesai', 'selesai'],
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}
