@extends('layouts.master')

@section('content')
    <div>
        <center>
            <br>
            <h2>Actualizar producto</h2>
            <br>
            <form action="{{ url('/actualizar') }}" method="post">
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
                        <input type="text" class="form-control" id="codigo" name="codigo">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Nombre del producto:
                        <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Descripción:
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Precio de Venta:
                        <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <div class="mb-3">
                    <p>
                        Sucursal(es):
                        <select name="sucursal">
                            <option value="todas">Todas</option>
                            @isset($sucursales)
                                @foreach ($sucursales as $sucursal)
                                    <option value={{ $sucursal->id }}>{{ $sucursal->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-warning" name="accion" value="buscar">Buscar</button>
                <button type="submit" class="btn btn-success" name="accion" value="actualizar">Actualizar</button>
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
        <hr>
        </form>
        <div>
        <form id="formActualizarEstado" action="{{ url('/actualizar') }}" method="post">
            @isset($productosExistentes)
                <table class="table">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio Venta</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </thead>
                    <tbody>

                        @foreach ($productosExistentes as $ps)
                            <tr>
                                <td>{{ $ps->producto->id }}</td>
                                <td>{{ $ps->producto->codigo }}</td>
                                <td>{{ $ps->producto->name }}</td>
                                <td>{{ $ps->producto->categoria_id }}</td>
                                <td>{{ $ps->producto->descripcion }}</td>
                                <td>{{ $ps->precioVenta }}</td>
                                <td>{{ $ps->sucursal->name }}</td>
                                <td>{{ $ps->estado }}</td>
                                <td>
                                    <button class="btn btn-success" name="accion" value="editar"
                                        onclick="agregarValoresFormulario({{ $ps->producto->id }}, {{ $ps->sucursal->id }});">Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endisset
        </form>
    </div>
    <script>
        function agregarValoresFormulario(productoId, sucursalId) {
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "productoId";
            input.value = productoId;
            document.getElementById("formActualizarEstado").appendChild(input);

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "sucursalId";
            input.value = sucursalId;
            document.getElementById("formActualizarEstado").appendChild(input);
        }
    </script>
@stop
