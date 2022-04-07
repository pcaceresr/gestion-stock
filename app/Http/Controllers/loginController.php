<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    
    public function validarLogin(Request $request){
        $this ->validate($request,[
            'usuario' => 'required',
            'password' => 'required|min:3',
        ]);
   
        return view('menu');
       }

}
