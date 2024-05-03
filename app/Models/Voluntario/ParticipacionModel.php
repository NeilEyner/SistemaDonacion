<?php
namespace App\Models\Voluntario;

use CodeIgniter\Model;

class ParticipacionModel extends Model
{
    protected $table      = 'ParticipacionVoluntario';
    protected $primaryKey = 'IDParticipacion';

    protected $allowedFields = ['IDVoluntario', 'IDDonacion', 'TipoOperacion', 'FechaHora', 'CantidadColaboradores', 'ConformidadRecojo', 'ConformidadEntrega', 'EstadoParticipacion'];
}
