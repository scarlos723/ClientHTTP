<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;


    public function categoria(){//relacion uno a muchos inversa
        return $this->belongsToMany(Categoria::class); //una subcategoria le pertenese a una categoria
    }

    public function niveles(){//relacion unp a muchos con subcateforias
        return $this->hasMany(Nivel::class); //una subcategoria tiene muchos niveles
    }
}
