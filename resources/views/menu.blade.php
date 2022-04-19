@extends('layouts.master')

@section('content')
    <div>
        <br>
        <br>
        <center>
            <h2>Menú de administración de stock de productos</h2>
        </center>
        <br>
        <br>
        <center>
            <a href="{{ action('App\Http\Controllers\productoController@consultar') }}" type="button"
                class="btn btn-outline-primary btn-lg btn-block">Consultar</a>&nbsp &nbsp
            <a href="{{ action('App\Http\Controllers\productoController@agregar') }}" type="button"
                class="btn btn-outline-success btn-lg btn-block">Agregar</a>&nbsp &nbsp
            <a href="{{ action('App\Http\Controllers\productoController@actualizar') }}" type="button"
                class="btn btn-outline-warning btn-lg btn-block">Actualizar</a>&nbsp &nbsp
            <a href="{{ action('App\Http\Controllers\productoController@eliminar') }}" type="button"
                class="btn btn-outline-danger btn-lg btn-block">Eliminar</a>&nbsp &nbsp
        </center>
        <br>
        <center>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-info btn-lg btn-block">
                    Salir
                </button>
            </form>
        </center>
        </form>
        <br>
        <br>
    </div>
@stop
