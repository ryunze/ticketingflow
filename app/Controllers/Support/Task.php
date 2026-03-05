<?php

namespace App\Controllers\Support;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TaskModel;

class Task extends BaseController
{

    protected $taskModel;

    function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {

        $this->taskModel->select('tasks.id AS task_id, title, created_by, statuses.name AS status_name');
        $this->taskModel->join('statuses', 'statuses.id = tasks.status_id');

        $tasks = $this->taskModel->where(['assigned_to' => session('user_id')])->findAll();


        // var_dump($tasks);
        // exit;

        return view('support/task/index', [
            'data' => [
                'tasks' => $tasks
            ]
        ]);
    }

    public function updateStatus($id)
    {
        $task = $this->taskModel->find($id);
        
        if (!$task) {
            // return redirect()->back();
            return "Task not found.";
        }

        if ($task['assigned_to'] != session('user_id')) {
            // return redirect()->back();
            return "Task is not for this user.";
        }

        $newStatus = $this->request->getPost('status_id');

        $this->taskModel->update($id, [
            'status_id' => $newStatus
        ]);

        return redirect()->back(); 


    }
    
}
