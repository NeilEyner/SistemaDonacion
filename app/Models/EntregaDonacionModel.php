<?php

namespace App\Models;

use CodeIgniter\Model;

class EntregaDonacionModel extends Model
{
    protected $table = 'EntregaDeDonacion';
    protected $primaryKey = 'IDEntrega';
    protected $allowedFields = ['IDDonacion', 'IDSolicitud', 'FechaHoraEntrega', 'ConformidadEntrega', 'Observaciones'];

    public function obtenerEntregas()
    {
        return $this->findAll();
    }

    public function obtenerEntrega($id)
    {
        return $this->find($id);
    }

    public function crearEntrega($datos)
    {
        return $this->insert($datos);
    }

    public function actualizarEntrega($id, $datos)
    {
        return $this->update($id, $datos);
    }

    public function eliminarEntrega($id)
    {
        return $this->delete($id);
    }
}
