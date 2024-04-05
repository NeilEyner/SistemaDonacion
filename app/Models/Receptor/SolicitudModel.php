<?php

namespace App\Models\Receptor;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table = 'SolicitudDeDonacion'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'IDSolicitud'; // Nombre de la clave primaria de la tabla
    protected $allowedFields = ['IDReceptor', 'FechaSolicitud', 'EstadoSolicitud', 'Cantidad', 'DescripcionNecesidad', 'Prioridad', 'FechaLimiteEntrega', 'InstruccionesEntrega', 'ConfirmacionRecepcion']; // Campos permitidos para inserción y actualización

    protected $useTimestamps = false; // Desactiva la inserción automática de timestamps (created_at, updated_at)

    // Define relaciones
    protected $returnType = 'object'; // Tipo de datos que retorna (objeto en este caso)

}
