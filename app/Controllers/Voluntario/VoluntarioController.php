<?php

namespace App\Controllers\Voluntario;

use App\Controllers\BaseController;

use App\Models\Receptor\SolicitudModel;
use App\Models\Voluntario\ParticipacionModel;
use App\Models\Voluntario\VoluntarioModel;
use App\Models\Voluntario\PostulacionModel;
use App\Models\MensajeModel;
use App\Models\Receptor\ReceptorModel;

class VoluntarioController extends BaseController
{
    public function dashboard()
    {
        $sesionID = session()->get('loggedUser.userId');
        
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel
            ->where('EstadoSolicitud', 'Aceptada')
            ->findAll();

        $participacionModel = new ParticipacionModel();
        $data['ultimas_participaciones'] = $participacionModel
            ->where('IDVoluntario', $IDvol)
            ->orderBy('FechaHora', 'DESC')->findAll();

        return view('Voluntario/voluntario_dashboard', $data);
    }

    public function voluntario_postulacion()
    {
        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $postulacionesModel = new PostulacionModel();
        $data['postulaciones'] = $postulacionesModel->getPostulacionPorIdVol($IDvol);

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel
            ->where('EstadoSolicitud', 'Aceptada')
            ->findAll();
        $postulacionesModel = new PostulacionModel();
        $data['postulaciones'] = $postulacionesModel->getPostulacionPorIdVol($IDvol);

        return view('Voluntario/voluntario_postulaciones', $data);
    }

    public function postular_recojo($id)
    {

        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $postulacionModel = new PostulacionModel();
        $nuevaPostulacion = [
            'IDVoluntario' => $IDvol,
            'TipoOperacion' => 'Recojo',
            'IDSolicitud' => $id,
            'FechaPostulacion' => date('Y-m-d H:i:s'),
            'EstadoPostulacion' => 'Pendiente'
        ];
        $postulacionModel->insert($nuevaPostulacion);
        return redirect()->to('Voluntario/voluntario_postulaciones');
    }
    public function postular_entrega($id)
    {
        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $postulacionModel = new PostulacionModel();
        $nuevaPostulacion = [
            'IDVoluntario' => $IDvol,
            'TipoOperacion' => 'Entrega',
            'IDSolicitud' => $id,
            'FechaPostulacion' => date('Y-m-d H:i:s'),
            'EstadoPostulacion' => 'Pendiente'
        ];
        $postulacionModel->insert($nuevaPostulacion);
        return redirect()->to('Voluntario/voluntario_postulaciones');
    }

    public function mandar_mensaje($idPostulacion)
    {

        $idRemitente = session()->get('loggedUser.userId');

        $postulacionModel = new PostulacionModel();
        $postulacion = $postulacionModel->find($idPostulacion);

        if (!$postulacion) {
            return redirect()->to('Voluntario/voluntario_postulaciones');
        }
        $solicitudModel = new SolicitudModel();
        $solicitud = $solicitudModel->find($postulacion['IDSolicitud']);

        if (!$solicitud) {
            return redirect()->to('Voluntario/voluntario_postulaciones');
        }

        $receptorModel = new ReceptorModel();
        $recep = $receptorModel->find($solicitud['IDReceptor']);

        $idDestinatario = $recep['IDUsuario'];

        $asunto = $this->request->getPost('asunto');
        $contenido = $this->request->getPost('mensaje');
        $mensajeModel = new MensajeModel();
        $mensaje = [
            'Remitente' => $idRemitente,
            'Destinatario' => $idDestinatario,
            'Asunto' => $asunto,
            'Contenido' => $contenido,
            'FechaHoraEnvio' => date('Y-m-d H:i:s')
        ];
        $mensajeModel->insert($mensaje);
        return redirect()->to('Voluntario/voluntario_postulaciones');
    }

    public function voluntario_mensajes()
    {
        $sesionID = session()->get('loggedUser.userId');
        $mensajeE = new MensajeModel();
        $mensaje = new MensajeModel();

        $data['mensajesenviados'] = $mensaje->where('Remitente', $sesionID)->findAll();
        $data['mensajesrecibidos'] = $mensajeE->where('Destinatario', $sesionID)->findAll();

        return view('Voluntario/voluntario_mensajes', $data);
    }
    public function responder_mensajes()
    {
        $sesionID = session()->get('loggedUser.userId');
        $asunto = $this->request->getPost('asunto');
        $contenido = $this->request->getPost('mensaje');
        $idDestinatario = $this->request->getPost('destino');

        $mensajeModel = new MensajeModel();
        $mensaje = [
            'Remitente' => $sesionID,
            'Destinatario' => $idDestinatario,
            'Asunto' => $asunto,
            'Contenido' => $contenido,
            'FechaHoraEnvio' => date('Y-m-d H:i:s')
        ];
        $mensajeModel->insert($mensaje);

        return redirect()->to('Voluntario/voluntario_mensajes');
    }
    public function recResMensajes($id){
        $sesionID = session()->get('loggedUser.userId');
        
        $asunto = $this->request->getPost('asunto');
        $contenido = $this->request->getPost('mensaje');
        $idDestinatario = $this->request->getPost('destino');

        $mensajeModel = new MensajeModel();
        $mensaje = [
            'Remitente' => $sesionID,
            'Destinatario' => $id,
            'Asunto' => $asunto,
            'Contenido' => $contenido,
            'FechaHoraEnvio' => date('Y-m-d H:i:s')
        ];
        $mensajeModel->insert($mensaje);

        return redirect()->to('Receptor/receptor_mensajes');
    }
}
        // echo '<pre>';
        // var_dump($sesionID);
        // var_dump($userVol);
        // var_dump($IDvol);
        // echo '</pre>';
        //exit();