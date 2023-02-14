<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function pruebas(Request $request){//objeto request contendra informacion que le llega desde la peticion
        return "Accion de prueba de UserController";
    }
}
