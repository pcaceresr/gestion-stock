@extends('layouts.master')

@section('content')
    <div>
        <center>
            <br>
            <h2>Eliminar producto</h2>
            <br>
            <form action="{{ url('/menu/eliminar') }}" method="post">
                <div class="mb-3">
                    &nbsp &nbsp<label for="" class="form-label">Codigo del producto:
                        <input type="text" class="form-control" id="codigo" name="codigo">
                </div>

                <div class="mb-3">
                    <p>
                        Sucursal(es):
                        <select name="sucursal">
                            <option value="todas">Todas</option>
                            <option value="1">Las Higueras</option>
                            <option value="2">Los Sauces</option>
                            <option value="3">Los Ulmos</option>
                        </select>
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-warning">Buscar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @isset($mensaje)
                    <div class="alert-success">
                        {{ $mensaje }}
                    </div>
                @endisset
                <a href="{{ action('App\Http\Controllers\productoController@producto') }}" type="submit"
                    class="btn btn-primary">Volver al menú principal</a>
        </center>
        </form>
        <hr>
        <form id="formActualizarEstado" action="{{ url('/menu/eliminar') }}" method="post">
            <table class="table">
                <thead>
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
                                <td>
                                    @if ($ps->producto->estado == 'ACTIVO')
                                        <button class="btn btn-danger" name="accion" value="desactivar"
                                            onclick="cambiarEstado({{ $ps->producto->id }})">Desactivar</button>
                                    @else
                                        <button class="btn btn-warning" name="accion" value="activar"
                                            onclick="cambiarEstado({{ $ps->producto->id }})">Activar</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </form>
    </div>
    <script>
        function cambiarEstado(id) {
            var input = document.createElement("input");
            input.type = "hidden";
            input.value = id;
            input.name = "productoId";
            document.getElementById("formActualizarEstado").appendChild(input);
        }
    </script>
@stop
