@extends('layouts.master')

@section('content')
<div>
    <center>
        <br>
        <h2>Agregar producto</h2>
        <br>
    <form action="/action_page.php">
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
            <input type="text" class="form-control" id="codigo"  name="codigo">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Nombre del producto:
            <input type="text" class="form-control" id="nombre"  name="nombre">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="" class="form-label">Cantidad:
            <input type="number" class="form-control" id="cantidad"  name="cantidad">
        </div>
   <br>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <button type="submit" class="btn btn-primary">Volver al menú principal </button>
    </center>
    </form>
<//div>
@stop