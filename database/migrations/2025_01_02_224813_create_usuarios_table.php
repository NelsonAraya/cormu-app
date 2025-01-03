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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique();
            $table->string('dv',1);
            $table->string('password');
            $table->string('nombres');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->date('fecha_nacimiento');
            $table->integer('telefono');
            $table->string('direccion');
            $table->string('email',150)->unique()->nullable();
            $table->integer('prevision_id')->unsigned();
            $table->foreign('prevision_id')->references('id')->on('previsions');
            $table->integer('afp_id')->unsigned();
            $table->foreign('afp_id')->references('id')->on('afps');
            $table->integer('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->integer('profesion_id')->unsigned();
            $table->foreign('profesion_id')->references('id')->on('profesions');
            $table->integer('e_civil_id')->unsigned();
            $table->foreign('e_civil_id')->references('id')->on('estado_civils');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estado_usuario');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
