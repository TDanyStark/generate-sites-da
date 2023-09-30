<?php

namespace App\Models\API\v1;

use CodeIgniter\Model;


class LoginModel extends Model
{
    public function fetchLogin($user, $password)
    {
        $builder = $this->db->table('usuarios');
        $builder->select('id, user, password , privilege');
        $builder->where('user', $user);
        $builder->where('password', $password);
        $query = $builder->get();
        $result = $query->getResultArray();
        return $result;
    }
}
