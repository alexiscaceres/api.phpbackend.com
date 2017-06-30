<?php

/**
 * Created by PhpStorm.
 * User: Diego Cáceres
 * Date: 29/06/2017
 * Time: 9:57 PM
 */
class Contacto
{
    private $idUsuario;
    private $idContacto;
    private $fecha;
    private $hora;
    private $lugar;
    private $activa;

    /**
     * Contacto constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdContacto()
    {
        return $this->idContacto;
    }

    /**
     * @param mixed $idContacto
     */
    public function setIdContacto($idContacto)
    {
        $this->idContacto = $idContacto;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * @param mixed $lugar
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }

    /**
     * @return mixed
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * @param mixed $activa
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;
    }

    public function crear($contacto){

        $this->setIdUsuario($contacto['idUsuario']);
        $this->setIdContacto($contacto['idContacto']);
        $this->setFecha($contacto['fecha']);
        $this->setHora($contacto['hora']);
        $this->setLugar($contacto['lugar']);
        $this->setActiva(TRUE);

        try{

            $pdo = ConnectBD::getInstance()->getBD();

            $sql = "INSERT INTO libreta ( idUsuario1, idUsuario2 ,
                                          fecha, hora, lugar,
                                          activa )
                                VALUES (?, ?, ?, ?, ?, ?)";

            $sqlPrepare = $pdo->prepare($sql);
            $sqlPrepare->bindParam(1, $this->getIdUsuario());
            $sqlPrepare->bindParam(2, $this->getIdContacto());
            $sqlPrepare->bindParam(3, $this->getFecha());
            $sqlPrepare->bindParam(4, $this->getHora());
            $sqlPrepare->bindParam(5, $this->getLugar());
            $sqlPrepare->bindParam(6, $this->getActiva());

            return $sqlPrepare->execute();

        }catch (PDOException $exception){
            throw new Exception("Error al crear contaco: ".$exception->getMessage() , 400 );
        }
    }

    public function actualizar($contacto){

    }

    public function obtenerContactos($idUsario, $idContacto = NULL){

        try{

            $pdo = ConnectBD::getInstance()->getBD();

            if (is_null($idContacto)){
                $sql = "SELECT * FROM libreta WHERE idusuario1 = ?";
            } else {
                $sql = "SELECT * FROM libreta WHERE idusuario1 = ?
                                                AND idusuario2 = ?";
            }

            $sqlPrepare = $pdo->prepare($sql);
            $sqlPrepare->bindParam(1, $idUsario);

            if (!is_null($idContacto)){
                $sqlPrepare->bindParam(2, $idContacto);
            }

            if ( $sqlPrepare->execute() ){

                $contactos = $sqlPrepare->fetchAll(PDO::FETCH_ASSOC );
                return $contactos;

            }else{
                throw new Exception("No se encuentran contactos: ", 201 );
            }

        }catch (PDOException $exception){
            throw new Exception("Error al consltar contactos: ".$exception->getMessage() );
        }
    }
}