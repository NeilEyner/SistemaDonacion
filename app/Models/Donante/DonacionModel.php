<?php

namespace App\Models\Donante;

use CodeIgniter\Model;

class DonacionModel extends Model
{
    protected $table = 'Donacion';
    protected $primaryKey = 'IDDonacion';
    protected $allowedFields = ['IDDonante', 'FechaDonacion', 'Estado', 'TipoDeDonacion', 'IDSolicitud', 'ImagenDonacion', 'EstadoDonacion'];

    public function getDonacion()
    {
        return $this->findAll();
    }

    public function getDonacionCancelada()
    {
        
        return $this->where('EstadoDonacion', 'Cancelada')->findAll();
    }
    public function getDonacionPendiente()
    {
        
        return $this->where('EstadoDonacion', 'Pendiente')->findAll();
    }

    public function getDonacionEntregada()
    {
        
        return $this->where('EstadoDonacion', 'Entregada')->findAll();
    }
}
