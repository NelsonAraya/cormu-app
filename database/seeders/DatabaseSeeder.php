<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
/*
use Database\Seeders\AfpsSeeder;
use Database\Seeders\EstadoCivilSeeder;
use Database\Seeders\EstadoUsuarioSeeder;
use Database\Seeders\PrevisionSeeder;
use Database\Seeders\ProfesionSeeder;
use Database\Seeders\SexoSeeder;
use Database\Seeders\UsuarioSeeder;
*/
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(AfpsSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(EstadoUsuarioSeeder::class);
        $this->call(PrevisionSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(SexoSeeder::class);
        $this->call(UsuarioSeeder::class);
        
    }
}
