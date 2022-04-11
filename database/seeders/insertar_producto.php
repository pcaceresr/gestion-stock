<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insertar_producto extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <= 10 ; $i++) { 
             
            DB::table('productos')->insert(array(
                'name' => 'producto'.$i,
                'codigo' => 'codigo'.$i,
                'cantidad' => $this->obtenerCantidad (),
                'categoria_id' => $this->obtenerCategoria (),
                
            ));# code...
        }
        $this->command->info('Productos insertados con exito!');
    }
    
    public function obtenerCategoria(){
        return rand(1,10);
    }

    public function obtenerCantidad(){
        return rand(1,100);
    }

}

