<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function niveles(){//relacion muchos a muchos con niveles
        return $this->belongsToMany(Nivel::class); //
    }
    public function instructores(){//relacion muchos a muchos con niveles
        return $this->belongsToMany(Instructor::class);//pertenece a varios instructores
    }
}
