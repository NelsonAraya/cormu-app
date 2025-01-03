<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoUsuario;

class EstadoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new EstadoUsuario();
        $a->nombre="Activo";
        $a->save();

        $a = new EstadoUsuario();
        $a->nombre="Inactivo";
        $a->save();
    }
}
