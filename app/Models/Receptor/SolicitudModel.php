<?php

namespace App\Models\Receptor;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table = 'SolicitudDeDonacion';
    protected $primaryKey = 'IDSolicitud';
    protected $allowedFields = ['IDReceptor', 'FechaSolicitud', 'EstadoSolicitud', 'Cantidad', 'DescripcionNecesidad', 'Prioridad', 'FechaLimiteEntrega', 'InstruccionesEntrega', 'ConfirmacionRecepcion'];
}
