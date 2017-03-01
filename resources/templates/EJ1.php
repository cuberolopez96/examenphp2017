<?php 
comprobarPermisosPerfil("EJ1");
$preguntas = Preguntas::getPreguntas();
 ?>
 <header>
 	<h3>Ejercicio 1</h3>
 </header>
 <div class="header">
 	<h4>Bienvenido <?php echo $_SESSION['usuario']['usuario'] ?> | <a href="index.php?page=logout">Salir</a></h4>
 </div>
 <div class="container">
 	<table>
 		<tr>
 			<th>Pregunta</th>
 			<th></th>
 			<th></th>
 		</tr>
 		<?php foreach ($preguntas as $key => $pregunta): ?>
 			<tr>
 				<td><?php echo $pregunta['pregunta']; ?></td>
 				<td><a href="index.php?page=ej1_responder&id=<?php echo $pregunta['id'] ?>">Responder</a></td>
 				<td><a href="index.php?page=ej1_show&id=<?php echo $pregunta['id'] ?>">Ver</a></td>
 			</tr>
 		<?php endforeach ?>

 	</table>
 </div>