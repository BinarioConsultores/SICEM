<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablacsextra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_csextra', function (Blueprint $table) {
            $table->increments('csextra_id');
            $table->integer('cont_id')->unsigned();
            $table->integer('sextra_id')->unsigned();
            $table->integer('bolde_id')->unsigned();
            $table->foreign('cont_id')->references('cont_id')->on('t_contrato');
            $table->foreign('sextra_id')->references('sextra_id')->on('t_servicioextra');
            $table->foreign('bolde_id')->references('bolde_id')->on('t_boletadetalle');
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
        Schema::dropIfExists('t_csextra');
    }
}
