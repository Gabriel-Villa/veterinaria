<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->bigIncrements('id_orden');
            $table->unsignedBigInteger('id_cliente')->index('id_cliente');
            $table->time('hora_entrega');
            $table->text('mensaje')->nullable();
            $table->string('mensaje_proveedor', 80)->nullable();
            $table->date('fecha_entrega');
            $table->dateTime('fecha_compra')->nullable()->useCurrent();
            $table->integer('estado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden');
    }
}
