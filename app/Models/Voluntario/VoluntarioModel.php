<?php

namespace App\Models\Voluntario;

use CodeIgniter\Model;

class VoluntarioModel extends Model
{
    protected $table = 'Voluntario';
    protected $primaryKey = 'IDVoluntario';
    protected $allowedFields = ['IDUsuario', 'ExperienciaLaboral', 'Habilidades'];
}
