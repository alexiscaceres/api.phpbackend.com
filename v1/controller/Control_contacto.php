<?php

/**
 * Created by PhpStorm.
 * User: doris
 * Date: 29/06/2017
 * Time: 9:56 PM
 */
class ControlContacto {

    public function __construct() {
        require_once './model/Contacto.php';
    }

    public static function  post($request){

        $contacto = new Contacto();

        if (!empty($request)){
            throw new Exception("Error en URL", 400);
        }

        $body = file_get_contents('php://input');
        $jsonContacto = json_decode($body, true);

        if ($contacto->crear($jsonContacto)){

            http_response_code(200);
            $response = ["estado" => 201, "mensaje" => "Contacto creado"];
            return $response;

        }else{
            throw new Exception("Error al crear contacto", 400);
        }
    }


    public  static function get($request){

        $contacto = new Contacto();

        //obtener ids para buscar datos de contactos
        $ids = explode(',', $request[0] );

        $idUsuario = $ids[0];
        $idContacto = $ids[1];

        if (empty($idUsuario)){
            throw new Exception("Usuario vacio", 400);
        }

        $contactos =  $contacto->obtenerContactos($idUsuario, $idContacto);

        if (!empty( $contactos )){
            http_response_code(200);
            $response = ["estado" => 1, "contactos" => $contactos];
            return $response;

        }else{
            throw new Exception("Contactos no encontrado", 400);
        }
    }

    public static function put($request){

        $contacto = new Contacto();

        $body = file_get_contents('php://input');
        $jsonContacto = json_decode($body, true);

        $ids = explode(',', $request[0] );
        $idUser = $ids[0];
        $idContacto = $ids[1];

        if ( empty($idUser) || empty($idContacto) ){
            throw new Exception("ID Contacto no encontrado", 400);
        }

        if ( $contacto->actualizar($idUser, $idContacto, $jsonContacto)){

            http_response_code( 200 );
            $response = ["estado" => 1, "mensaje" => "Contacto Actualizado"];
            return $response;

        }else{
            throw new Exception("Error al actualizar contacto", 400);
        }

    }


}