<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creartablaconvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_convenio', function (Blueprint $table) {
            $table->increments('conv_id');
            $table->date('conv_fecha');
            $table->decimal('conv_cuotaini');
            $table->integer('conv_nrocuota');
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
        Schema::dropIfExists('t_convenio');
    }
}
