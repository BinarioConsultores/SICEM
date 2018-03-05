<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablatraslado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_traslado', function (Blueprint $table) {
            $table->increments('tras_id');
            $table->date('tras_fecha');
            $table->string('tras_est');
            $table->integer('cont_id_ant')->unsigned();
            $table->integer('cont_id_nue')->unsigned();
            $table->foreign('cont_id_ant')->references('cont_id')->on('t_contrato');
            $table->foreign('cont_id_nue')->references('cont_id')->on('t_contrato');
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
        Schema::dropIfExists('t_traslado');
    }
}
