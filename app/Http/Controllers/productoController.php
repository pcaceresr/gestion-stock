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

    public function guardarConsultar(Request $request){

        $this ->validate($request,[
            'codigo' => 'required',
            'nombre' => 'required|min:3',
        ]);
   
           return 'Codigo'.$request->input('codigo');
       }

    public function guardarAgregar(Request $request){

     $this ->validate($request,[
         'codigo' => 'required',
         'nombre' => 'required|min:3',
         'cantidad' => 'required',
     ]);

        return 'Codigo'.$request->input('codigo');
    }

   public function guardarEliminar(Request $request){

     $this ->validate($request,[
         'codigo' => 'required',
         'nombre' => 'required|min:3',
         'cantidad' => 'required',
     ]);

        return 'Codigo'.$request->input('codigo');
    }

    public function guardarActualizar(Request $request){

        $this ->validate($request,[
            'codigo' => 'required',
            'nombre' => 'required|min:3',
        ]);
   
           return 'Codigo'.$request->input('codigo');
       }

}
