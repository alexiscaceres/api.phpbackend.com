
<?php  

require_once 'controller/control_usuario.php';
require_once 'utils/connectBD.php';
require_once 'view/viewJson.php';

//print ConnectBD::getInstance()->getBD()->errorCode();
const ESTADO_URL_INCORRECTA = 2;
const ESTADO_EXISTENCIA_RECURSO = 3;
const ESTADO_METODO_NO_PERMITIDO = 4;

$vista = new ViewJson();

// manejador de excepciones
set_exception_handler(function ($exception) use ($vista){
			$msjException = array( "estado"  => $exception->getCode(),
								   "mensaje" => $exception->getMessage());

			if ($exception->getCode()) {
				$vista->setEstado($exception->getCode());			
			} else {
				$vista->setEstado(500);
			}
			$vista->getJson($msjException);
		}); 

// extraer URL
if (isset($_GET['PATH_INFO'])) {

	$peticion = explode('/', $_GET['PATH_INFO']);
	$method = strtolower($_SERVER['REQUEST_METHOD']);
	$control = strtolower(array_shift($peticion));

    switch ($control) {
        case 'usuarios':
            $controlUsuario = new controlUsuario();
            $vista->getJson($controlUsuario::$method($peticion));
            break;

        case 'contactos':

        default:
        phpinfo();
            break;
    }

}else {
	//throw new Exception(ESTADO_URL_INCORRECTA, utf8_encode("URL Erronea"));

}



?>