<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insertar_usuarios extends Seeder
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
            DB::table('usuarios')->insert(array(
                'name' => 'usuario'.$i,
                
            ));# code...
        }
        $this->command->info('Usuario insertado con exito!');
    }
}

