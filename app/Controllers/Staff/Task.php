<?php

namespace App\Controllers\Staff;

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
        $tasks = $this->taskModel->where(['created_by' => session('user_id')])->findAll();
        return view('staff/task/index', [
            'data' => [
                'tasks' => $tasks
            ]
        ]);
    }

    public function create()
    {
        return view('staff/task/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['created_by'] = session('user_id');
        $data['status_id'] = 1;
        
        $this->taskModel->insert($data);

        return redirect()->route('staff.dashboard');

    }

}
