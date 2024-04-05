<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class HomeController extends BaseController
{
    public function index()
    {
        // $session = session();
        // $loggedUser = $session->get('loggedUser');
        // if ($loggedUser) {
        //     $nombreUsuario = $loggedUser['userName'];
        //     return view('home/index', ['nombreUsuario' => $nombreUsuario]);
        // } else {
        //     return redirect()->to('Auth/login')->with('error', 'Debes iniciar sesión para acceder a esta página');
        // }
        return view('home/index');
    }
    public function contacto()
    {
        return view('home/contacto');
    }
}
