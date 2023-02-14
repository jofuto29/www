<?php

//deberemos carga primero de todo el namespace donde se ubica el archivo para que pueda ser acesible
namespace App\helpers;

use Firebase\JWT\JWT;

//consulta a la base de datos
use Illuminate\Support\Facades\DB;
use App\Models\User;

class jwtAuth{

    public function pruebas(){
        return "prueba jwtAuth";
    }


    public function signup(){
            //buscar si extiste el usuario con las credenciales pasadas

            //comprobar si estas credenciales son correctas, es decir nos devuelve un objeto

            //generar el token con los datos del suaurio identificado

            //devolver los datos descodificados o el token, en funcion de un parametro
            return "hola";
    }




}

?>