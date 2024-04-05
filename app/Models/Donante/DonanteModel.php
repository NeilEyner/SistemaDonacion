<?php

namespace App\Models\Donante;

use CodeIgniter\Model;

class DonanteModel extends Model
{
    protected $table = 'Donante';
    protected $primaryKey = 'IDDonante';
    protected $allowedFields = ['IDUsuario', 'Tipo', 'Nombre', 'Direccion', 'Ciudad', 'NumeroTelefono', 'CorreoElectronico', 'SitioWeb', 'OtrosDetalles'];
}
