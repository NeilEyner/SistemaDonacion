<?php

namespace App\Controllers\Donante;

use App\Models\Donante\DonacionModel;
use App\Models\MensajeModel;
use App\Models\Receptor\SolicitudModel;
use App\Controllers\BaseController;
use App\Models\Donante\DonanteModel;
use App\Models\Donante\ProductoModel;
use App\Models\Donante\AlimentoModel;

class DonanteController extends BaseController
{
    public function dashboard()
    {

        $sesionID = session()->get('loggedUser.userId');

        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $donationModel = new DonacionModel();
        $messageModel = new MensajeModel();
        // Obtenemos los datos necesarios de la base de datos utilizando los modelos
        $donationsPending = $donationModel->getDonacionPendienteId($IDdon);
        $donationsSummary = $donationModel->getSumaDonacion($IDdon);
        $donationHistory = $donationModel->getDonacionHistorial($IDdon);
        $messages = $messageModel->where('Remitente', $sesionID)->orWhere('Destinatario', $sesionID)->findAll();

        // Pasamos los datos a la vista
        $data = [
            'donationsPending' => $donationsPending,
            'donationsSummary' => $donationsSummary,
            'donationHistory' => $donationHistory,
            'messages' => $messages
        ];
        return view('Donante/donante_dashboard', $data);
    }
    public function donDonaciones()
    {

        $sesionID = session()->get('loggedUser.userId');

        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudAceptada();

        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);
        return view('Donante/donante_donaciones', $data);
    }
    public function donSolicitudes()
    {

        $sesionID = session()->get('loggedUser.userId');

        $donan = new DonanteModel();
        $userDon = $donan->where('IDusuario', $sesionID)->first();
        $IDdon = $userDon['IDDonante'];

        $solicitudModel = new SolicitudModel();
        $data['solicitudes_aceptada'] = $solicitudModel->getSolicitudAceptada();

        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacionHistorial($IDdon);

        return view('Donante/donante_solicitudes', $data);
    }

    public function donMensajes()
    {
        $sesionID = session()->get('loggedUser.userId');
        $mensajeE = new MensajeModel();
        $mensaje = new MensajeModel();

        $data['mensajesenviados'] = $mensaje->where('Remitente', $sesionID)->findAll();
        $data['mensajesrecibidos'] = $mensajeE->where('Destinatario', $sesionID)->findAll();

        return view('Donante/donante_mensajes', $data);
    }

    public function donResMensajes($id)
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
    public function donPerfil()
    {


        return view('Donante/donante_perfil');
    }
    public function donarSol($id)
    {
        $sesionID = session()->get('loggedUser.userId');
        $donanteModel = new DonanteModel();
        $donante = $donanteModel->where('IDusuario', $sesionID)->first();
        $IDdonante = $donante['IDDonante'];
        $solicitudModel = new SolicitudModel();
        $solicitud = $solicitudModel->where('IDSolicitud', $id)->first();
        // var_dump($solicitud);
        // die();

        $donacionModel = new DonacionModel();
        $donacionId = $donacionModel->insert([
            'IDDonante' => $IDdonante,
            'Estado' => 'Pendiente',
            'IDSolicitud' => $id,
            'EstadoDonacion' => 'Pendiente'
        ]);
        $data['solicitud'] = $solicitud;
        $data['donacionId'] = $donacionId;

        return view('Forms/_form_donacion', $data);
    }
    public function addDon($id)
    {
        $sesionID = session()->get('loggedUser.userId');

        // Obtener el ID del donante
        $donanteModel = new DonanteModel();
        $donante = $donanteModel->where('IDusuario', $sesionID)->first();
        $IDdonante = $donante['IDDonante'];

        // var_dump($solicitud);
        // die();

        // $fechaDonacion = $this->request->getPost('fecha_donacion'); // Asumo que ya tienes esta línea definida
        $estado = 'Pendiente';
        $tipoDonacion = $this->request->getPost('tipo_donacion');
        $idSolicitud = $id;
        $imagenDonacion = $this->request->getFile('imagen_donacion');
        $estadoDonacion = 'Pendiente';

        // Modificación para redirigir la imagen a public/assets/donaciones
        $rutaImagen = null;
        if ($imagenDonacion && $imagenDonacion->isValid() && !$imagenDonacion->hasMoved()) {
            // Intentar mover el archivo
            if ($imagenDonacion->move(APPPATH . 'assets/donaciones')) {
                // El archivo se movió correctamente
                $rutaImagen = 'public/assets/donaciones/' . $imagenDonacion->getName();
            } else {
                // Hubo un error al mover el archivo
                $errors = $imagenDonacion->getErrorString();
                // Manejar el error aquí, por ejemplo, registrar el error o mostrar un mensaje al usuario
            }
        }
        
        $donacionModel = new DonacionModel();
        $donacion = [
            'IDDonante' => $IDdonante,
            // 'FechaDonacion' => $fechaDonacion,
            'Estado' => $estado,
            'TipoDeDonacion' => $tipoDonacion,
            'IDSolicitud' => $idSolicitud,
            'ImagenDonacion' => $rutaImagen,
            'EstadoDonacion' => $estadoDonacion
        ];

        $donacionModel -> update($id, $donacion);
        // Obtener los detalles de la solicitud
        $solicitudModel = new SolicitudModel();
        $solicitud = $solicitudModel->where('IDSolicitud', $id)->first();
        $data['solicitud'] = $solicitud;
        $data['donacionId'] = $IDdonante;

        return view('Forms/_form_agregar', $data);
    }
    public function addproal ($idDon){

        $sesionID = session()->get('loggedUser.userId');
        $donanteModel = new DonanteModel();
        $donante = $donanteModel->where('IDusuario', $sesionID)->first();
        $IDdonante = $donante['IDDonante'];

        $donacionModel = new DonacionModel();
        $data['donacion'] = $donacionModel -> where('IDDonacion', $idDon)->first();
        $solicitud = new SolicitudModel();
        $data['solicitud'] = $solicitud -> where('IDSolicitud', $data['donacion']['IDSolicitud'])->first();
        $alimentoModel = new AlimentoModel();
        $data['alimentos'] = $alimentoModel -> where('IDDonacion', $idDon)->findAll();
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel -> where('IDDonacion', $idDon)->findAll();
        return view('Forms/_form_agregar', $data);
    }
    public function addAlimento($idDon)
    {
        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre_alimento');
        $tipo = $this->request->getPost('tipo_alimento');
        $cantidad = $this->request->getPost('cantidad_alimento');
        $fechaVencimiento = $this->request->getPost('fecha_vencimiento');
        $detalles = $this->request->getPost('detalles');
        $temperaturaAlmacenamiento = $this->request->getPost('temperatura_almacenamiento');
        $estadoCalidad = $this->request->getPost('estado_calidad');

        // Guardar el alimento en la base de datos
        $alimentoModel = new AlimentoModel();
        $alimentoModel->insert([
            'IDDonacion'=>$idDon,
            'Nombre' => $nombre,
            'Tipo' => $tipo,
            'Cantidad' => $cantidad,
            'FechaVencimiento' => $fechaVencimiento,
            'Detalles' => $detalles,
            'TemperaturaAlmacenamiento' => $temperaturaAlmacenamiento,
            'EstadoCalidad' => $estadoCalidad
        ]);

        // Redirigir a la página de confirmación u otra página
        return redirect()->back();
    }

    public function addProducto($idDon)
    {
        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre_producto_modal');
        $marca = $this->request->getPost('marca_producto_modal');
        $cantidad = $this->request->getPost('cantidad_producto_modal');
        $descripcion = $this->request->getPost('descripcion_producto_modal');

        // Guardar el producto en la base de datos
        $productoModel = new ProductoModel();
        $productoModel->insert([
            'IDDonacion'=>$idDon,
            'Nombre' => $nombre,
            'Marca' => $marca,
            'Cantidad' => $cantidad,
            'Descripcion' => $descripcion
        ]);

        // Redirigir a la página de confirmación u otra página
        return redirect()->back();
    }

       public function guardarDonacion()
    {
        // Obtener los datos del formulario
        $fechaDonacion = $this->request->getPost('fecha_donacion');
        $estado = $this->request->getPost('estado');
        $tipoDonacion = $this->request->getPost('tipo_donacion');
        $idSolicitud = $this->request->getPost('idsolicitud');
        $imagenDonacion = $this->request->getFile('imagen_donacion');
        $estadoDonacion = $this->request->getPost('estado_donacion');

        if ($imagenDonacion->isValid() && !$imagenDonacion->hasMoved()) {
            $imagenDonacion->move(WRITEPATH . 'uploads');
            $rutaImagen = $imagenDonacion->getName();
        } else {
            $rutaImagen = null;
        }

        // Guardar la donación en la base de datos
        $donacionModel = new DonacionModel();
        $donacionId = $donacionModel->insert([
            'FechaDonacion' => $fechaDonacion,
            'Estado' => $estado,
            'TipoDeDonacion' => $tipoDonacion,
            'IDSolicitud' => $idSolicitud,
            'ImagenDonacion' => $rutaImagen,
            'EstadoDonacion' => $estadoDonacion
        ]);

        // Procesar los productos y alimentos asociados a la donación
        // if ($tipoDonacion == 'Producto') {
        //     // Obtener los datos de los productos del formulario
        //     $nombreProducto = $this->request->getPost('nombre_producto_modal');
        //     $marcaProducto = $this->request->getPost('marca_producto_modal');
        //     $cantidadProducto = $this->request->getPost('cantidad_producto_modal');
        //     $descripcionProducto = $this->request->getPost('descripcion_producto_modal');

        //     // Guardar el producto asociado a la donación en la base de datos
        //     $productoModel = new ProductoModel();
        //     $productoModel->insert([
        //         'IDDonacion' => $donacionId,
        //         'Nombre' => $nombreProducto,
        //         'Marca' => $marcaProducto,
        //         'Cantidad' => $cantidadProducto,
        //         'Descripcion' => $descripcionProducto
        //     ]);
        // } elseif ($tipoDonacion == 'Alimento') {
        //     // Obtener los datos de los alimentos del formulario
        //     $nombreAlimento = $this->request->getPost('nombre_alimento_modal');
        //     $tipoAlimento = $this->request->getPost('tipo_alimento_modal');
        //     $cantidadAlimento = $this->request->getPost('cantidad_alimento_modal');
        //     $fechaVencimientoAlimento = $this->request->getPost('fecha_vencimiento_alimento_modal');
        //     $detallesAlimento = $this->request->getPost('detalles_alimento_modal');
        //     $temperaturaAlmacenamientoAlimento = $this->request->getPost('temperatura_almacenamiento_alimento_modal');
        //     $estadoCalidadAlimento = $this->request->getPost('estado_calidad_alimento_modal');

        //     // Guardar el alimento asociado a la donación en la base de datos
        //     $alimentoModel = new AlimentoModel();
        //     $alimentoModel->insert([
        //         'IDDonacion' => $donacionId,
        //         'Nombre' => $nombreAlimento,
        //         'Tipo' => $tipoAlimento,
        //         'Cantidad' => $cantidadAlimento,
        //         'FechaVencimiento' => $fechaVencimientoAlimento,
        //         'Detalles' => $detallesAlimento,
        //         'TemperaturaAlmacenamiento' => $temperaturaAlmacenamientoAlimento,
        //         'EstadoCalidad' => $estadoCalidadAlimento
        //     ]);
        // }

        // Redirigir a la página de confirmación u otra página
        return redirect()->to('/Forms/_form_agregar/');
    }
}
