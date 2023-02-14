<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //muchos post pueden pertener a un usuario, mediante belongsto y utlizando el atributo que relaciona en esta tabla con la otra
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //sacame el objeto relacionado con category_id perteneciente al modelos categories(muchos post pueden pertenecer a una categoria)
    public function category(){
        return $this->belongsTo('App\Models\Categories', 'category_id');
    }


    /*
    Es el unico que contiene las claves foraneas que relaciona cada una de las tablas, los demas solo tiene clave primaria

    CONSTRAINT fk_post_user FOREIGN KEY(user_id) REFERENCES users(id),--clave ajena relacionada con el campo user_id y el campo de la tabla users id
    CONSTRAINT pk_post_category PRIMARY KEY(category_id) REFERENCES categories(id)
    */
}
