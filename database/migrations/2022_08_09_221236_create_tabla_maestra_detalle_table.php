<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaMaestraDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_maestra_detalle', function (Blueprint $table) {
            $table->integer('id_maestro_detalle', true);
            $table->integer('id_maestro')->index('id_maestro');
            $table->string('valor', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabla_maestra_detalle');
    }
}
