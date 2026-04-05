<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Task extends BaseController
{
    public function cancel()
    {
        $request = $this->request->getJSON(true);
        var_dump($request);
    }
}
