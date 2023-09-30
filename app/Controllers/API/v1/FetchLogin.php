<?php namespace App\Controllers\API\v1;

use App\Models\API\v1\LoginModel;
use App\Controllers\BaseController;

class FetchLogin extends BaseController
{
    public function index(){
        
        $data = $this->request->getJSON();
        $user = $data->user;
        $password = $data->password;


        $model = new LoginModel();
        $result = $model->fetchLogin($user, $password);

        if(count($result) > 0){
            $session = session();
            $session->set('user', $result[0]['user']);
            $session->set('id', $result[0]['id']);
            $session->set('privilege', $result[0]['privilege']);
            
            return $this->response->setJSON(array('status' => true, 'message' => 'Login success'));
        }else{
            return $this->response->setJSON(array('status' => false, 'message' => 'Login failed'));
        }


    }
}
