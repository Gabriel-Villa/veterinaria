<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrdenDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_detalle', function (Blueprint $table) {
            $table->foreign(['id_producto'], 'FK_orden_detalle_producto')->references(['id_producto'])->on('producto');
            $table->foreign(['id_orden'], 'FK_orden_detalle_orden')->references(['id_orden'])->on('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_detalle', function (Blueprint $table) {
            $table->dropForeign('FK_orden_detalle_producto');
            $table->dropForeign('FK_orden_detalle_orden');
        });
    }
}
