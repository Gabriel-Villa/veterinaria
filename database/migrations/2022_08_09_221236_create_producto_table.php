<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->unsignedBigInteger('id_categoria')->index('fk_producto_categoria');
            $table->unsignedBigInteger('id_proveedor')->index('fk_producto_proveedor');
            $table->string('nombre', 250);
            $table->double('precio', 6, 2);
            $table->integer('stock')->nullable();
            $table->text('descripcion');
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
        Schema::dropIfExists('producto');
    }
}
