<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContribuyentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuyentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razonSocial');
            $table->string('RFC');
            $table->string('correo_Electronico');
            $table->integer('id_usuario');
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
        Schema::dropIfExists('contribuyentes');
    }
}
