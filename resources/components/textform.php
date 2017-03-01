<?php
$errors=array(); 
if (isset($_POST['responder'])) {
	$bandera = true;
	if(!isset($_POST['respuesta'])){
		$errors[]="Escriba la respuesta";
		$bandera = false;
	}
	if($bandera == true){
		$respuesta = cleanInput($_POST['respuesta']);
		try {
			Respuestas::insertarRespuesta($respuesta,$pregunta['id']);
			header("Location: index.php?page=ej1_show&id=$id");
		} catch (Exception $e) {
			$errors[]= $e->getMessage();
		}
	}
}
 ?>
<div class="container">
	<div class="errores">
		<?php foreach ($errors as $key => $error): ?>
			<div class="error"><?php echo $error ?></div>
		<?php endforeach ?>
	</div>
	<form action="index.php?page=ej1_responder&id=<?php echo $id ?>" method="post">
		<label for="">Respuesta</label>
		<input type="text" name="respuesta">
		<input type="submit" name="responder">
	</form>
</div>