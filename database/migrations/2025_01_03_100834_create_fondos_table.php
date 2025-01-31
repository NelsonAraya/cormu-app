<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fondos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->bigInteger('monto');
            $table->integer('resolucion');
            $table->string('convenio');
            $table->integer('fondo_id')->unsigned();
            $table->foreign('fondo_id')->references('id')->on('estado_fondos');
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fondos');
    }
};
