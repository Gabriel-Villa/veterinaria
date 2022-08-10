<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producto_detalle', function (Blueprint $table) {
            $table->foreign(['id_producto'], 'fk_producto_detalle_producto')->references(['id_producto'])->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producto_detalle', function (Blueprint $table) {
            $table->dropForeign('fk_producto_detalle_producto');
        });
    }
}
