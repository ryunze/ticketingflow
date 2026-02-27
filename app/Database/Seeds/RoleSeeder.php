<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'admin', 'manager', 'staff', 'support'
        ];

        foreach ($data as $role) {
            
            $this->db->table('roles')->insert([
                'name' => $role
            ]);
        }
    }
}
