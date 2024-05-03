<?php

namespace App\Controllers\Voluntario;

use App\Controllers\BaseController;

use App\Models\Receptor\SolicitudModel;
use App\Models\Donante\DonacionModel;
use App\Models\Donante\AlimentoModel;
use App\Models\Donante\ProductoModel;
use App\Models\Voluntario\ParticipacionModel;
use App\Models\Voluntario\VoluntarioModel;
use App\Models\Voluntario\PostulacionModel;
use App\Models\MensajeModel;
use App\Models\EntregaDonacionModel;
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

        $donaciones = new DonacionModel();
        $data['donaciones'] = $donaciones->findAll();

        $participacion = new ParticipacionModel();
        $data['participaciones'] = $participacion->where('IDVoluntario', $IDvol)->findAll();

        return view('Voluntario/voluntario_postulaciones', $data);
    }
    public function postularResponsable($IDSolicitud)
    {
        // Aquí iría la lógica para manejar la postulación como responsable
        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $donacionModel = new DonacionModel(); // Asegúrate de cargar el modelo de Donacion
        $donacion = $donacionModel->where('IDSolicitud', $IDSolicitud)->first();
        $IDDonacion = $donacion['IDDonacion'];

        // Recuperar los datos del formulario
        $tipoOperacion = $this->request->getPost('tipo_operacion');
        $cantidadColaboradores = $this->request->getPost('cantidad_colaboradores');
        $fechaHoraRecojo = $this->request->getPost('fecha_hora_recojo');
        $ubicacionRecojo = $this->request->getPost('ubicacion_recojo');
        $personaContacto = $this->request->getPost('persona_contacto');
        $telefonoContacto = $this->request->getPost('telefono_contacto');

        // Validar los datos si es necesario

        // Guardar los datos en la base de datos
        $participacionModel = new ParticipacionModel();
        $participacionModel->insert([
            'IDVoluntario' => $IDvol,
            'IDDonacion' => $IDDonacion,
            'TipoOperacion' => $tipoOperacion,
            'FechaHora' => $fechaHoraRecojo,
            'CantidadColaboradores' => $cantidadColaboradores,
            'ConformidadEntrega' => 'Pendiente',
            'UbicacionRecojo' => $ubicacionRecojo,
            'PersonaContacto' => $personaContacto,
            'TelefonoContacto' => $telefonoContacto,
        ]);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->to(base_url('Voluntario/voluntario_postulaciones'));
    }
    public function voluntario_coordinacion()
    {
        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];

        $data['Vol'] = $userVol;

        $postulacionesModel = new PostulacionModel();
        $data['postulaciones'] = $postulacionesModel->where('EstadoPostulacion', 'Aceptada')->where('IDvoluntario', $IDvol)->findAll();
        $postulacionesModel = new PostulacionModel();
        $data['postulacioness'] = $postulacionesModel->findAll();

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel
            ->where('EstadoSolicitud', 'Aceptada')
            ->findAll();

        $donaciones = new DonacionModel();
        $data['donaciones'] = $donaciones->findAll();

        $productos = new ProductoModel();
        $data['productos'] = $productos->findAll();

        $alimentos = new AlimentoModel();
        $data['alimentos'] = $alimentos->findAll();

        $participacion = new ParticipacionModel();
        $data['participaciones'] = $participacion->where('IDVoluntario', $IDvol)->where('EstadoParticipacion', 'Aceptada')->findAll();

        return view('Voluntario/voluntario_coordinacion', $data);
    }
    public function mandar_coor_mensaje($idPostulacion)
    {

        $idRemitente = session()->get('loggedUser.userId');

        $postulacionModel = new PostulacionModel();
        $postulacion = $postulacionModel->find($idPostulacion);

        if (!$postulacion) {
            return redirect()->to('Voluntario/voluntario_postulaciones');
        }

        $receptorModel = new VoluntarioModel();
        $recep = $receptorModel->find($postulacion['IDVoluntario']);

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
        return redirect()->to('Voluntario/voluntario_mensajes');
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

    public function aceptar_postulacion($id)
    {
        $postulacionModel = new ParticipacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoParticipacion' => 'Aceptada']);
        return redirect()->to('Voluntario/voluntario_coordinacion');
    }
    public function rechazar_postulacion($id)
    {
        $postulacionModel = new ParticipacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoParticipacion' => 'Rechazada']);
        return redirect()->to('Voluntario/voluntario_coordinacion');
    }

    public function confirmar_entrega($idParticipacion)
    {
        // Crear una instancia del modelo de ParticipacionVoluntario
        $participacionModel = new ParticipacionModel();
    
        // Obtener la información de la participación basada en el $idParticipacion
        $participacion = $participacionModel->find($idParticipacion);
    
        // Verificar si se encontró la participación
        if (!$participacion) {
            // Manejar el caso de participación no encontrada
            // Puedes lanzar una excepción, mostrar un mensaje de error, etc.
            // Aquí retornarías algo adecuado para tu aplicación
            // Por ejemplo:
            return "La participación con ID $idParticipacion no fue encontrada.";
        }
    
        // Obtener el ID de la donación desde la participación
        $idDonacion = $participacion['IDDonacion'];
    
        // Crear una instancia del modelo de Donacion
        $donacionModel = new DonacionModel();
    
        // Obtener la información de la donación basada en el ID de donación
        $donacion = $donacionModel->find($idDonacion);
    
        // Verificar si se encontró la donación
        if (!$donacion) {
            // Manejar el caso de donación no encontrada
            // Aquí retornarías algo adecuado para tu aplicación
            // Por ejemplo:
            return "La donación asociada con la participación no fue encontrada.";
        }
    
        // Obtener el ID de la solicitud desde la donación
        $idSolicitud = $donacion['IDSolicitud'];
    
        // Crear una instancia del modelo de EntregaDeDonacion
        $entregaModel = new EntregaDonacionModel();
    
        // Guardar los datos de la entrega en la base de datos
        $datosEntrega = [
            'IDDonacion' => $idDonacion,
            'IDSolicitud' => $idSolicitud,
            'FechaHoraEntrega' => $this->request->getPost('fechaHoraEntrega'),
            'ConformidadEntrega' => $this->request->getPost('conformidadEntrega'),
            'Observaciones' => $this->request->getPost('observaciones')
        ];
    
        // Insertar los datos de la entrega en la base de datos
        $entregaModel->insert($datosEntrega);
    
        // Actualizar el estado de la donación a "Entregada" en la tabla SolicitudDeDonacion
        $solicitudModel = new SolicitudModel();
        $solicitudModel->update($idSolicitud, ['ConfirmacionRecepcion' => true]);
    
        // Redirigir a la página de coordinación de voluntarios
        return redirect()->to('Voluntario/voluntario_coordinacion');
    }
    
    public function confirmar_recojo($idParticipacion)
    {
        // Instanciar el modelo de ParticipacionVoluntario
        $participacionModel = new ParticipacionModel();

        // Realizar la actualización de la conformidad del recojo
        $participacionModel->update($idParticipacion, ['ConformidadRecojo' => 'Satisfactoria']);

        // Redirigir a la página de coordinación de voluntarios
        return redirect()->to('Voluntario/voluntario_coordinacion');
    }
    public function mostrar_participaciones()
    {
        $sesionID = session()->get('loggedUser.userId');
        $voluntario = new VoluntarioModel();
        $userVol = $voluntario->where('IDusuario', $sesionID)->first();
        $IDvol = $userVol['IDVoluntario'];
        $participacionModel = new ParticipacionModel();
        $data['participaciones'] = $participacionModel->where('IDVoluntario',$IDvol )->findAll(); // Obtener todas las participaciones

        // Cargar la vista y pasar los datos
        return view('Voluntario/voluntario_participacion', $data);
    }

    
}
        // echo '<pre>';
        // var_dump($sesionID);
        // var_dump($userVol);
        // var_dump($IDvol);
        // echo '</pre>';
        //exit();