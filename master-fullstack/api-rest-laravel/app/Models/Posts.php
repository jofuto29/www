<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //relacion de 1 a muchos inversa --> muchos post pueden pertener a un usuario// muchos post pueden pertenecr a una categoria
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //sacame el objeto relacionado con category_id perteneciente al modelos categories
    public function category(){
        return $this->belongsTo('App\Models\Categories', 'category_id');
    }
}
