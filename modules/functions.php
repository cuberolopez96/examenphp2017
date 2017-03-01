<?php 
/**
*fichero que guarda funciones necesarias para el correcto funcionamiento de la aplicacion
*
**/

function cargarVariablesSesion(){
	if(!isset($_SESSION['usuario'])){
		$_SESSION['usuario']="";
	}
	if(!isset($_SESSION['perfiles'])){
		$_SESSION['perfiles']=array();
	}
} 
function comprobarPermisosGenerales(){
	if(empty($_SESSION['usuario'])){
		header("Location: index.php?page=login");
	}
}
function comprobarPermisosPerfil($perfil){
	$bandera = false;
	foreach ($_SESSION['perfiles'] as $key => $perfilS) {
		if($perfil == $perfilS['perfil']){
			$bandera =true;
		}

	}
	if ($bandera ==false) {
		
		header("Location: index.php");
	}
}
function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
    '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }

?>
