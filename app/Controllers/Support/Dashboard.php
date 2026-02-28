<?php

namespace App\Controllers\Support;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        return 'Support Dashboard';
    }
}
