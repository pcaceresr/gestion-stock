<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insertar_productos_sucursales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i < 10; $i++) {
            DB::table('productos_sucursal')->insert(array(
                'producto_id' => $this->obtenerProducto($i),
                'sucursal_id' => $this->obtenerSucursal($i),

            )); # code...
        }
        $this->command->info('Productos insertados con exito!');
    }
    public function obtenerProducto($i)
    {
        // return rand(1, 9);
        return $i;
    }

    public function obtenerSucursal($i)
    {
        // if ($i <= 3) {
        // return $i;
        // }

        return rand(1, 3);
    }

}
