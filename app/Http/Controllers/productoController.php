<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productoController extends Controller
{
    public function producto(){
        return view('menu');
    }

    public function eliminar(){
        return view('eliminar');
    }

    public function agregar(){
        return view('agregar');
    }

    public function actualizar(){
        return view('actualizar');
    }
    
    public function consultar(){
        return view('consultar');
    }
}
