<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
class InstructorSeeder extends Seeder
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
            $instructor = new Instructor;
            $instructor->nombre = "nombre instructor".$i;
            $instructor->descripcion = "descripcion".$i;
            $instructor->link_foto = "link_foto".$i;
            $instructor->save();
        }
    }
}
