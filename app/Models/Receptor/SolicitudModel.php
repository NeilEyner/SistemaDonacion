<?php

namespace App\Models\Receptor;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table = 'SolicitudDeDonacion'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'IDSolicitud'; // Nombre de la clave primaria de la tabla
    protected $allowedFields = ['IDReceptor', 'FechaSolicitud', 'EstadoSolicitud', 'Cantidad', 'DescripcionNecesidad', 'Prioridad', 'FechaLimiteEntrega', 'InstruccionesEntrega', 'ConfirmacionRecepcion']; // Campos permitidos para inserción y actualización

    protected $useTimestamps = false; // Desactiva la inserción automática de timestamps (created_at, updated_at)


    public function getSolicitud(){
        return $this->findAll();
    }
    public function getSolicitudID($id)
    {
        return $this->where('IDReceptor', $id)->findAll();
    }
    public function getSolicitudAceptada()
    {
        return $this->where('EstadoSolicitud', 'Aceptada')->findAll();
    }public function getSolicitudAceptadaNorecp()
    {
        return $this->where('EstadoSolicitud', 'Aceptada')->where('ConfirmacionRecepcion', 0)->findAll();
    }
    public function getSolicitudAceptadaID($id)
    {
        return $this->where('EstadoSolicitud', 'Aceptada')->where('IDReceptor', $id)->findAll();
    }

    public function getSolicitudRechazada()
    {
        return $this->where('EstadoSolicitud', 'Rechazada')->findAll();
    }
    public function getSolicitudPendiente()
    {
        return $this->where('EstadoSolicitud', 'Pendiente')->findAll();
    }
    public function getDonacionesPorReceptor($IDReceptor)
    {
        return $this->hasMany('DonacionModel', 'IDSolicitud')
                    ->where('IDReceptor', $IDReceptor)
                    ->findAll();
    }
}
