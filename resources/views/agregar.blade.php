@extends('layouts.master')

@section('content')
<div>
    <center>
        <br>
        <h2>Agregar producto</h2>
        <br>
    <form action="{{url('guardarAgregar')}}" method="post">
    <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
            <input type="text" class="form-control" id="codigo"  name="codigo">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Nombre del producto:
            <input type="text" class="form-control" id="nombre"  name="nombre">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Categoria:
            <input type="text" class="form-control" id="categoria"  name="categoria">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Descripción:
            <input type="text" class="form-control" id="descripcion"  name="descripcion">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Cantidad:
            <input type="number" class="form-control" id="cantidad"  name="cantidad">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Precio de Venta:
            <input type="number" class="form-control" id="precio"  name="precio">
        </div>
        <div>
             <p>
             Sucursal:
                 <select name="sucursal">
                     <option>Las Higueras</option>
                     <option>Los Sauces</option>
                     <option>Los Ulmos</option>
                 </select>
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        @if($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <a href="{{action('App\Http\Controllers\productoController@producto')}}" type="submit" class="btn btn-primary">Volver al menú principal</a>
    </center>
    </form>
<//div>
@stop