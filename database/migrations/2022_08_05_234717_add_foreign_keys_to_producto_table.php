<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->foreign(['id_proveedor'], 'fk_producto_proveedor')->references(['id'])->on('users');
            $table->foreign(['id_categoria'], 'fk_producto_categoria')->references(['id_categoria'])->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->dropForeign('fk_producto_proveedor');
            $table->dropForeign('fk_producto_categoria');
        });
    }
}
