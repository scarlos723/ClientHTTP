<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategoria;
class SubcategoriaSeeder extends Seeder
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
            $subcategoria = new Subcategoria();
            $subcategoria->nombre = "subcategoria".$i;
            $subcategoria->descripcion = "descripcion".$i;
            $subcategoria->objetivo = "objetivo".$i;
            $subcategoria->link_video = "link_video".$i;

            $subcategoria->categoria_id=2; //pertenece a la categoria con id 2
            
            $subcategoria->save();
        }
    }
}
