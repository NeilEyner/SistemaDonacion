<?php

namespace App\Models\Voluntario;

use CodeIgniter\Model;

class PostulacionModel extends Model
{
    protected $table = 'Postulaciones';
    protected $primaryKey = 'IDPostulacion';
    protected $allowedFields = ['IDVoluntario', 'TipoOperacion', 'IDSolicitud', 'FechaPostulacion', 'EstadoPostulacion'];

    public function getPostulacionPorIdVol($id)
    {
        return $this->where('IDVoluntario', $id)->findAll();
    }
    public function getPostulaciones()
    {
        // Consulta las postulaciones de la base de datos
        return $this->findAll();
    }
    public function getPostulacionesPendientes()
    {
        // Consulta las postulaciones pendientes de la base de datos
        return $this->where('EstadoPostulacion', 'Pendiente')->findAll();
    }
    public function getPostulacionesAceptada()
    {
        // Consulta las postulaciones pendientes de la base de datos
        return $this->where('EstadoPostulacion', 'Aceptada')->findAll();
    }

    public function getPostulacionesRechazada()
    {
        // Consulta las postulaciones pendientes de la base de datos
        return $this->where('EstadoPostulacion', 'Rechazada')->findAll();
    }
}
