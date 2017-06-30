<?php

/**
*
*/
class Usuario
{
	private $id;
	private $primerNombre;
	private $segundoNombre;
	private $primerApellido;
	private $segundoApellido;
	private $correo;
	private $fechaNacimiento;
	private $ciudad;
	private $direccion;
	private $numId;
	private $tipoId;
	private $telefono;
	private $ocupacion;
	private $contrasenha;
	
	public function __construct()
	{

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    /**
     * @param mixed $primerNombre
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    }

    /**
     * @return mixed
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * @param mixed $segundoNombre
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    }

    /**
     * @return mixed
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * @param mixed $primerApellido
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    }

    /**
     * @return mixed
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * @param mixed $segundoApellido
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getNumId()
    {
        return $this->numId;
    }

    /**
     * @param mixed $numId
     */
    public function setNumId($numId)
    {
        $this->numId = $numId;
    }

    /**
     * @return mixed
     */
    public function getTipoId()
    {
        return $this->tipoId;
    }

    /**
     * @param mixed $tipoId
     */
    public function setTipoId($tipoId)
    {
        $this->tipoId = $tipoId;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * @param mixed $ocupacion
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    }

    /**
     * @return mixed
     */
    public function getContrasenha()
    {
        return $this->contrasenha;
    }

    /**
     * @param mixed $contrasenha
     */
    public function setContrasenha($contrasenha)
    {
        $this->contrasenha = $contrasenha;
    }

	public function crear($usuario)
	{
	    $this->setPrimerNombre( $usuario['primerNombre'] ); //$usuario->primerNombre);
        $this->setSegundoNombre( $usuario['segundoNombre'] ); //$usuario->segundoNombre);
        $this->setPrimerApellido( $usuario['primerApellido'] ); //$usuario->primerApellido);
        $this->setSegundoApellido( $usuario['segundoApellido'] ); //$usuario->segundoApellido);
        $this->setCorreo( $usuario['correo'] ); //$usuario->correo);
        $this->setFechaNacimiento( $usuario['fechaNacimiento'] ); //$usuario->fechaNacimiento);
        $this->setCiudad( $usuario['ciudad'] ); //$usuario->ciudad);
        $this->setDireccion( $usuario['direccion'] ); //$usuario->direccion);
        $this->setNumId( $usuario['numId'] ); //$usuario->numId);
        $this->setTipoId( $usuario['tipoId'] ); //$usuario->tipoId);
        $this->setTelefono( $usuario['telefono'] ); //$usuario->telefono);
        $this->setOcupacion( $usuario['ocupacion'] ); //$usuario->ocupación);
        $this->setContrasenha( $usuario['contrasena'] ); //$usuario->contrasena);

        try {

            /** @var PDO $pdo */
            $pdo = ConnectBD::getInstance()->getBD();

            $sql = "INSERT INTO usuario ( primerNombre, segundoNombre ,
                                          primerApellido, segundoApellido,
                                          correo, contrasena, fechaNacimiento, 
                                          ciudad, direccion, numId, tipoId,
                                          telefono, ocupacion )
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $sqlPrepare = $pdo->prepare($sql);
            $sqlPrepare->bindParam(1, $this->getPrimerNombre());
            $sqlPrepare->bindParam(2, $this->getSegundoNombre());
            $sqlPrepare->bindParam(3, $this->getPrimerApellido());
            $sqlPrepare->bindParam(4, $this->getSegundoApellido());
            $sqlPrepare->bindParam(5, $this->getCorreo());
            $sqlPrepare->bindParam(6, $this->getContrasenha());
            $sqlPrepare->bindParam(7, $this->getFechaNacimiento());
            $sqlPrepare->bindParam(8, $this->getCiudad());
            $sqlPrepare->bindParam(9, $this->getDireccion());
            $sqlPrepare->bindParam(10, $this->getNumId());
            $sqlPrepare->bindParam(11, $this->getTipoId());
            $sqlPrepare->bindParam(12, $this->getTelefono());
            $sqlPrepare->bindParam(13, $this->getOcupacion());

            return $sqlPrepare->execute();

        }catch (PDOException $exception){
            throw new Exception("Error al crear usuario: ".$exception->getMessage() , 400 );
        }

	}

	public  function  ingresar($usuario){

        $this->setCorreo($usuario['correo']);
        $this->setContrasenha($usuario['contrasena']);

        try{

            /** @var PDO $pdo */
            $pdo = ConnectBD::getInstance()->getBD();

            $sql = 'SELECT contrasena FROM usuario WHERE correo = ?';

            $sqlPrepare = $pdo->prepare($sql);
            $sqlPrepare->bindParam(1, $this->getCorreo());

            $result = $sqlPrepare->execute();

            if ($result){

                $data = $sqlPrepare->fetch();

                if ( strcmp($this->getContrasenha(), $data['contrasena'] ) === 0 ){

                    return TRUE;

                }else{
                    return FALSE;
                }

            }else{
                return FALSE;
            }


        }catch (PDOException $exception){
            throw new Exception("Error al validar usuario", 400);

        }

    }

