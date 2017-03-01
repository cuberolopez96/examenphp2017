<?php 

/**
* 
*/
class Marcadores 
{
	
	public function getMarcadores(){
		$pdo = ConnectDB::getInstance();
		$marcadores = $pdo->prepare("SELECT * FROM ej2_marcadores");
		$marcadores->execute();
		return $marcadores->fetchAll();
	}
	public function insertar($marcador,$usuario){
		$pdo= ConnectDB::getInstance();
		$consulta = $pdo->prepare("INSERT INTO ej2_marcadores(marcador,usuario) VALUES(:marcador,:usuario)");
		$consulta->bindParam(":marcador",$marcador);
		$consulta->bindParam(":usuario",$usuario);
		$consulta->execute();
		return $consulta->fetchAll();
	}
	public function findByUsuario($usuario){
		$pdo = ConnectDB::getInstance();
		$marcadores = $pdo->prepare("SELECT * FROM ej2_marcadores WHERE usuario=:usuario");
		$marcadores->bindParam(":usuario",$usuario);
		$marcadores->execute();
		return $marcadores->fetchAll();
	}
	public function findByMarcador($marcador){
		$pdo = ConnectDB::getInstance();
		$marcadores = $pdo->prepare("SELECT * FROM ej2_marcadores WHERE marcador = :marcador");
		$marcadores->bindParam(":marcador",$marcador);
		$marcadores->execute();
		return $marcadores->fetchAll();
	}
	public function getRecomendados(){
		$marcadores = self::getMarcadores();
		$recomendados = array();
		foreach ($marcadores as $key => $marcador) {
			if(count(self::findByMarcador($marcador['marcador']))>2){
				if (!in_array($marcador['marcador'], $recomendados)) {
					$recomendados[] = $marcador['marcador'];
				}
			}
		}
		return $recomendados;
	}
}
 ?>