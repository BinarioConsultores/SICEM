<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablaboletadetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_boletadetalle', function (Blueprint $table) {
            $table->increments('bolde_id');
            $table->string('bolde_concepto');
            $table->decimal('bolde_monto');
            $table->integer('bol_id')->unsigned();
            $table->foreign('bol_id')->references('bol_id')->on('t_boleta');
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
        Schema::dropIfExists('t_boletadetalle');
    }
}
