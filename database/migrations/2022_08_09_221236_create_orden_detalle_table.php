<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_detalle', function (Blueprint $table) {
            $table->integer('id_orden_detalle', true);
            $table->unsignedBigInteger('id_orden')->index('FK_orden_detalle_orden');
            $table->unsignedBigInteger('id_producto')->index('id_producto');
            $table->integer('cantidad');
            $table->integer('comision')->nullable();
            $table->integer('id_metodo_pago')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_detalle');
    }
}
