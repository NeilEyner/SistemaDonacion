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
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->getUsuarios();
        return view('Admin/admin_usuarios', $data);
    }

    public function donaciones()
    {
        $donacionModel = new DonacionModel();
        $data ['donacionesPendientes'] =$donacionModel->getDonacionPendiente();
        $data ['donacionesEntregadas'] =$donacionModel->getDonacionEntregada();
        $data ['donacionesCanceladas'] =$donacionModel->getDonacionCancelada();
        return view('Admin/admin_donaciones', $data);
    }

    public function solicitudes()
    {
        $solicitudModel =new SolicitudModel();
        $data['solicitudes' ] = $solicitudModel->getSolicitud();
        return view('Admin/admin_solicitudes', $data);
    }

    public function postulaciones()
    {
        $postulacionesModel = new PostulacionModel();
        $data['postulaciones'] = $postulacionesModel->getPostulacionesPendientes();
        $data['postulacionesAceptada'] = $postulacionesModel->getPostulacionesAceptada();
        $data['postulacionesRechazada'] = $postulacionesModel->getPostulacionesRechazada();

        return view('Admin/admin_postulaciones', $data);
    }

}
