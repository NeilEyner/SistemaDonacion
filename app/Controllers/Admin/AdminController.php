<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;
use App\Models\Donante\DonacionModel;
use App\Models\Receptor\SolicitudModel;


use App\Models\Voluntario\PostulacionModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        // Obtener datos estadísticos para el panel de administración
        $usuariosCount = model(UsuarioModel::class)->countAllResults();
        $donacionesCount = model(DonacionModel::class)->countAllResults();
        $solicitudesCount = model(SolicitudModel::class)->countAllResults();
        $postulacionesCount = model(PostulacionModel::class)->countAllResults();
        
        $usuarioModel = new UsuarioModel();
        $totalUsuarios = $usuarioModel->countAll(); // Obtener el total de usuarios registrados

        $donacionModel = new DonacionModel();
        $donacionesPendientes = $donacionModel->where('estado', 'pendiente')->countAllResults(); // Obtener el total de donaciones pendientes

        $data = [
            'usuariosCount' => $usuariosCount,
            'donacionesCount' => $donacionesCount,
            'solicitudesCount' => $solicitudesCount,
            'postulacionesCount' => $postulacionesCount,
            'totalUsuarios' => $totalUsuarios,
            'donacionesPendientes' => $donacionesPendientes,
        ];

        return view('Admin/admin_dashboard', $data);
    }

    public function usuarios()
    {
        $usuarioModel = model(UsuarioModel::class);
        $usuarios = $usuarioModel->findAll();

        $data = [
            'usuarios' => $usuarios,
        ];

        return view('Admin/admin_usuarios', $data);
    }

    public function donaciones()
    {
        $donacionModel = model(DonacionModel::class);
        $donaciones = $donacionModel->getDonacionesConDetalles();

        $data = [
            'donaciones' => $donaciones,
        ];

        return view('Admin/admin_donaciones', $data);
    }

    public function solicitudes()
    {
        $solicitudModel = model(SolicitudModel::class);
        $solicitudes = $solicitudModel->getSolicitudesConDetalles();

        $data = [
            'solicitudes' => $solicitudes,
        ];

        return view('Admin/admin_solicitudes', $data);
    }

    public function postulaciones()
    {
        $postulacionModel = model(PostulacionModel::class);
        $postulaciones = $postulacionModel->getPostulacionesConDetalles();

        $data = [
            'postulaciones' => $postulaciones,
        ];

        return view('Admin/admin_postulaciones', $data);
    }
    // Otros métodos para gestionar usuarios, donaciones, solicitudes, etc.
}
