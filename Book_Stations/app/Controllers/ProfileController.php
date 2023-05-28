<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ProfileController extends BaseController
{

    protected $session;
    protected $data;
    protected $users;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->data['session'] = $this->session;
        $this->users = new UsersModel();
    }

    public function index()
    {
        $this->data['page_title'] = "Profile";
        $this->data["data"] = $this->users->select('*')->where(['username' => session('username')])->first();
        echo view('content/profile', $this->data);
    }
}
