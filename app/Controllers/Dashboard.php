<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        // return the header and footer
        return view('sistema/header'). view('sistema/generate'). view('sistema/footer');
    }
}