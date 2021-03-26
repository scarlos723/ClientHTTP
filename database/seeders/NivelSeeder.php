<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cant=5;

        for ($i = 1; $i <= $cant; $i++) {
            $curso = new Nivel();
           
            $curso->nombre = "Nivel ".$i;
            $curso->subcategoria_id = 2; // Nivel que pertenece a la subcategoria 2
            
            $curso->save();
            
            
        }
    }
}
