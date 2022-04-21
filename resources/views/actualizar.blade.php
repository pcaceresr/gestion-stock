@extends('layouts.master')

@section('content')
    <div>
        <center>
            <br>
            <h2>Actualizar producto</h2>
            <br>
            <form action="{{ url('guardarActualizar') }}" method="post">
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
                        <input type="text" class="form-control" id="codigo" name="codigo">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Nombre del producto:
                        <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Descripción:
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Precio de Venta:
                        <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <div>
                    <p>
                        Sucursal(es):
                        <select name="sucursal">
                            <option>Todas</option>
                            <option>Las Higueras</option>
                            <option>Los Sauces</option>
                            <option>Los Ulmos</option>
                        </select>
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="{{ action('App\Http\Controllers\productoController@producto') }}" type="submit"
                    class="btn btn-primary">Volver al menú principal</a>
        </center>
        </form>
        </ /div>
    @stop
