<?php

namespace App\Models\Receptor;

use CodeIgniter\Model;

class ReceptorModel extends Model
{
    protected $table = 'Receptor';
    protected $primaryKey = 'IDReceptor';
    protected $allowedFields = ['IDUsuario', 'Tipo', 'Nombre', 'Direccion', 'Ciudad', 'NumeroTelefono', 'CorreoElectronico', 'SitioWeb', 'OtrosDetalles'];
}
