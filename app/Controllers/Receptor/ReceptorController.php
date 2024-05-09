<?php

namespace App\Controllers\Receptor;

use App\Models\Donante\DonacionModel;
use App\Models\MensajeModel;
use App\Models\Receptor\SolicitudModel;
use App\Models\Receptor\ReceptorModel;
use App\Controllers\BaseController;
use App\Models\Donante\DonanteModel;
use App\Models\Donante\AlimentoModel;
use App\Models\Donante\ProductoModel;

class ReceptorController extends BaseController
{
    public function dashboard()
    {

        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        $IDrec = $userRec['IDReceptor'];

        $data['receptor'] = $userRec;
        $solicitudModel = new SolicitudModel();
        $data['solicitudes'] = $solicitudModel->getSolicitud();

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
        return view('Receptor/receptor_dashboard', $data);
    }public function recDonaciones()
    {
        // Obtener el ID del receptor de la sesión
        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        $IDreceptor = $userRec['IDReceptor'];
        
        $productos = new ProductoModel();
        $data['productos'] = $productos->findAll();

        $alimentos = new AlimentoModel();
        $data['alimentos'] = $alimentos->findAll();
        // Realizar una consulta SQL para obtener las donaciones asociadas a las solicitudes del receptor
        $db = db_connect();
        $query = $db->query("SELECT d.* 
                             FROM Donacion d
                             INNER JOIN SolicitudDeDonacion s ON d.IDSolicitud = s.IDSolicitud
                             WHERE s.IDReceptor = $IDreceptor");
    
        // Obtener los resultados de la consulta como un array de arrays asociativos
        $donaciones_respuesta_solicitudes = $query->getResultArray();
    
        // Pasar los datos a la vista
        $data['donaciones'] = $donaciones_respuesta_solicitudes;
    
        return view('Receptor/receptor_donaciones', $data);
    }
    
    public function recSolicitudes()
    {

        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        $IDrec = $userRec['IDReceptor'];

        // $donan = new DonanteModel();
        // $userDon = $donan->where('IDusuario', $sesionID)->first();
        // $IDdon = $userDon['IDDonante'];


        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudID($IDrec);
        // $donacionModel = new DonacionModel();
        // $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);

        return view('Receptor/receptor_solicitudes', $data);
    }

    public function formSolicitud()
    {

        return view('Forms/_form_solicitud');
    }
    public function guardar_solicitud()
    {
        $sesionID = session()->get('loggedUser.userId');
        $reco = new ReceptorModel();
        $userRec = $reco->where('IDusuario', $sesionID)->first();
        // Obtener datos del formulario
        $IDReceptor = $userRec['IDReceptor'];
        $FechaSolicitud = date('Y-m-d');
        $EstadoSolicitud = 'Pendiente';
        $Cantidad = $this->request->getPost('Cantidad');
        $DescripcionNecesidad = $this->request->getPost('DescripcionNecesidad');
        $Prioridad = $this->request->getPost('Prioridad');
        $FechaLimiteEntrega = $this->request->getPost('FechaLimiteEntrega');
        $InstruccionesEntrega = $this->request->getPost('InstruccionesEntrega');
        $ConfirmacionRecepcion = 0;

        // Crear una nueva instancia del modelo SolicitudDeDonacion
        $solicitud = new SolicitudModel();

        // Asignar los datos del formulario al modelo
        $data = [
            'IDReceptor' =>  $IDReceptor,
            'FechaSolicitud' => $FechaSolicitud,
            'EstadoSolicitud' =>  $EstadoSolicitud,
            'Cantidad' => $Cantidad,
            'DescripcionNecesidad' => $DescripcionNecesidad,
            'Prioridad' => $Prioridad,
            'FechaLimiteEntrega' => $FechaLimiteEntrega,
            'InstruccionesEntrega' => $InstruccionesEntrega,
            'ConfirmacionRecepcion' => $ConfirmacionRecepcion,
        ];


        // Guardar la solicitud de donación en la base de datos
        if ($solicitud->insert($data)) {
            // Si la solicitud se guarda correctamente, redireccionar a una página de éxito
            return redirect()->to('Receptor/receptor_solicitudes');
        } else {
            // Si hay un error al guardar, mostrar un mensaje de error o redireccionar a una página de error
            return redirect()->back()->with('error', 'Error al guardar la solicitud de donación.');
        }
    }



    public function recMensajes()
    {
        $sesionID = session()->get('loggedUser.userId');
        $mensajeE = new MensajeModel();
        $mensaje = new MensajeModel();

        $data['mensajesenviados'] = $mensaje->where('Remitente', $sesionID)->findAll();
        $data['mensajesrecibidos'] = $mensajeE->where('Destinatario', $sesionID)->findAll();

        return view('Receptor/receptor_mensajes', $data);
    }
    public function recResMensajes($id)
    {
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

    public function recPerfil()
    {


        return view('Receptor/receptor_perfil');
    }
}
