<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_detalle', function (Blueprint $table) {
            $table->bigIncrements('id_producto_detalle');
            $table->unsignedBigInteger('id_producto')->index('fk_producto_detalle_producto');
            $table->string('imagen', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_detalle');
    }
}
