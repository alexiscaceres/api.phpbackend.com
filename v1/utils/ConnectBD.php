<?php 

require_once './model/mysql_config.php';

/**
* 
*/
class ConnectBD
{
	private static $db = null;
	private static $pdo = null;

	final private function __construct( )
	{
		try {
			
			self::getBD();

		} catch (PDOException $e) {
			
		}
	}

	public static function getInstance(){

		if (self::$db === null ) {
			self::$db = new self();
		}
		return self::$db;
	}

	public function getBD( ){

		if (self::$pdo == null) {

			self::$pdo = new PDO(
				'mysql:dbname=' . DB_NAME. ';'.
				'host=' . DB_HOST . ';',
				DB_USER,
				DB_PASSWORD,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" )
				);

			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$pdo;

	}


	final protected function __clone( ) {

	}

	function _destructor() {
		self::$pdo = null;
	}
}

