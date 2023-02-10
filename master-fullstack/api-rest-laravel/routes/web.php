<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebasController; //necesario invocar el controlador que vayamos a utilizar

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//VIEW FUNCION QUE DEVUELVE LA VISTA, CODIGO HTML PORGRAMADO EN RESOURCES/VIEWS
Route::get('/', function () { //http://localhost/master-fullstack/api-rest-laravel/public/ o al crear servidor virtual: http://api-rest-laravel.com.devel/master-fullstack/api-rest-laravel/public/
    return view('welcome');
});

Route::get('/helloworld', function () { //http://localhost/master-fullstack/api-rest-laravel/public/helloworld
    return "<h1> WELCOME TO WORLD <h1>";
});

Route::get('/pruebas/{nombre?}{apellido?}', function ($nombre=null,$apellido=null) { // PARAMETRO OBLIGATORIO: '/pruebas/{nombre}', function ($nombre) 
    $texto = '<h2>TEXTOS DESDE UNA RUTA</h2>';             // PARAMETRO OPCIONAL:   '/pruebas/{nombre?}', function ($nombre=null)
    $texto .= "nombre: ".$nombre." apellido: ".$apellido;                          // http://api-rest-laravel.com.devel/master-fullstack/api-rest-laravel/public/pruebas/jofuto siendo este ultimo el parametro 
    
    //return $texto
    return view('pruebas',array(                           //ahora en vez de imprimir a cañon utilizaremos una vista a la que le pasaremos un array con un indice ´texto´ que contiene la variable texto que imprimiamos a cañon antes
        'texto' => $texto
    ));
});


//Route::get('/animales' , [PruebasController::class, 'index']); //creamos una ruta pero en vez de pasarle una funcion anonima, callback, le pasaremos la direccion del controlador que hemos definido y el metodo que ejecutara
Route::get('/animales' , 'App\Http\Controllers\PruebasController@index');
