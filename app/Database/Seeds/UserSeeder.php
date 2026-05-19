<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new User();
        $userModel->insert([
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ]);
    }
}
