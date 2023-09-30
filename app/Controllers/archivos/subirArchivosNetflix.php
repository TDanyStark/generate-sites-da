<?php namespace App\Controllers\archivos;

use App\Controllers\BaseController;

class subirArchivosNetflix extends BaseController{
    public function index(){
        // recibir el formulario por POST
        $datos = $this->request->getPost();

        // recibir los archivos por POST
        $archivos = $this->request->getFiles();

        // enviar archivos a la carpeta uploads
        foreach($archivos as $archivo){
            if($archivo->isValid() && !$archivo->hasMoved()){
                $archivo->move('../uploads', $archivo->getName());
            }
        }


        return $this->response->setJSON($datos);
    }
}