<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablanicho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_nicho', function (Blueprint $table) {
            $table->increments('nicho_id');
            $table->integer('nicho_nro');
            $table->integer('nicho_fila');
            $table->integer('nicho_col');
            $table->decimal('nicho_precio');
            $table->string('nicho_est');
            $table->string('nicho_pathimag');
            $table->integer('pab_id')->unsigned();
            $table->foreign('pab_id')->references('pab_id')->on('t_pabellon');
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
        Schema::dropIfExists('t_nicho');
    }
}
