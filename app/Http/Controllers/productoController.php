<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\productoSucursal;
use App\Models\sucursal;
use Exception;
use Illuminate\Http\Request;

class productoController extends Controller
{
    public function producto()
    {
        return view('menu');
    }

    public function eliminar()
    {
        return view('eliminar', [
            'sucursales' => $this->obtenerSucursales(),
        ]);
    }

    public function agregar()
    {
        return view('agregar');
    }

    public function actualizar()
    {
        return view('actualizar', [
            'productoExistente' => $this->inicializarProductoExistente(),
        ]);
    }

    public function inicializarProductoExistente()
    {
        $productoExistente = new productoSucursal();
        $productoExistente->producto = new producto();
        $productoExistente->sucursal = new sucursal();
        return $productoExistente;
    }

    public function consultar()
    {
        return view('consultar');
    }

    public function guardarConsultar(Request $request)
    {

        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required|min:3',
        ]);

        return 'Codigo' . $request->input('codigo');
    }

    public function obtenerSucursales()
    {
        return sucursal::all();
    }

    public function obtenerSucursalesPorProducto($productoId)
    {
        $productoSucursal = productoSucursal::where('producto_id', '=', $productoId)
            ->get()
            ->load('sucursal');

        $sucursales = [];
        foreach ($productoSucursal as $ps) {
            array_push($sucursales, $ps->sucursal);
        }
        // error_log(implode($sucursales));
        return $sucursales;
    }

    public function verConsulta(Request $request)
    {
        $codigo = $request->codigo;
        $name = $request->name;
        $sucursalId = $request->sucursal;

        $productosExistentes = null;
        $producto = null;

        if ($codigo == null && $name == null) {
            $productosExistentes = productoSucursal::all()
                ->load('sucursal')->load('producto');
        }

        if ($codigo != null) {
            $producto = producto::where('codigo', '=', $codigo)->first();
        }

        if ($name != null) {
            $producto = producto::where('name', '=', $name)->first();
        }

        if ($producto != null) {
            if ($sucursalId == 'todas') {
                $productosExistentes = productoSucursal::where('producto_id', '=', $producto->id)
                    ->get()
                    ->load('sucursal')->load('producto');
            } else {
                $productosExistentes = productoSucursal::where('producto_id', '=', $producto->id)
                    ->where('sucursal_id', '=', $sucursalId)
                    ->get()
                    ->load('sucursal')->load('producto');
            }
        }

        if ($productosExistentes == null || count($productosExistentes) == 0) {
            $mensajeError = 'Producto no existe: ' . $codigo;
            error_log($mensajeError);
            return back()->withErrors(['errors' => $mensajeError]);
        }

        return view('consultar', [
            'productosExistentes' => $productosExistentes,
        ]);

    }

    public function guardarAgregar(Request $request)
    {
        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required|min:3',
            'cantidad' => 'required',
        ]);
    }

    public function agregarProducto(Request $request)
    {

        $this->validate($request, [
            'codigo' => 'required',
            'name' => 'required',
            'categoria_id' => 'required',
            'cantidad' => 'required',
            'precioVenta' => 'required',
            'sucursal_id' => 'required',
        ]);

        //si producto existe obtener el id; si no almacernarlo.
        $productoExistente = producto::where('codigo', '=', $request->codigo)->first();

        error_log($productoExistente);
        try {
            if ($productoExistente == null) {
                //se crea en producto y en el nav producto sucursal
                $producto = new producto();
                $producto->codigo = $request->codigo;
                $producto->name = $request->name;
                $producto->descripcion = $request->descripcion;
                $producto->categoria_id = $request->categoria_id;
                $producto->save();

                $productoSucursal = new productoSucursal();
                $productoSucursal->sucursal_id = $request->sucursal_id;
                $productoSucursal->cantidad = $request->cantidad;
                $productoSucursal->precioVenta = $request->precioVenta;
                $productoSucursal->estado = 'ACTIVO';

                $producto->productosSucursal()->save($productoSucursal);

            } else {

                //se crea solamente en el NAV
                $productoSucursal = new productoSucursal();
                $productoSucursal->producto_id = $productoExistente->id;
                $productoSucursal->sucursal_id = $request->sucursal_id;
                $productoSucursal->cantidad = $request->cantidad;
                $productoSucursal->precioVenta = $request->precioVenta;
                $productoSucursal->estado = 'ACTIVO';
                $productoSucursal->save();

            }

        } catch (Exception $e) {
            error_log($e->getMessage());
            error_log($e->getCode());

            $mensajeError = '';
            if ($e->getCode() == '23000') {
                $mensajeError = 'Producto ya existe en esta sucursal';
            }

            return back()->withErrors(['errors' => $mensajeError]);
        }
        return back()->withErrors(['errors' => 'Producto "' . $request->input('codigo') . '" ingresado exitosamente!']);

    }

    public function guardarEliminar(Request $request)
    {

        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required|min:3',
            'cantidad' => 'required',
        ]);

    }

    public function guardarActualizar(Request $request)
    {

        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required|min:3',
        ]);

        return 'Codigo' . $request->input('codigo');
    }

    public function verEliminar(Request $request)
    {
        error_log($request);
        $accion = $request->accion;

        try {

            if ($accion == 'buscar') {
                $productosExistentes = $this->buscarProductos($request);
                error_log($productosExistentes);
                return view('eliminar', [
                    'productosExistentes' => $productosExistentes,
                    'sucursales' => $this->obtenerSucursales(),
                ]);
            }

            if ($accion == 'desactivar' || $accion == 'activar') {
                $this->cambiarEstado($request);
                return view('eliminar', [
                    'request' => $request,
                    'sucursales' => $this->obtenerSucursales(),
                ]);
            }

            if ($accion == 'eliminar') {
                $this->eliminarProducto($request);
                return view('eliminar', [
                    'request' => $request,
                    'sucursales' => $this->obtenerSucursales(),
                ]);
            }

        } catch (Exception $e) {

            error_log($e->getMessage());
            error_log($e->getCode());

            $mensajeError = $e->getMessage();

            if ($e->getCode() == '23000') {
                $mensajeError = 'Producto ya existe en esta sucursal';
            }

            return back()->withErrors(['errors' => $mensajeError]);
        }

    }

    public function buscarProductos(Request $request)
    {
        try {
            $codigo = $request->codigo;
            $sucursalId = $request->sucursal;
            $productosExistentes = [];
            $producto = new producto();

            if ($codigo != null && $sucursalId == 'todas') {

                $producto = producto::where('codigo', '=', $codigo)->first();

                if ($producto != null) {
                    $productosExistentes = productoSucursal::where('producto_id', '=', $producto->id)
                        ->get()
                        ->load('sucursal')->load('producto');
                }

            } else if ($sucursalId != null && $codigo == null) {

                if ($sucursalId == 'todas') {
                    $productosExistentes = productoSucursal::all()
                        ->load('sucursal')->load('producto');
                } else {
                    $productosExistentes = productoSucursal::where('sucursal_id', '=', $sucursalId)
                        ->get()
                        ->load('sucursal')->load('producto');
                }

            } else if ($codigo != null && $sucursalId != null) {

                $producto = producto::where('codigo', '=', $codigo)->first();

                if ($producto != null) {
                    $productosExistentes = productoSucursal::where('producto_id', '=', $producto->id)
                        ->where('sucursal_id', '=', $sucursalId)
                        ->get()
                        ->load('sucursal')->load('producto');
                }
            }

            if ($producto == null || $productosExistentes == null || count($productosExistentes) == 0) {
                $mensajeError = 'Producto no existe : ' . $codigo;
                throw new Exception($mensajeError, -1);
            }

            return $productosExistentes;

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function cambiarEstado(Request $request)
    {
        //actualizar estado de producto por producto_id
        $accion = $request->accion;
        $productoId = $request->productoId;
        $sucursalId = $request->sucursalId;
        $estado = "";

        if ($accion == "activar") {
            $estado = "ACTIVO";
        } else {
            $estado = "DESACTIVADO";
        }

        error_log('accion=>' . $accion);
        error_log('estado=>' . $estado);
        error_log('productoId=>' . $productoId);
        error_log('sucursalId=>' . $sucursalId);

        $ps = productoSucursal::where('producto_id', '=', $productoId)
            ->where('sucursal_id', '=', $sucursalId)
            ->update(['estado' => $estado]);

        $producto = producto::where('id', '=', $productoId)->first();

        $mensajeExito = 'Producto "' . $producto->codigo . '" actualizado exitosamente!';

        throw new Exception($mensajeExito);
    }

    public function eliminarProducto(Request $request)
    {
        try {
            error_log('eliminarProducto');
            // error_log($request);
            $codigoProducto = $request->codigo;
            $sucursalId = $request->sucursal;

            if ($codigoProducto == null) {
                throw new Exception('Ingrese codigo del producto');
            }

            $producto = producto::where('codigo', '=', $codigoProducto)->first();

            if ($producto == null) {
                throw new Exception('Producto no existe');
            }

            if ($sucursalId == 'todas') {
                producto::where('id', $producto->id)->delete();
            } else {
                productoSucursal::where('producto_id', $producto->id)
                    ->where('sucursal_id', $sucursalId)
                    ->delete();

            }

            throw new Exception('Producto eliminado con exito');

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function verActualizar(Request $request)
    {
        {
            error_log($request);
            $accion = $request->accion;
            $productoId = $request->productoId;
            $sucursalId = $request->sucursalId;

            try {

                if ($accion == 'buscar') {
                    $productosExistentes = $this->buscarProductos($request);
                    error_log($productosExistentes);
                    return view('actualizar', [
                        'productosExistentes' => $productosExistentes,
                        'productoExistente' => $this->inicializarProductoExistente(),
                        'sucursales' => $this->obtenerSucursales(),
                    ]);
                }

                if ($accion == 'editar') {
                    $productoExistente = $this->buscarProducto($productoId, $sucursalId);
                    error_log($productoExistente);
                    return view('actualizar', [
                        'productoExistente' => $productoExistente,
                        'sucursales' => $this->obtenerSucursalesPorProducto($productoId),
                    ]);
                }

                if ($accion == 'actualizar') {
                    //validar datos de entrada
                    $productoId = $request->productoId;
                    $sucursalId = $request->sucursal;
                    $codigo = $request->codigo;
                    $name = $request->name;
                    $descripcion = $request->descripcion;
                    $precioVenta = $request->precioVenta;

                    producto::where('id', '=', $productoId)
                        ->update(['codigo' => $codigo,
                            'name' => $name,
                            'descripcion' => $descripcion]);

                    if ($sucursalId == 'todas') {
                        productoSucursal::where('producto_id', '=', $productoId)
                            ->update(['precioVenta' => $precioVenta]);
                    } else {
                        productoSucursal::where('producto_id', '=', $productoId)
                            ->where('sucursal_id', '=', $sucursalId)
                            ->update(['precioVenta' => $precioVenta,
                            ]);
                    }

                    //codigo=codigo2&name=producto2&descripcion=&precio=&sucursal=1&accion=actualizar

                    error_log('actualizar=>' . $request);
                    // return back();
                    return back()->withErrors(['errors' => 'Producto "' . $codigo . '" Actualizado con éxito!']);
                }

            } catch (Exception $e) {

                error_log($e->getMessage());
                error_log($e->getCode());

                $mensajeError = $e->getMessage();

                if ($e->getCode() == '23000') {
                    $mensajeError = 'Producto ya existe en esta sucursal';
                }

                return back()->withErrors(['errors' => $mensajeError]);
            }
        }
    }

    public function buscarProducto($productoId, $sucursalId)
    {
        if ($productoId == null && $sucursalId == null) {
            throw new Exception('Ingresar codigo de producto');
        }

        $productoExistente = productoSucursal::where('producto_id', '=', $productoId)
            ->where('sucursal_id', '=', $sucursalId)
            ->firstOrFail()
            ->load('sucursal')->load('producto');

        return $productoExistente;
    }

}
