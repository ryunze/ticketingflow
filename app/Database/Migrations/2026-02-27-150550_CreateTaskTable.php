<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'title' => [
                'type'          => 'VARCHAR',
                'constraint'    => 150
            ],
            'description' => [
                'type'          => 'TEXT'
            ],
            'created_by' => [
                'type'          => 'INT',
                'unsigned'        => true
            ],
            'assigned_to' => [
                'type'          => 'INT',
                'unsigned'        => true,
                'null'          => true
            ],
            'status_id' => [
                'type'          => 'INT',
                'unsigned'      => true
            ],
            'created_at' => [
                'type' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('assigned_to', 'users', 'id');
        $this->forge->addForeignKey('status_id', 'statuses', 'id');
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}
