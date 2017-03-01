<?php
	$errors = array();

if (isset($_POST['login'])) {
	$bandera = true;
	if(!isset($_POST['usuario'])){
		$errors[]="Escriba el Usuario";
		$bandera = false;
	}
	if(!isset($_POST['password'])){
		$errors[]="Escriba la password";
		$bandera = false;
	}
	if($bandera ==true){
		$usuario = cleanInput($_POST['usuario']);
		$password = cleanInput($_POST['password']);
		try {
			$_SESSION['usuario']=Usuarios::Login($usuario,$password);
			$_SESSION['perfiles']=UsuariosPerfiles::findPerfilByUsuario($usuario);

			header("Location: index.php");
		} catch (Exception $e) {
			$errors[]= $e->getMessage();
		}
	}
}
 ?>
<header>
	<h3>Login</h3>
</header>
<div class="container">
	<div class="errores">
		<?php foreach ($errors as $key => $error): ?>
			<div class="error">
				<?php echo $error; ?>
			</div>
		<?php endforeach ?>
	</div>
	<form action="index.php?page=login" method="post">
		<label for="">Usuario</label>
		<input type="text" name="usuario">
		<label for="">Password</label>
		<input type="password" name="password">
		<input type="submit" name="login" value="login">
	</form>
</div>