<?php namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
