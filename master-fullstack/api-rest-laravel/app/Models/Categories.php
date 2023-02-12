<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';//esta calse estara conectada a la tabla categories


    //relacion de 1 a muchos --> sacara todo los post relacionados con la categoria en concreto
    //indicamos en el primer parametro la ruta del modelo y en el segundo la variable por la cual se relacionan con la calve foranea.
    //en este caso la tabla categorias esta relacionada con la tabla post mediante el atributo category_id
    public function posts(){
        return $this->hasMany('App\Models\Posts', 'category_id');
    }
}
