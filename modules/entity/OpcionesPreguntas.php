<?php /**
* 
*/
class OpcionesPreguntas
{
	
	public function findByPregunta($id){
		$pdo = ConnectDB::getInstance();
		$opciones = $pdo->prepare("SELECT * FROM ej1_opcionespreguntas WHERE idpregunta=:id ");
		$opciones->bindParam(":id",$id);
		$opciones->execute();
		return $opciones->fetchAll();
	}
} ?>