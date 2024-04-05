<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

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
        if ($password !== $user['Contrasena']) {
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
        return redirect()->to(route_to('auth.login'));
    }
}
