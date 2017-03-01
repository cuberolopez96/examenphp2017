<?php 
comprobarPermisosPerfil("EJ1");
if(!isset($_GET['id'])){
	header("Location: index.php?page=EJ1");

} 
$id=cleanInput($_GET['id']);
$pregunta = Preguntas::findById($id);
$respuestas = Respuestas::findByPregunta($id);

?>
<header>
	<h3><?php echo $pregunta['pregunta'] ?></h3>
</header>
<div class="container">
	<ul class="collection">
		<?php foreach ($respuestas as $key => $respuesta): ?>
			<li><?php echo $respuesta['respuesta']; ?></li>
		<?php endforeach ?>
	</ul>
</div>
