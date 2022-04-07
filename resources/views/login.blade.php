@extends('layouts.master')

@section('content')
<div>
    <center>
        <br>
        <h2>Iniciar sesión</h2>
    </center>
    <div class="container">
    <form action="{{url('login')}}" method="post">
        <div class="mb-3 mt-3">
            &nbsp &nbsp<label for="usuario"  class="form-label">Usuario:</label>
            <input type="text" required class="form-control" id="usuario" placeholder="Ingrese su nombre de usuario" name="usuario">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" placeholder="Ingrese su conraseña" name="password">
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Recuerdame
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        @if($errors->any())
                <div>
                    <ul> 
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
    </form>
<//div>
@stop
