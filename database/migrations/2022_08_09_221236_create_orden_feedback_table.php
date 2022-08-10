<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_feedback', function (Blueprint $table) {
            $table->integer('id_orden_feedback', true);
            $table->unsignedBigInteger('id_orden')->index('FK_orden_feedback_orden');
            $table->string('comentario')->nullable();
            $table->integer('id_tipo_feedback');
            $table->dateTime('fecha_creacion')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_feedback');
    }
}
