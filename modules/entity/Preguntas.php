<?php 
/**
* 
*/
class Preguntas
{
	
	public function getPreguntas(){
		$pdo = ConnectDB::getInstance();
		$preguntas = $pdo->prepare("SELECT * FROM ej1_preguntas");
		$preguntas->execute();
		return $preguntas->fetchAll();
	}
	public function findById($id){
		$pdo = ConnectDB::getInstance();
		$pregunta = $pdo->prepare("SELECT * FROM ej1_preguntas WHERE id=:id");
		$pregunta->bindParam(":id",$id);
		$pregunta->execute();
		$pregunta=$pregunta->fetchAll();
		return $pregunta[0];
	}
}
 ?>