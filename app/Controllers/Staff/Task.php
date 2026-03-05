<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TaskModel;

class Task extends BaseController
{

    protected $taskModel;

    protected $allowedStatus = [
        [
            'id'    => 1,
            'name'  => 'Draft'
        ],
        [
            'id'    => 5,
            'name'  => 'In Progress'
        ],
        [
            'id'    => 6,
            'name'  => 'Done'
        ],
    ];

    function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $this->taskModel->select('tasks.id AS task_id, statuses.id AS status_id, statuses.name AS status_name, title');
        
        $this->taskModel->join('statuses', 'statuses.id = tasks.status_id');

        $tasks = $this->taskModel->where(['created_by' => session('user_id')])->findAll();

        // var_dump($tasks);
        // exit;

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
