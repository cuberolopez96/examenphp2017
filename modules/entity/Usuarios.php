<?php 
/**
* 
*/
class Usuarios
{
	public function Login($usuario,$password){
		$pdo = ConnectDB::getInstance();
		$login = $pdo->prepare("SELECT * FROM usuarios WHERE usuario= :usuario and  pwd = PASSWORD(:password)");
		$login->bindParam(":usuario",$usuario);
		$login->bindParam(":password",$password);
		$login->execute();
		$usuario = $login->fetchAll();
		if (count($usuario)==0) {
			throw new Exception("usuario/contraseña incorrectos", 1);
			
		}else{
			return $usuario[0];
		}

	}
}
 ?>