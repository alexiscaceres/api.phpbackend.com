<?php

/**
* 
*/
class ViewJson 
{	
	private $estado;

	public function __construct($estado = 400)
	{	
		$this->estado = $estado;
	}

    public function getEstado(){
    	return $this->estado;
    }

    public function setEstado($estado){
    	$this->estado = $estado;
    }

	public function getJson($json){

        //http_response_code($this->estado);
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($json, JSON_PRETTY_PRINT);
        exit;
	}
}

?>