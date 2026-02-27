<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Draft', 'Pending Approval', 'Approved', 'Assigned', 'In Progress', 'Done', 'Rejected'
        ];

        foreach ($data as $role) {
            
            $this->db->table('statuses')->insert([
                'name' => $role
            ]);
        }
    }
}
