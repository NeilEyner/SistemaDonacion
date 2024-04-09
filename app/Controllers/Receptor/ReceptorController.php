<?php

namespace App\Controllers\Receptor;
use App\Models\Donante\DonacionModel;
use App\Models\MensajeModel;
use App\Models\Receptor\SolicitudModel;
use App\Models\Receptor\ReceptorModel;
use App\Controllers\BaseController;
use App\Models\Donante\DonanteModel;

class ReceptorController extends BaseController
{
    public function dashboard(){

        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        $IDrec = $userRec['IDReceptor'];

        $data['receptor']= $userRec;
        $solicitudModel = new SolicitudModel();
        $data['solicitudes'] = $solicitudModel -> getSolicitud();

        $messageModel = new MensajeModel();
        $receptorModel = new ReceptorModel();
        $receptor = $receptorModel->find($IDrec); 

        $solicitudModel = new SolicitudModel();
        $solicitudes = $solicitudModel->where('IDReceptor', $IDrec)->findAll(); 
        $messages = $messageModel->where('Remitente', $sesionID)->orWhere('Destinatario', $sesionID)->findAll();

        // Pasamos los datos a la vista
        $data = [
            'receptor' => $receptor,
            'solicitudes' => $solicitudes,
            'messages' => $messages
        ];
        return view('Receptor/receptor_dashboard',$data);
    }
    public function recDonaciones(){

        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        $IDrec = $userRec['IDReceptor'];
        
        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudAceptada();

        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);
        return view('Receptor/receptor_donaciones',$data);
    }
    public function recSolicitudes(){

        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        $IDrec = $userRec['IDReceptor'];
        
        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudAceptada();

        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);

        return view('Receptor/receptor_solicitudes',$data);
    }

    public function recMensajes(){
        $sesionID = session()->get('loggedUser.userId');
        $mensajeE = new MensajeModel();
        $mensaje = new MensajeModel();

        $data['mensajesenviados'] = $mensaje->where('Remitente', $sesionID)->findAll();
        $data['mensajesrecibidos'] = $mensajeE->where('Destinatario', $sesionID)->findAll();

        return view('Receptor/receptor_mensajes', $data);

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


        return view('Receptor/receptor_perfil');
    }

}
