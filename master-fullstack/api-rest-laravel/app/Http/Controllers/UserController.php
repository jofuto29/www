<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Libreria validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

//base de datos
use App\Models\User;

//use App\helpers\jwtAuth; --> no sera necesario dado que tenemos el alias declarado

class UserController extends Controller
{
    public function pruebas(Request $request){//objeto request contendra informacion que le llega desde la peticion
        return "Accion de prueba de UserController";
    }

    public function register(Request $request){//objeto request contendra informacion que le llega desde la peticion
        
        //recogemos los datos de usaurios por post
        $json = $request->input("json", null);//en caso de no recibir nada el valor sera por defecto null

        $params = json_decode($json);//tranformamos en objeto el json
            //var_dump($params->name); die();//accedemos al parametro name del objeto descodificado

        $params_array = json_decode($json, true);//tranformamos en array en json
            //var_dump($params_array["name"]); die();

        //validar los usuario (required: campo no vacio \\\ alpha: campo alfanumerico unicamente)
        if(!empty($params_array)){//si no esta vacio

            $params_array = array_map('trim', $params_array);//limpiar espacios delante y detras

            //comprobar si el usuario ya esta registrado(duplicado) --> esto lo haremos mediante otra propiedad de validation, unique
            $validate = Validator::make($params_array,[
                'name' => 'required|alpha|unique:users',
                'surname' => 'required|alpha',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);

            if($validate->fails()){
                $data = array(
                    'status' => 'error',
                    'code'   => 400,
                    'mensaje'=> 'el usuario no se a creado correctamente',
                    'errors' => $validate->errors()
                );
            }else{
                //cifrar la contraseña
                $pwd = password_hash($params_array["password"], PASSWORD_BCRYPT, ['cost' => 4]);//(obbjeto, algoritmo_encripotacion, veces que se repite)
                //password_hash($params->password, PASSWORD_BCRYPT, ['cost' => 4]);

                //crear el usuario
                $user = new User();//no distinque mayusculas y minusculas
                $user->name = $params_array['name'];
                $user->surname = $params_array['surname'];
                $user->email = $params_array['email'];
                $user->password = $pwd;
                $user->role = "ROLE_USER";

                //guardamos en base de datos
                $user->save();

                $data = array(
                    'status' => 'ok',
                    'code'   => 200,
                    'mensaje'=> 'el usuario se a creado correctamente',
                    'user' => $user
                );
            }
        }else{
            $data = array(
                'status' => 'error',
                'code'   => 400,
                'mensaje'=> 'los datos enviados no son correctos',
                'errors' => $validate->errors()
            );
        }

        return response()->json($data, $data['code']);
       
    }

    public function login(Request $request){//objeto request contendra informacion que le llega desde la peticion
    
        $jwtAuth = new \jwtAuth();
        echo $jwtAuth->pruebas();


        return "Accion de prueba de login UserController enviada por:";
    }
                            

}
