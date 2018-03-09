<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablacontrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_contrato', function (Blueprint $table) {
            $table->increments('cont_id');
            $table->date('cont_fecha');
            $table->string('cont_tipopago');
            $table->string('cont_concepto');
            $table->string('cont_estado');
            $table->string('cont_tipouso');
            $table->integer('cont_tiempo');
            $table->decimal('cont_monto');
            $table->date('cont_diffechsep');
            $table->integer('sol_id')->unsigned();
            $table->integer('dif_id')->unsigned();
            $table->integer('nicho_id')->unsigned();
            $table->integer('usu_id_reg')->unsigned();
            $table->integer('usu_id_auto')->unsigned();
            $table->integer('conv_id')->unsigned();
            $table->integer('bolde_id')->unsigned();
            $table->foreign('sol_id')->references('sol_id')->on('t_solicitante');
            $table->foreign('conv_id')->references('conv_id')->on('t_convenio');
            $table->foreign('dif_id')->references('dif_id')->on('t_difunto');
            $table->foreign('nicho_id')->references('nicho_id')->on('t_nicho');
            $table->foreign('usu_id_reg')->references('id')->on('users');
            $table->foreign('usu_id_auto')->references('id')->on('users');  
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
        Schema::dropIfExists('t_contrato');
    }
}
