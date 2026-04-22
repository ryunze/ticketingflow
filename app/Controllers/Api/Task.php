<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TaskModel;

class Task extends ResourceController
{

    protected $modelName = 'App\Models\TaskModel';
    protected $format    = 'json';

    public function delete($id)
    {

        $dataTask = $this->model->where(['id' => $id])->first();

        if (is_null($dataTask)) {
            return $this->failNotFound("Task $id tidak ditemukan");
        }

        $this->model->delete(['id' => $id]);

        if (!$this->model->affectedRows()) {
            $this->failForbidden("Gagal hapus task $id");
        }

        return $this->respondDeleted([
            'message' => "Task $id berhasil dihapus"
        ]);

    }
}
