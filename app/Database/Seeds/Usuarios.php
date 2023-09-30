<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user' => 'admin',
                'password' => 'admin',
                'privilege' => 'admin'
            ],
            [
                'user' => 'user',
                'password' => 'user',
                'privilege' => 'user'
            ],
        ];

        $this->db->table('usuarios')->insertBatch($data);
    }
}
