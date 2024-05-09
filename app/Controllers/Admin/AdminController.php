<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;
use App\Models\Donante\DonacionModel;
use App\Models\Donante\DonanteModel;
use App\Models\Receptor\ReceptorModel;
use App\Models\Receptor\SolicitudModel;
use App\Models\Voluntario\ParticipacionModel;
use App\Models\Voluntario\PostulacionModel;
use App\Models\Voluntario\VoluntarioModel;
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
        $solicitud = new SolicitudModel();
        $data['solicitudes'] = $solicitud->findAll();

        $donante = new DonanteModel();
        $data['donantes'] = $donante -> findAll();
        $donacionModel = new DonacionModel();
        $data['donaciones'] = $donacionModel->getDonacion();
        $data['donacionesPendientes'] = $donacionModel->getDonacionPendiente();
        $data['donacionesEntregadas'] = $donacionModel->getDonacionEntregada();
        $data['donacionesCanceladas'] = $donacionModel->getDonacionCancelada();
        return view('Admin/admin_donaciones', $data);
    }

    public function solicitudes()
    {
        $receptor  = new ReceptorModel();
        $data ['receptores'] = $receptor-> findAll();
        $solicitudModel = new SolicitudModel();
        $data['solicitudes'] = $solicitudModel->getSolicitudPendiente();
        $data['solicitudesAceptada'] = $solicitudModel->getSolicitudAceptada();
        $data['solicitudesRechazada'] = $solicitudModel->getSolicitudRechazada();
        return view('Admin/admin_solicitudes', $data);
    }

    public function postulaciones()
    {
        $parti = new ParticipacionModel();
        $data['participaciones'] = $parti -> findAll();
        $voluntario = new VoluntarioModel();
        $data['voluntarios'] = $voluntario -> findAll();
        $usurio = new UsuarioModel();
        $data['usuarios'] = $usurio -> findAll();
        $solicitudModel = new SolicitudModel();
        $data['solicitudes'] = $solicitudModel->find();
        $postulacionesModel = new PostulacionModel();
        $data['postulaciones'] = $postulacionesModel->getPostulaciones();
        $data['postulacionesAceptada'] = $postulacionesModel->getPostulacionesAceptada();
        $data['postulacionesRechazada'] = $postulacionesModel->getPostulacionesRechazada();

        return view('Admin/admin_postulaciones', $data);
    }
    //------------usuario----------------
    public function editar_usuario($id)
    {
        $userModel = new UsuarioModel();
        $data['usuario'] = $userModel->encontrarUsuario($id);
        return view('Admin/editar_usuario', $data);
    }

    public function actualizar_usuario()
    {
        // Instanciar el modelo de usuario
        $usuarioModel = new UsuarioModel();
    
        // Obtener el ID de usuario de la solicitud
        $idUsuario = $this->request->getPost('id');
    
        // Obtener datos de la solicitud y asignarlos a un arreglo
        $nuevosDatos = [
            'Nombre' => $this->request->getPost('nombre'),
            'Usuario' => $this->request->getPost('usuario'),
            'CorreoElectronico' => $this->request->getPost('correo'),
            'Rol' => $this->request->getPost('rol'),
            'Habilitado' => (bool) $this->request->getPost('habilitado') // Convertir a booleano
        ];
    
        // Obtener los datos actuales del usuario
        $datosActuales = $usuarioModel->find($idUsuario);
    
        // Verificar si la contraseña ha cambiado
        $nuevaContrasena = $this->request->getPost('contrasena');
        if (!empty($nuevaContrasena) && $nuevaContrasena != $datosActuales['Contrasena']) {
            // Si la contraseña ha cambiado, actualizarla en los nuevos datos
            $nuevosDatos['Contrasena'] = $nuevaContrasena;
        } else {
            // Si la contraseña no ha cambiado, eliminarla de los nuevos datos para evitar su actualización
            unset($nuevosDatos['Contrasena']);
        }
    
        // Verificar si los datos son diferentes antes de actualizar
        if ($nuevosDatos != $datosActuales) {
            // Actualizar los datos del usuario en la base de datos
            $usuarioModel->update($idUsuario, $nuevosDatos);
        }
    
        // Redirigir al usuario a la página de administración de usuarios
        return redirect()->to('Admin/admin_usuarios');
    }
    
    public function eliminar_usuario($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->delete($id);

        return redirect()->to('Admin/admin_usuarios');
    }

    public function crear_usuario()
    {
        return view('Admin/crear_usuario');
    }
    public function guardar_usuario()
    {

        if ($this->request->getMethod() === 'post') {
            // Obtener los datos del formulario
            $datosUsuario = [
                'Nombre' => $this->request->getPost('nombre'),
                'Usuario' => $this->request->getPost('usuario'),
                'CorreoElectronico' => $this->request->getPost('correo'),
                'Contrasena' => $this->request->getPost('contrasena'), // Se asume que la contraseña está en texto plano
                'Rol' => $this->request->getPost('rol'),
                'Habilitado' => $this->request->getPost('habilitado') ? true : false
            ];

            // Crear una instancia del modelo de usuario
            $usuarioModel = new UsuarioModel();

            // Insertar los datos del nuevo usuario en la base de datos
            $usuarioModel->insert($datosUsuario);

            // Redirigir a alguna página, como la lista de usuarios
            return redirect()->to('Admin/admin_usuarios');
        }

        // Si no se envió un formulario, simplemente carga la vista del formulario de creación de usuario
        return view('Admin/admin_usuarios');
    }
    //----------donaciones
    public function aceptar_donacion($id)
    {
        $donacionModel = new DonacionModel();
        $donacion = $donacionModel->find($id);
        if ($donacion) {
            $donacionModel->update($id, ['Estado' => 'Aceptada']);
            return redirect()->to('Admin/admin_donaciones')->with('success', 'Donación aceptada correctamente.');
        } else {
            return redirect()->to('Admin/admin_donaciones')->with('error', 'No se encontró la donación.');
        }
    }
    public function rechazar_donacion($id)
    {
        $donacionModel = new DonacionModel();
        $donacion = $donacionModel->find($id);
        if ($donacion) {
            $donacionModel->update($id, ['Estado' => 'Rechazada']);
            return redirect()->to('Admin/admin_donaciones')->with('success', 'Donación aceptada correctamente.');
        } else {
            return redirect()->to('Admin/admin_donaciones')->with('error', 'No se encontró la donación.');
        }
    }
    public function detalles_donacion($id)
    {
        return redirect()->to('Admin/admin_donaciones');
    }
    public function entregar_donacion($id)
    {
        $donacionModel = new DonacionModel();
        $donacion = $donacionModel->find($id);
        if ($donacion) {
            $donacionModel->update($id, ['EstadoDonacion' => 'Entregada']);
            return redirect()->to('Admin/admin_donaciones')->with('success', 'Donación aceptada correctamente.');
        } else {
            return redirect()->to('Admin/admin_donaciones')->with('error', 'No se encontró la donación.');
        }
    }
    public function cancelar_donacion($id)
    {
        $donacionModel = new DonacionModel();
        $donacion = $donacionModel->find($id);
        if ($donacion) {
            $donacionModel->update($id, ['EstadoDonacion' => 'Cancelada']);
            return redirect()->to('Admin/admin_donaciones');
        } else {
            return redirect()->to('Admin/admin_donaciones')->with('error', 'No se encontró la donación.');
        }
    }
    public function pendiente_donacion($id)
    {
        $donacionModel = new DonacionModel();
        $donacion = $donacionModel->find($id);
        if ($donacion) {
            $donacionModel->update($id, ['EstadoDonacion' => 'Pendiente']);
            return redirect()->to('Admin/admin_donaciones');
        } else {
            return redirect()->to('Admin/admin_donaciones')->with('error', 'No se encontró la donación.');
        }
    }
    public function pendientes_donacion($id)
    {
        $donacionModel = new DonacionModel();
        $donacion = $donacionModel->find($id);
        if ($donacion) {
            $donacionModel->update($id, ['Estado' => 'Pendiente']);
            return redirect()->to('Admin/admin_donaciones');
        } else {
            return redirect()->to('Admin/admin_donaciones')->with('error', 'No se encontró la donación.');
        }
    }
    //---solicitudes ------
    public function solicitudes_rechazar($id)
    {
        $solicitudModel = new SolicitudModel();
        $solicitud = $solicitudModel->find($id);
        if ($solicitud) {
            $solicitudModel->update($id, ['EstadoSolicitud' => 'Rechazada']);
            return redirect()->to('Admin/admin_solicitudes');
        } else {
            return redirect()->to('Admin/admin_solicitudes')->with('error', 'No se encontró la solicitud.');
        }
    }
    public function solicitudes_aceptar($id)
    {
        $solicitudModel = new SolicitudModel();
        $solicitud = $solicitudModel->find($id);
        if ($solicitud) {
            $solicitudModel->update($id, ['EstadoSolicitud' => 'Aceptada']);
            return redirect()->to('Admin/admin_solicitudes');
        } else {
            return redirect()->to('Admin/admin_solicitudes')->with('error', 'No se encontró la solicitud.');
        }
    }
    public function solicitudes_pendiente($id)
    {
        $solicitudModel = new SolicitudModel();
        $solicitud = $solicitudModel->find($id);
        if ($solicitud) {
            $solicitudModel->update($id, ['EstadoSolicitud' => 'Pendiente']);
            return redirect()->to('Admin/admin_solicitudes');
        } else {
            return redirect()->to('Admin/admin_solicitudes')->with('error', 'No se encontró la solicitud.');
        }
    }

    // postulacion

    public function pendiente_postulacion($id)
    {
        $postulacionModel = new PostulacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoPostulacion' => 'Pendiente']);
        return redirect()->to('Admin/admin_postulaciones');
    }
    public function aceptar_postulacion($id)
    {
        $postulacionModel = new PostulacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoPostulacion' => 'Aceptada']);
        return redirect()->to('Admin/admin_postulaciones');
    }
    public function rechazar_postulacion($id)
    {
        $postulacionModel = new PostulacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoPostulacion' => 'Rechazada']);
        return redirect()->to('Admin/admin_postulaciones');
    }

    //  postulacion - encargado

    public function aceptar_participacion($id){
        $postulacionModel = new ParticipacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoParticipacion' => 'Aceptada']);
        return redirect()->to('Admin/admin_postulaciones');
    }
    public function rechazar_participacion($id){
        $postulacionModel = new ParticipacionModel();
        $postulacionModel->find($id);
        $postulacionModel->update($id, ['EstadoParticipacion' => 'Rechazada']);
        return redirect()->to('Admin/admin_postulaciones');
    }
}
