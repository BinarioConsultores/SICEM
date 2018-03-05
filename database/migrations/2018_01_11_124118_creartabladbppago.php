<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartabladbppago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_dbppago', function (Blueprint $table) {
            $table->increments('dbpp_id');
            $table->integer('ppago_id')->unsigned();
            $table->integer('bolde_id')->unsigned();
            $table->foreign('ppago_id')->references('ppago_id')->on('t_planpago');
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
        Schema::dropIfExists('t_dbppago');
    }
}
