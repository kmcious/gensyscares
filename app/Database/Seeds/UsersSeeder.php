<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'      => 'Admin User',
                'email'     => 'admin@gmail.com',
                'password'  => password_hash('admin123', PASSWORD_BCRYPT), // Hashing password
                'role'      => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'      => 'Regular User',
                'email'     => 'user@gmail.com',
                'password'  => password_hash('user123', PASSWORD_BCRYPT),
                'role'      => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'      => 'Kurt Necessario',
                'email'     => 'kurt.necessario921@gmail.com',
                'password'  => password_hash('admin', PASSWORD_BCRYPT),
                'role'      => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Insert data into the database
        $this->db->table('usertable')->insertBatch($data);
    }
}