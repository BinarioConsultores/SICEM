<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartabladifunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_difunto', function (Blueprint $table) {
            $table->increments('dif_id');
            $table->string('dif_nom');
            $table->string('dif_ape');
            $table->string('dif_dni');
            $table->date('dif_fechadef');
            $table->string('dif_obser');
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
        Schema::dropIfExists('t_difunto');
    }
}
