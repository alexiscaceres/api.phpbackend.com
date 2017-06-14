<?php

/**
* 
*/
class ControlUsuario
{

	public function __construct()
	{
		require_once './model/usuario.php';
	}


	/*obtener la acción a realizar en la petición a usuarios*/
	public static function post($request){

        $usuario = new Usuario();

        $body = file_get_contents('php://input');
        $jsonUsuario = json_decode($body);

		$action = strtolower($request[0]);

		switch ($action) {
			case 'create':

                if ($usuario->crear($jsonUsuario)) {

                    http_response_code(200);
                    $response = ["estado" => 201, "mensaje" => "Usuario creado"];
                    return $response;

                }else{
                    throw new Exception("Error al crear usuario", 400 );
                }

				break;
			
			case 'login':
                if ($usuario->ingresar($jsonUsuario)) {

                    http_response_code(200);
                    $response = ["estado" => 1, "mensaje" => "Usuario conectado"];
                    return $response;

                }else{
                    throw new Exception("Error al validar usuario", 400);
                }

				break;

            case 'get':


			default:
				throw new Exception("acción no permitida", 400);
				break;
		}

	}

	public  static  function  put($request){

        $usuario = new Usuario();

        $body = file_get_contents('php://input');
        $jsonUsuario = json_decode($body);

        if ( $usuario->actualizar($jsonUsuario)){
            http_response_code(200);

            $response = ["estado" => 1, "mensaje" => "Usuario Actualizado"];
            return $response;

        }else{
            throw new Exception("Error al actualizar usuario", 400);
        }



    }

}

?>