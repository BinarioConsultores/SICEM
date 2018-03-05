<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablaboleta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_boleta', function (Blueprint $table) {
            $table->increments('bol_id');
            $table->string('bol_nro');
            $table->string('bol_dni');
            $table->string('bol_nom');
            $table->date('bol_fecha');    
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
        Schema::dropIfExists('t_boleta');
    }
}
