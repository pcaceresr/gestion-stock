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
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\loginController@index');

Route::post('/login', 'App\Http\Controllers\loginController@validarLogin');

Route::get('/menu', 'App\Http\Controllers\productoController@producto');

Route::get('/menu/eliminar', ['uses' => 'App\Http\Controllers\productoController@eliminar']);
Route::post('/menu/eliminar', ['uses' => 'App\Http\Controllers\productoController@verEliminar']);
Route::post('/menu/cambiarEstado', ['uses' => 'App\Http\Controllers\productoController@cambiarEstado']);

//Ruta para agregar producto
Route::get('/menu/agregar', ['uses' => 'App\Http\Controllers\productoController@agregar']);
Route::post('/menu/agregar', 'App\Http\Controllers\productoController@agregarProducto');

Route::get('/menu/actualizar', ['uses' => 'App\Http\Controllers\productoController@actualizar']);
Route::post('/menu/actualizar', ['uses' => 'App\Http\Controllers\productoController@verActualizar']);

Route::get('/menu/consultar', ['uses' => 'App\Http\Controllers\productoController@consultar']);
Route::post('/menu/consultar', ['uses' => 'App\Http\Controllers\productoController@verConsulta']);

Route::post('/guardarConsultar', 'App\Http\Controllers\productoController@guardarConsultar', );

Route::post('/guardarAgregar', 'App\Http\Controllers\productoController@guardarAgregar', );

Route::post('/guardarEliminar', 'App\Http\Controllers\productoController@guardarEliminar', );

Route::post('/guardarActualizar', 'App\Http\Controllers\productoController@guardarActualizar', );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