    /**
     * @param $usuario
     * @return mixed
     */
    public function actualizar($id, $usuario){

        //print_r($usuario);

        $this->setPrimerNombre( $usuario['primerNombre']); //$usuario->primerNombre);
        $this->setSegundoNombre( $usuario['segundoNombre']); //$usuario->segundoNombre);
        $this->setPrimerApellido( $usuario['primerApellido']); //$usuario->primerApellido);
        $this->setSegundoApellido( $usuario['segundoApellido']); //$usuario->segundoApellido);
        $this->setCorreo( $usuario['correo']); //$usuario->correo);
        $this->setFechaNacimiento( $usuario['fechaNacimiento']); //$usuario->fechaNacimiento);
        $this->setCiudad( $usuario['ciudad']); //$usuario->ciudad);
        $this->setDireccion( $usuario['direccion']); //$usuario->direccion);
        $this->setNumId( $usuario['numId']); //$usuario->numId);
        $this->setTipoId( $usuario['tipoId']); //$usuario->tipoId);
        $this->setTelefono( $usuario['telefono']); //$usuario->telefono);
        $this->setOcupacion( $usuario['ocupacion']); //$usuario->ocupación);
        $this->setContrasenha( $usuario['contrasena']); //$usuario->contrasena);

        try{

            /** @var PDO $pdo */
            $pdo = ConnectBD::getInstance()->getBD();

            $sql = 'UPDATE usuario SET primerNombre = ?,
                                       segundoNombre = ?,
                                       primerApellido = ?,
                                       segundoApellido = ?,
                                       correo = ?,
                                       fechaNacimiento = ?,
                                       ciudad = ?,
                                       direccion = ?,
                                       numId = ?,
                                       tipoId = ?,
                                       telefono = ?,
                                       ocupacion = ?
                                   WHERE idUsuario = ?';

            $sqlPrepare = $pdo->prepare($sql);
            $sqlPrepare->bindParam(1, $this->getPrimerNombre());
            $sqlPrepare->bindParam(2, $this->getSegundoNombre());
            $sqlPrepare->bindParam(3, $this->getPrimerApellido());
            $sqlPrepare->bindParam(4, $this->getSegundoApellido());
            $sqlPrepare->bindParam(5, $this->getCorreo());
            $sqlPrepare->bindParam(6, $this->getFechaNacimiento());
            $sqlPrepare->bindParam(7, $this->getCiudad());
            $sqlPrepare->bindParam(8, $this->getDireccion());
            $sqlPrepare->bindParam(9, $this->getNumId());
            $sqlPrepare->bindParam(10, $this->getTipoId());
            $sqlPrepare->bindParam(11, $this->getTelefono());
            $sqlPrepare->bindParam(12, $this->getOcupacion());
            $sqlPrepare->bindParam(13, $id);

            return $sqlPrepare->execute();

        }catch (PDOException $exception ){
            throw new Exception("Error al actualizar usuario", $exception->getCode());
        }

    }


    public function obtener($id){

        try{

            /** @var PDO $pdo */
            $pdo = ConnectBD::getInstance()->getBD();

            $sql = 'SELECT * FROM usuario WHERE idUsuario = ? LIMIT 1';

            $sqlPrepare = $pdo->prepare($sql);
            $sqlPrepare->bindParam(1, $id);
            $result = $sqlPrepare->execute();

            if ($result){

                $data = $sqlPrepare->fetch(PDO::FETCH_ASSOC);

                $this->id = $data['idUsuario'];
                $this->setPrimerNombre($data['primerNombre']);
                $this->setSegundoNombre($data['segundoNombre']);
                $this->setPrimerApellido($data['primerApellido']);
                $this->setSegundoApellido($data['segundoApellido']);
                $this->setCorreo($data['correo']);
                $this->setFechaNacimiento($data['fechaNacimiento']);
                $this->setCiudad($data['ciudad']);
                $this->setDireccion($data['direccion']);
                $this->setNumId($data['numId']);
                $this->setTipoId($data['tipoId']);
                $this->setTelefono($data['telefono']);
                $this->setOcupacion($data['ocupacion']);
                $this->setCorreo($data['correo']);
                return $data;
            }

        }catch (PDOException $exception ){
            throw new Exception("Error al buscar usuario", $exception->getCode());
        }
    }
}

?>