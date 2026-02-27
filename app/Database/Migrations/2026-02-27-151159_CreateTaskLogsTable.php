<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'task_id' => [
                'type'          => 'INT',
                'unsigned'      => true
            ],
            'old_status_id' => [
                'type'          => 'INT',
                'unsigned'      => true
            ],
            'new_status_id' => [
                'type'          => 'INT',
                'unsigned'      => true
            ],
            'change_by' => [
                'type'          => 'INT',
                'unsigned'      => true
            ],
            'note' => [
                'type'          => 'TEXT',
                'null'          => true
            ],
            'created_at' => [
                'type' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('task_id', 'tasks', 'id');
        $this->forge->addForeignKey('change_by', 'users', 'id');
        $this->forge->createTable('task_logs');
    }

    public function down()
    {
        $this->forge->dropTable('task_logs');
    }
}
