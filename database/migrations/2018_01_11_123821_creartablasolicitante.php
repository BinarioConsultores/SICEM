<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablasolicitante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_solicitante', function (Blueprint $table) {
            $table->increments('sol_id');
            $table->string('sol_nombre');
            $table->string('sol_telefono');
            $table->string('sol_dir');
            $table->string('sol_dni');
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
        Schema::dropIfExists('t_solicitante');
    }
}
