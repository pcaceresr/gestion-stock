<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sucursales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 10 ; $i++) { 
            DB::table('sucursales')->insert(array(
                'name' => 'sucursal'.$i,
                
            ));# code...
        }
        $this->command->info('Sucursal Creada con exito!');
    }
}
