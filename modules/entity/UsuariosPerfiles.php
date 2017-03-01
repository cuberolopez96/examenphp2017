<?php 
/**
* 
*/
class UsuariosPerfiles
{
	public function findPerfilByUsuario($usuario){
		$pdo = ConnectDB::getInstance();
		$perfiles = $pdo->prepare("SELECT perfil FROM usuarioperfiles WHERE usuario = :usuario");
		$perfiles->bindParam(":usuario",$usuario);
		$perfiles->execute();
		return $perfiles->fetchAll();
	}
	
}
 ?>