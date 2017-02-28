<?php 
/**
* Clase que se encarga de  establecer la conexion con la base de datos 
*/
class ConnectDB
{
	
	private $pdo;
	private $instancia;
	function __construct()
	{
		$this->pdo = new PDO(DRIVER.':host='.HOST.';dbname='.DBNAME,USERNAME,PASSWORD);
	}
	public function getInstance(){
		if (!isset(self::$instancia)) {
			self::$instancia = new ConnectDB();
		}
		return self::$instancia;
	}
	public function prepare($consulta){
		return $this->pdo->prepare($consulta);
	}
	public function exec($consulta){
		return $this->pdo->exec($consulta);
	}
	

}
 ?>