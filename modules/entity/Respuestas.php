<?php  
/**
* 
*/
class Respuestas 
{
	
	public function insertarRespuesta($respuesta,$idpregunta){
		$pdo = ConnectDB::getInstance();
		$consulta = $pdo->prepare("INSERT INTO ej1_respuestas(respuesta,idpregunta) VALUES(:respuesta,:idpregunta)");
		$consulta->bindParam(":respuesta",$respuesta);
		$consulta->bindParam(":idpregunta",$idpregunta);
		$consulta->execute();
		return $consulta->fetchAll();
	}
	public function findByPregunta($idpregunta){
		$pdo = ConnectDB::getInstance();
		$preguntas = $pdo->prepare("SELECT * FROM ej1_respuestas WHERE idpregunta = :idpregunta");
		$preguntas->bindParam(":idpregunta",$idpregunta);
		$preguntas->execute();
		return $preguntas->fetchAll();
	}
}
?>