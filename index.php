<?php 
session_start();
require_once "modules/config.php";
require_once "modules/functions.php";
require_once "modules/entity/ConnectDB.php";
require_once  "modules/entity/Usuarios.php";
require_once "modules/entity/UsuariosPerfiles.php";
require_once "modules/entity/Preguntas.php";
require_once "modules/entity/OpcionesPreguntas.php";
require_once "modules/entity/Respuestas.php";
require_once "modules/entity/Marcadores.php";
cargarVariablesSesion();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link rel="stylesheet" href="resources/css/init.css">
 	<script src="resources/js/init.js"></script>
 </head>
 <body>
 	<div>
 		<?php require_once "modules/route.php"; ?>
 	</div>
 </body>
 </html>