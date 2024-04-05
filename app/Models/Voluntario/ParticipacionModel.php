<?php
namespace App\Models\Voluntario;

use CodeIgniter\Model;

class ParticipacionModel extends Model
{
    protected $table = 'ParticipacionVoluntario'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'IDParticipacion'; // Clave primaria de la tabla
    protected $allowedFields = ['IDVoluntario', 'IDDonacion', 'TipoOperacion', 'FechaHora', 'CantidadColaboradores', 'ConformidadEntrega']; // Campos permitidos para operaciones de inserción y actualización
}
