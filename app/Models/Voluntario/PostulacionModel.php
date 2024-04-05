<?php

namespace App\Models\Voluntario;

use CodeIgniter\Model;

class PostulacionModel extends Model
{
    protected $table = 'Postulaciones';
    protected $primaryKey = 'IDPostulacion';
    protected $allowedFields = ['IDVoluntario', 'TipoOperacion', 'IDSolicitud', 'FechaPostulacion', 'EstadoPostulacion'];
}
