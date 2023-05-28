<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends BaseController
{

    protected $session;
    protected $data;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['page_title'] = "Login";
        return view('auth/login', $this->data);
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->select('*')->where([
            'username' => $username,
        ])->first();
        if ($dataUser->role == 'administrator') {
            session()->set([
                'isAdmin' => TRUE
            ]);
        }
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'address' => $dataUser->address,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Wrong username or password');
                return redirect()->route('login');
            }
        } else {
            session()->setFlashdata('error', 'Wrong username or password');
            return redirect()->route('login');
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
