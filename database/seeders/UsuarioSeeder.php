<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usu = new Usuario();
        $usu->id=17096233;
        $usu->dv='8';
        $usu->nombres='Nelson Antonio';
        $usu->apellidop='Araya';
        $usu->apellidom='Vacca';
        $usu->fecha_nacimiento='1989-05-30';
        $usu->telefono=123456;
        $usu->password=bcrypt('prometeo');
        $usu->direccion='mi direccion';
        $usu->email='admin@prueba.cl';
        $usu->prevision_id=1;
        $usu->afp_id=1;
        $usu->sexo_id=1;
        $usu->profesion_id=1;
        $usu->e_civil_id=1;
        $usu->estado_id=1;
        $usu->save();
    }
}
