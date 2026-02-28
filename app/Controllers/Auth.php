<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{

    protected $userModel;

    function __construct()
    {
        $this->userModel = new UserModel; 
    }

    public function login()
    {
        return view('login');
    }

    public function handle_login()
    {
        $data = $this->request->getPost();
        // var_dump($data);

        $user = $this->userModel->where([
            'email' => $data['email']
        ])->first();

        if (is_null($user)) {
            return redirect()->back()->with('error', 'User not found.');
        }

        if (!password_verify($data['password'], $user['password'])) {
            return redirect()->back()->with('error', 'Password incorect.');
        }

        $session = session();

        $session->set([
            'user_id' => $user['id'],
            'name' => $user['name'],
            'role_id' => $user['role_id'],
            'isLoggedIn' => true
        ]);

        return $this->redirectByRole($user['role_id']);

    }

    private function redirectByRole($roleId)
    {
        switch ($roleId) {
            case 1:
                return redirect()->route('admin.dashboard');
            case 2:
                return redirect()->route('manager.dashboard');
            case 3:
                return redirect()->route('staff.dashboard');
            case 4:
                return redirect()->route('support.dashboard');
            default:
                return redirect()->route('auth.login');
        }
    }

}
