@extends('layouts.master')

@section('content')
    <div>
        <center>
            <br>
            <h2>Consultar producto</h2>
            <br>
            <form action="{{ url('/menu/consultar') }}" method="post">
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
                        <input type="text" class="form-control" id="codigo" name="codigo" value=''>
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Nombre del producto:
                        <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
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
                <button type="submit" class="btn btn-primary">Consultar</button>
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
        <hr>
        <table class="table">
            <thead>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio Venta</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Estado</th>
            </thead>
            <tbody>
                @isset($productosExistentes)
                    @foreach ($productosExistentes as $ps)
                        <tr>
                            <td>{{ $ps->producto->codigo }}</td>
                            <td>{{ $ps->producto->name }}</td>
                            <td>{{ $ps->producto->categoria_id }}</td>
                            <td>{{ $ps->producto->descripcion }}</td>
                            <td>{{ $ps->precioVenta }}</td>
                            <td>{{ $ps->sucursal->name }}</td>
                            <td>{{ $ps->producto->estado }}</td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
@stop
