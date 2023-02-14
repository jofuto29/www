<?php

//LOS CONTROLADORES LOS USAREMOS PARA AGRUPAR PETICIONES RELACIONADAS CON UNA MISMA CLASE, Y DIVIDIREMOS EN VARIOS METROS
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//EJEMPLO USANDO LA BASE DE DATOS --> importamos los modelos que vamos a gastar:
use App\Models\Posts;
use App\Models\Categories;
use App\Models\User;

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


    public function testORM(){
        
        /*
        $posts = Posts::all();//traemos toda la infarmacion de los registros que tenemos en la tabla post
        //var_dump($posts);

        foreach($posts as $post){//vamos a recorrer todos los registros
            echo '<h1>'.$post->title.'</h1>'; //sacamos el titulo del post
            echo '<p>'.$post->content.'<p>'; //sacamos el contenido y el id
            echo '<p>'.$post->id.'<p>';
            //peor ahora queremos sacar el usuario que lo publico y la categorya a la que perteneces, haremos uso de la claves foraneas que habiamos programado

            //para ello vamos a llamar a los metodos que hemos creado
            echo "<p style='color:gray;'>{$post->user->name}</p>";
            echo "<p>{$post->category->name}</p>";

            echo "<hr>";
        }
        */

        //lo mismo podriamos hacer con el modelo categorias
        $categories = Categories::all();
        foreach($categories as $category){
            echo "<h1>{$category->name}</h1>";
            
            foreach($category->posts as $post){ //llamamos a la función post --------del modelo category, eloquent en orm lo convierte en una propied-------- y por eso podemos usar esta sintaxis
              echo "<h3>".$post->title."</h3>";
              echo "<span style='color:gray;'>{$post->user->name} - ------------------------ {$post->category->name}</span>";
              echo "<p>".$post->content."</p>";
            }
            echo '<hr>';
            

        }
        
        die(); //no pide ninguna vista y corta la ejecucion del programa
    }


}
//ahora para ver este controlador en ejecucion deberemos definir una ruta donde se ejecute, de nuevo iremos a web crearemos una ruta pero esta vez sin funcion anonima, ir para ver

/*
A modo de resumen, un controlador es la parte que se encarga de recibir datos desde las vistas, y hacer cierta logica mediante estos datos y los que solicite a los modelos
GENERAR CONTROLADOR --> php artisan make:controller nombre
*/






?>



