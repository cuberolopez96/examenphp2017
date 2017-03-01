<?php 
$errors= array();
$opciones = OpcionesPreguntas::findByPregunta($id);
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
			<div class="error">
				<?php echo $error; ?>
			</div>
		<?php endforeach ?>
	</div>
		<form action="index.php?page=ej1_responder&id=<?php echo $id ?>" method="post">
			<select name="respuesta" id="">
				<?php foreach ($opciones as $key => $opcion): ?>
					<option value="<?php echo $opcion['opcion'] ?>">
						<?php echo $opcion['opcion'] ?>
					</option>

				<?php endforeach ?>
				<input type="submit" name="responder" value="responder">
			</select>
		</form>

</div>