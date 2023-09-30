<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AccesoSistema implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
            $session = session();
            if(!$session->has('user')){
                return redirect()->to(base_url());
            }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
