<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class HomeController extends BaseController
{
    public function index()
    {
        

        
        return view('home/index');
    }
    public function contacto()
    {
        return view('home/contacto');
    }
    public function index2()
    {
        return view('data/dashboard-default');
    }
}
