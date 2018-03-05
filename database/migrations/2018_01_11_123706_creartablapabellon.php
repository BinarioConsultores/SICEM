<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablapabellon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pabellon', function (Blueprint $table) {
            $table->increments('pab_id');
            $table->string('pab_nom');
            $table->integer('pab_nrofil');
            $table->integer('pab_nrocol');
            $table->integer('pab_cantnicho');
            $table->string('pab_pathimag');
            $table->string('pab_tiponum');
            $table->integer('cement_id')->unsigned();
            $table->foreign('cement_id')->references('cement_id')->on('t_cementerio');

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
        Schema::dropIfExists('t_pabellon');
    }
}
