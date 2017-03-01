<?php 
comprobarPermisosPerfil("EJ2");
$marcadores = Marcadores::getRecomendados();

$errors = array();
if (isset($_POST['guardar'])) {
	$bandera = true;
	if(!isset($_POST['marcador'])){
		$bandera = false;
	}
	if($bandera == true){
		try {
			foreach ($_POST['marcador'] as $key => $marcador) {
		

				Marcadores::insertar($marcador,$_SESSION['usuario']['usuario']);
			}

		} catch (Exception $e) {
			
		}
	}
}
$mismarcadores = Marcadores::findByUsuario($_SESSION['usuario']['usuario']);
 ?>
<header>
	<h3> Ejercicio 2</h3>
</header>
<div class="header">
	<h4>Bienvenido <?php echo $_SESSION['usuario']['usuario'] ?> | <a href="index.php?page=logout">salir</a></h4>
</div>
<div class="container">
	<div class="header">
		<h4>Mis Enlaces</h4>
	</div>
	<ul class="collection">
		<?php foreach ($mismarcadores as $key => $marcador): ?>
			<li><a href="<?php echo $marcador['marcador'] ?>"><?php echo $marcador['marcador']; ?></a></li>
		<?php endforeach ?>
	</ul>


</div>
<div class="container">
	<div class="header">
		<h4>Enlaces Recomendados</h4>

	</div>
	<form action="index.php?page=EJ2" method="post">
		<ul class="collection">
			<?php foreach ($marcadores as $key => $marcador): ?>
				<li><input type="checkbox" name="marcador[]" value="<?php echo $marcador ?>"><label for=""><?php echo $marcador; ?></label></li>
			<?php endforeach ?>
		</ul>
		<input type="submit" name="guardar" value="guardar">
	</form>
</div>