<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_VOTACAO', function (Blueprint $table) {
            $table->id('VOT_CODIGO');
            $table->unsignedBigInteger('VOT_USU_CODIGO')->unsigned();
            $table->foreign('VOT_USU_CODIGO')->references('id')->on('users');
            $table->unsignedBigInteger('VOT_CAN_CODIGO')->unsigned();
            $table->foreign('VOT_CAN_CODIGO')->references('CAN_CODIGO')->on('TB_CANDIDATOS');
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
        Schema::dropIfExists('TB_VOTACAO');
    }
}
