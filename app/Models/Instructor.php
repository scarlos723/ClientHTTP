<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    public function cursos(){//relacion muchos a muchos con cursos
        return $this->belongsToMany(Curso::class); //pertenece a varios cursos
    }
}
