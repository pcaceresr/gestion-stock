<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\productoSucursal;
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
        return view('eliminar');
    }

    public function agregar()
    {
        return view('agregar');
    }

    public function actualizar()
    {
        return view('actualizar');
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
                $producto->estado = 'ACTIVO';
                $producto->categoria_id = $request->categoria_id;
                $producto->save();

                $productoSucursal = new productoSucursal();
                $productoSucursal->sucursal_id = $request->sucursal_id;
                $productoSucursal->cantidad = $request->cantidad;
                $productoSucursal->precioVenta = $request->precioVenta;

                $producto->productosSucursal()->save($productoSucursal);

            } else {

                //se crea solamente en el NAV
                $productoSucursal = new productoSucursal();
                $productoSucursal->producto_id = $productoExistente->id;
                $productoSucursal->sucursal_id = $request->sucursal_id;
                $productoSucursal->cantidad = $request->cantidad;
                $productoSucursal->precioVenta = $request->precioVenta;
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

}
