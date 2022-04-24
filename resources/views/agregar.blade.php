@extends('layouts.master')

@section('content')
    <div>
        <center>
            <br>
            <h2>Agregar producto</h2>
            <br>
            <form action="{{ url('/menu/agregar') }}" method="post">
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
                        <input type="text" class="form-control" id="codigo" name="codigo">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Nombre del producto:
                        <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Categoria:
                        <select name="categoria_id">
                            <option value="1">categoria1</option>
                            <option value="2">categoria2</option>
                            <option value="3">categoria3</option>
                        </select>


                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Descripción:
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Cantidad:
                        <input type="number" class="form-control" id="cantidad" name="cantidad">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Precio de Venta:
                        <input type="number" class="form-control" id="precioVenta" name="precioVenta">
                </div>
                <div>
                    <p>
                        Sucursal:
                        <select name="sucursal_id">
                            <option value="1">Las Higueras</option>
                            <option value="2">Los Sauces</option>
                            <option value="3">Los Ulmos</option>
                        </select>
                        {{-- <select class="form-control">
                            @foreach ($listTeam as $team)
                              <option>{{$team->NomComplet}}</option>
                              @endforeach
                          </select> --}}

                    </p>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
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
