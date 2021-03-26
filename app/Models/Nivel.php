<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    public function cursos(){//relacion muchos a muchos con Cursos
        return $this->belongsToMany(Curso::class); //
    }

    public function subcategorias(){//relacion unp a muchos con subcateforias
        return $this->belongsTo(Subcategoria::class); //un nivel pertenece a una subcategoria
    }
}
