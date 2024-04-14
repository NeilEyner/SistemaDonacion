<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\Donante\DonanteModel;
use App\Models\Receptor\ReceptorModel;
use App\Models\Voluntario\VoluntarioModel;

class AuthController extends BaseController
{
    public function showLoginForm()
    {
        // Verificar si el usuario ya está autenticado
        if (session()->has('loggedUser')) {
            return redirect()->to(route_to('dashboard'));
        }
        // Renderizar la vista del formulario de inicio de sesión
        return view('Auth/login');
    }

    public function login()
    {
        // Validar los datos del formulario de inicio de sesión
        $validation = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!$validation) {
            // Si la validación falla, redirigir de vuelta al formulario con los errores
            return redirect()->back()->withInput()->with('errors', ['Por favor, completa todos los campos']);
        }

        // Obtener los datos del formulario
        $usuario = $this->request->getPost('username');
        $contrasena = $this->request->getPost('password');

        // Verificar si el usuario existe
        $userModel = new UsuarioModel();
        $user = $userModel->where('Usuario', $usuario)->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('errors', ['El usuario no existe']);
        }

        if (!$user['Habilitado']) {
            return redirect()->back()->withInput()->with('errors', ['El usuario no está habilitado']);
        }

        // Verificar la contraseña
        if (!password_verify($contrasena, $user['Contrasena'])) {
            return redirect()->back()->withInput()->with('errors', ['Contraseña incorrecta']);
        }

        // Almacenar los datos del usuario en la sesión
        $sessionData = [
            'userId' => $user['IDUsuario'],
            'userRole' => $user['Rol'],
            'userName' => $user['Nombre'],
            'isLoggedIn' => true,
        ];

        // Establecer la sesión del usuario
        session()->start();
        session()->set('loggedUser', $sessionData);

        // Redirigir al panel de control según el rol del usuario
        switch ($user['Rol']) {
            case 'Administrador':
                return redirect()->route('admin.dashboard');
            case 'Donante':
                return redirect()->route('donante.dashboard');
            case 'Receptor':
                return redirect()->route('receptor.dashboard');
            case 'Voluntario':
                return redirect()->route('voluntario.dashboard');
            default:
                return redirect()->route('home');
        }
    }



    public function logout()
    {
        // Eliminar los datos del usuario de la sesión
        session()->remove('loggedUser');
        session()->destroy();
        // Redirigir al formulario de inicio de sesión
        return redirect()->to(route_to('home'));
    }

    public function register()
    {
        $usuarioModel = new UsuarioModel();
        $name = $this->request->getPost('nombre');
        $user = $this->request->getPost('usuario');
        $email = $this->request->getPost('correo');
        $password =  $this->request->getPost('contrasena');
        $password = password_hash($password, PASSWORD_BCRYPT);
        $role = $this->request->getPost('tipo'); // Rol por defecto
        $hab = false;

        $dataUsuario = [
            'Nombre' => $name,
            'Usuario' => $user,
            'CorreoElectronico' => $email,
            'Contrasena' => $password,
            'Rol' => $role,
            'Habilitado' => $hab
        ];

        // Guardar usuario en la base de datos
        $usuarioID = $usuarioModel->insert($dataUsuario);

        // Determinar el tipo de usuario y guardar información adicional según el tipo
        switch ($role) {
            case 'Donante':
                $donanteModel = new DonanteModel();
                $dataDonante = [
                    'IDUsuario' => $usuarioID,
                    'Tipo' => $this->request->getPost('tipo'),
                    'Nombre' => $this->request->getPost('nombre'),
                    'Direccion' => $this->request->getPost('direccion'),
                    'Ciudad' => $this->request->getPost('ciudad'),
                    'NumeroTelefono' => $this->request->getPost('telefono'),
                    'CorreoElectronico' => $this->request->getPost('correo'),
                    'SitioWeb' => $this->request->getPost('sitio_web'),
                    'OtrosDetalles' => $this->request->getPost('otros_detalles')
                ];
                $donanteModel->insert($dataDonante);
                break;
            case 'Receptor':
                $receptorModel = new ReceptorModel();
                $dataReceptor = [
                    'IDUsuario' => $usuarioID,
                    'Tipo' => $this->request->getPost('tipo'),
                    'Nombre' => $this->request->getPost('nombre'),
                    'Direccion' => $this->request->getPost('direccion'),
                    'Ciudad' => $this->request->getPost('ciudad'),
                    'NumeroTelefono' => $this->request->getPost('telefono'),
                    'CorreoElectronico' => $this->request->getPost('correo'),
                    'SitioWeb' => $this->request->getPost('sitio_web'),
                    'OtrosDetalles' => $this->request->getPost('otros_detalles')
                ];
                $receptorModel->insert($dataReceptor);
                break;
            case 'Voluntario':
                $voluntarioModel = new VoluntarioModel();
                $dataVoluntario = [
                    'IDUsuario' => $usuarioID,
                    'ExperienciaLaboral' => $this->request->getPost('experiencia_laboral'),
                    'Habilidades' => $this->request->getPost('habilidades')
                ];
                $voluntarioModel->insert($dataVoluntario);
                break;
        }

        return redirect()->to('Auth/login');
    }

    public function completado()
    {
        return "Registro completado con éxito.";
    }
    public function showRegistrationForm()
    {
        return view('Auth/register');
    }
}
