<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_CANDIDATOS', function (Blueprint $table) {
            $table->id('CAN_CODIGO');
            $table->string('CAN_NOME');
            $table->string('CAN_VICE');
            $table->string('CAN_IMAGEM');
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
        Schema::dropIfExists('TB_CANDIDATOS');
    }
}
