<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Netflix extends BaseController
{
    public function index(): string
    {
        return view('sistema/header'). view('sistema/netflixVista'). view('sistema/footer');
    }
}