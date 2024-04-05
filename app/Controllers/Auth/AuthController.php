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
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Verificar si el usuario existe
        $userModel = new UsuarioModel();
        $user = $userModel->where('usuario', $username)->first();
    
        if (!$user) {
            return redirect()->back()->withInput()->with('errors', ['El usuario no existe']);
        }

        // Verificar si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos
        if (password_verify($password, $user['Contrasena'])) {
            return redirect()->back()->withInput()->with('errors', ['Contrasena incorrecta']);
        }
    
        // Almacenar los datos del usuario en la sesión
        $sessionData = [
            'userId' => $user['IDUsuario'],
            'userRole' => $user['Rol'],
            'userName' => $user['Nombre'],
            'isLoggedIn' => true,
        ];
    
        // Establecer la sesión del usuario
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

        // Redirigir al formulario de inicio de sesión
        return redirect()->to(route_to('home'));
    }

    public function register()
    {
        $usuarioModel = new UsuarioModel();

        // Obtener datos del formulario
        $dataUsuario = [
            'Nombre' => $this->request->getPost('nombre'),
            'Usuario' => $this->request->getPost('usuario'),
            'CorreoElectronico' => $this->request->getPost('correo'),
            'Contrasena' =>  password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
            'Rol' => 'Voluntario', // Rol por defecto
            'Habilitado' => true // Usuario habilitado por defecto
        ];

        // Guardar usuario en la base de datos
        $usuarioID = $usuarioModel->insert($dataUsuario);

        // Determinar el tipo de usuario y guardar información adicional según el tipo
        $tipoUsuario = $this->request->getPost('tipo');
        switch ($tipoUsuario) {
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

        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
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
