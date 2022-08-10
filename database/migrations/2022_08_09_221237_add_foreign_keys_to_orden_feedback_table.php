<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrdenFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_feedback', function (Blueprint $table) {
            $table->foreign(['id_orden'], 'FK_orden_feedback_orden')->references(['id_orden'])->on('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_feedback', function (Blueprint $table) {
            $table->dropForeign('FK_orden_feedback_orden');
        });
    }
}
