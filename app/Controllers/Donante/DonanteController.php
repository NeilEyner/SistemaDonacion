<?php

namespace App\Controllers\Donante;
use App\Models\Donante\DonacionModel;
use App\Models\MensajeModel;
use App\Models\Receptor\SolicitudModel;
use App\Controllers\BaseController;
use App\Models\Donante\DonanteModel;

class DonanteController extends BaseController
{
    public function dashboard(){

        $sesionID = session()->get('loggedUser.userId');
        
        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $donationModel = new DonacionModel();
        $messageModel = new MensajeModel();
        // Obtenemos los datos necesarios de la base de datos utilizando los modelos
        $donationsPending = $donationModel->getDonacionPendienteId($IDdon );
        $donationsSummary = $donationModel->getSumaDonacion($IDdon );
        $donationHistory = $donationModel->getDonacionHistorial($IDdon );
        $messages = $messageModel->where('Remitente', $sesionID)->orWhere('Destinatario', $sesionID)->findAll();

        // Pasamos los datos a la vista
        $data = [
            'donationsPending' => $donationsPending,
            'donationsSummary' => $donationsSummary,
            'donationHistory' => $donationHistory,
            'messages' => $messages
        ];
        return view('Donante/donante_dashboard',$data);
    }
    public function donDonaciones(){

        $sesionID = session()->get('loggedUser.userId');
        
        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudAceptada();

        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);
        return view('Donante/donante_donaciones',$data);
    }
    public function donSolicitudes(){

        $sesionID = session()->get('loggedUser.userId');
        
        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudAceptada();

        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);

        return view('Donante/donante_solicitudes',$data);
    }

    public function donMensajes(){
        $sesionID = session()->get('loggedUser.userId');
        $mensajeE = new MensajeModel();
        $mensaje = new MensajeModel();

        $data['mensajesenviados'] = $mensaje->where('Remitente', $sesionID)->findAll();
        $data['mensajesrecibidos'] = $mensajeE->where('Destinatario', $sesionID)->findAll();

        return view('Donante/donante_mensajes', $data);

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
    public function donPerfil(){


        return view('Donante/donante_perfil');
    }

}
