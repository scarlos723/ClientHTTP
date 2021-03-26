<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
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
            $categoria = new Categoria();
            $categoria->nombre = "categoria".$i;
            $categoria->descripcion="Lorem ipsum dolor sit amet".$i;
            $categoria->link_logo="link_logo".$i;
            $categoria->save();
        }
    }
}
