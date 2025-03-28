<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call your existing UsersSeeder
        $this->call('UsersSeeder');
    }
}
