<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insertar_categorias extends Seeder
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
            DB::table('categorias')->insert(array(
                'name' => 'categoria'.$i,
                
            ));# code...
        }
        $this->command->info('Categoria insertada con exito!');
    }
}
