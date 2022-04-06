@extends('layouts.master')

@section('content')
<div>
    <center>
        <br>
        <h2>Iniciar sesión</h2>
    </center>
    <form action="/action_page.php">
        <div class="mb-3 mt-3">
            &nbsp &nbsp<label for="email" class="form-label">Usuario:</label>
            <input type="email" class="form-control" id="email" placeholder="Ingrese su nombre de usuario" name="email">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="pwd" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Ingrese su conraseña" name="pswd">
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Recuerdame
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
<//div>
@stop
