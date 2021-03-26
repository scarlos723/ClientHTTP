<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([  //llamar a los seeders, no se necesita importar cuando se esta en la misma carpeta
            CategoriaSeeder::class,
            SubcategoriaSeeder::class,
            CursoSeeder::class,
            InstructorSeeder::class,
            NivelSeeder::class,
            
        ]);

    }
}
