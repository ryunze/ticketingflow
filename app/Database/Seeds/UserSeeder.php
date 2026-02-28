<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Rikatsu',
                'email' => 'admin@test.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role_id' => 1
            ],
            [
                'name' => 'Kaguya',
                'email' => 'manager@test.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role_id' => 2
            ],
            [
                'name' => 'Zetsu',
                'email' => 'staff@test.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role_id' => 3
            ],
            [
                'name' => 'Chika',
                'email' => 'support@test.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role_id' => 4
            ]
        ];

        foreach ($data as $user) {
            
            $this->db->table('users')->insert($user);
        }
    }
}
