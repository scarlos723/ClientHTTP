<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
class CursoSeeder extends Seeder
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
            $curso = new Curso();
            $curso->id_externo=$i;
            $curso->nombre = "nombre curso ".$i;
            $curso->link_logo = "link_logo".$i;
            $curso->descripcion = "descripcion".$i;
            $curso->conceptos_importantes = "conceptos_importantes".$i;
            $curso->tiempo_curso = "tiempo_curso".$i;
            $curso->num_videos = random_int(1,10)*$i;
            $curso->num_lecturas = random_int(1,10)*$i;
            $curso->link_video = "link_video".$i;
            $curso->save();
            
            
        }
    }
}
