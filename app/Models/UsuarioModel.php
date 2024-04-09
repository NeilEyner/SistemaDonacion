<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'Usuario';
    protected $primaryKey = 'IDUsuario';
    protected $allowedFields = ['Nombre', 'Usuario', 'CorreoElectronico', 'Contrasena', 'Rol', 'Habilitado'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['Contrasena'])) {
            return $data;
        }
        $data['data']['Contrasena'] = password_hash($data['data']['Contrasena'], PASSWORD_DEFAULT);
        return $data;
    }
    public function getusuarios()
    {
        return $this->findAll();
    }
    public function encontrarUsuario($id)
    {
        return $this->find($id);
    }
}
