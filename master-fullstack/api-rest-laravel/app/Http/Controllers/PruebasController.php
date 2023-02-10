<?php

//LOS CONTROLADORES LOS USAREMOS PARA AGRUPAR PETICIONES RELACIONADAS CON UNA MISMA CLASE, Y DIVIDIREMOS EN VARIOS METROS
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//de igual manera que en la rutas podiamos pasar parametros a una vista, podemos hacer lo mismo con los controladores
class PruebasController extends Controller
{

    public function index(){
        $titulo = 'Animales';
        $animales = ['perro','gato','tigre'];

        return view('pruebas.index', array(//en vez de usar barras usamos punto en este caso, el archivo index sera el que tenga la vista dentro de la carpeta pruebas
            'titulo'   => $titulo,
            'animales' => $animales
        ));
        //esta vista utilizaremos blade no php para mostrar la informacion en el navegador, para observarlo ir a la vista index dentro de la carpeta pruebas
        //lo que le estamos pasando igual que antes es un array con un par de elementos indexado con dos indices, titulo y animales
    }

}
//ahora para ver este controlador en ejecucion deberemos definir una ruta donde se ejecute, de nuevo iremos a web crearemos una ruta pero esta vez sin funcion anonima, ir para ver
?>
