<?php

namespace App\Models\Donante;

use CodeIgniter\Model;

class DonacionModel extends Model
{
    protected $table = 'Donacion';
    protected $primaryKey = 'IDDonacion';
    protected $allowedFields = ['IDDonante', 'FechaDonacion', 'Estado', 'TipoDeDonacion', 'IDSolicitud', 'ImagenDonacion', 'EstadoDonacion'];
}
