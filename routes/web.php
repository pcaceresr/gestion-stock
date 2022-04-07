<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login','App\Http\Controllers\loginController@index');

Route::post('/login', 'App\Http\Controllers\loginController@validarLogin');


Route::get('/menu','App\Http\Controllers\productoController@producto');

Route::get('/menu/eliminar',[
    'uses'=> 'App\Http\Controllers\productoController@eliminar'
]);

Route::get('/menu/agregar',[
    'uses'=> 'App\Http\Controllers\productoController@agregar'
]);

Route::get('/menu/actualizar',[
    'uses'=> 'App\Http\Controllers\productoController@actualizar'
]);

Route::get('/menu/consultar',[
    'uses'=> 'App\Http\Controllers\productoController@consultar'
]);

Route::post('/guardarConsultar','App\Http\Controllers\productoController@guardarConsultar',
   
);

Route::post('/guardarAgregar','App\Http\Controllers\productoController@guardarAgregar',
   
);

Route::post('/guardarEliminar','App\Http\Controllers\productoController@guardarEliminar',
   
);

Route::post('/guardarActualizar','App\Http\Controllers\productoController@guardarActualizar',
   
);


