<?php  
$opciones= OpcionesPreguntas::findByPregunta($id);
$errors = array();
if(isset($_POST['responder'])){
	$bandera = true;
	if(!isset($_POST['respuesta'])){
		$errors[]= "escribe la respuesta";
		$bandera = false;
	}
	if($bandera == true){
		$respuesta = cleanInput($_POST['respuesta']);
		try {
			Respuestas::insertarRespuesta($respuesta,$id);
			header("Location: index.php?page=text_show&id=$id");
		} catch (Exception $e) {
			$errors[]=$e->getMessage();
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
		<?php foreach ($opciones as $key => $opcion): ?>
			<input type="radio" name="respuesta" value="<?php echo $opcion['opcion']; ?>">
			<label for=""><?php echo $opcion['opcion'] ?></label>

		<?php endforeach ?>
		<input type="submit" name="responder" value="responder">
	</form>
</div>