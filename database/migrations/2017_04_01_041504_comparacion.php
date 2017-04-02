<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comparacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->char('minimo', 4);
            $table->char('salto', 3);

            //post proceso
            $table->char('tiempo_proceso', 12)->null();
            $table->char('estado', 1)->null();
            $table->char('progreso', 3)->null();
            
            // foreign
            $table->integer('archivo1_id')->unsigned();
            $table->foreign('archivo1_id')->references('id')->on('archivos');
            $table->integer('archivo2_id')->unsigned();
            $table->foreign('archivo2_id')->references('id')->on('archivos');

            $table->timestamps();
        });

        Schema::create('similitudes', function (Blueprint $table) {
            $table->increments('id');

            $table->text('similitud');

            // foreign
            $table->integer('comparacion_id')->unsigned();
            $table->foreign('comparacion_id')->references('id')->on('comparaciones');

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
        Schema::dropIfExists('similitudes');
        Schema::dropIfExists('comparaciones');
    }
}
