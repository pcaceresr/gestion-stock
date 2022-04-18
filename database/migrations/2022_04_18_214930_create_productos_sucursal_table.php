<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductosSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_sucursal', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id')->unsigned();
          
            $table->unsignedBigInteger('sucursal_id')->unsigned();
         
            $table->timestamps();
            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sucursal_id')->references('id')->on('sucursales')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_sucursal');
    }
}
