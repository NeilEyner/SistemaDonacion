<?php

namespace App\Controllers\Voluntario;

use App\Controllers\BaseController;

use App\Models\Receptor\SolicitudModel;
use App\Models\Voluntario\ParticipacionModel;
use App\Models\Voluntario\VoluntarioModel;

class VoluntarioController extends BaseController
{
    public function dashboard()
    {
        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_pendientes'] = $solicitudModel
            ->where('EstadoSolicitud', 'Pendiente')
            ->findAll();

        $participacionModel = new ParticipacionModel();
        $data['ultimas_participaciones'] = $participacionModel
            ->where('IDVoluntario', $IDvol)
            ->orderBy('FechaHora', 'DESC')->findAll();

        return view('Voluntario/voluntario_dashboard', $data);
    }
}
        // echo '<pre>';
        // var_dump($sesionID);
        // var_dump($userVol);
        // var_dump($IDvol);
        // echo '</pre>';
        //exit();