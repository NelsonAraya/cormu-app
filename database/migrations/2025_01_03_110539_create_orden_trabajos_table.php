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
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('jornada');
            $table->string('direcion_actual');
            $table->integer('telefono_actual');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->integer('tipo_ot_id')->unsigned();
            $table->foreign('tipo_ot_id')->references('id')->on('tipo_orden_trabajos');
            $table->integer('nodo_id')->unsigned();
            $table->foreign('nodo_id')->references('id')->on('nodo_orden_trabajos');
            $table->integer('fondo_id')->unsigned();
            $table->foreign('fondo_id')->references('id')->on('fondos');
            $table->integer('profesion_id')->unsigned();
            $table->foreign('profesion_id')->references('id')->on('profesions');
            $table->integer('prevision_id')->unsigned();
            $table->foreign('prevision_id')->references('id')->on('previsions');
            $table->integer('afp_id')->unsigned();
            $table->foreign('afp_id')->references('id')->on('afps');
            $table->integer('reemplazante_id')->unsigned();
            $table->foreign('reemplazante_id')->references('id')->on('usuarios');
            $table->string('motivo_remplazo');
            $table->integer('usuario_crea_id')->unsigned();
            $table->foreign('usuario_crea_id')->references('id')->on('usuarios');
            $table->date('fecha_salida');
            $table->string('motivo_salida');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estado_orden_trabajos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
