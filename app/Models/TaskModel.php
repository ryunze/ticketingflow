<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'title', 'description', 'created_by', 'assigned_to', 'status_id'
    ];

    // protected $useTimestamps    = true;
   
}
