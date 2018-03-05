<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablaplanpago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_planpago', function (Blueprint $table) {
            $table->increments('ppago_id');
            $table->date('ppago_fechaven');
            $table->integer('ppago_nrocuota');
            $table->decimal('ppago_montocuota');
            $table->decimal('ppago_saldocuota');
            $table->integer('conv_id')->unsigned();
            $table->foreign('conv_id')->references('conv_id')->on('t_convenio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_planpago');
    }
}
