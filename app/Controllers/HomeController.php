<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class HomeController extends BaseController
{
    public function index()
    {
        
        return view('home/index');
    }


}
