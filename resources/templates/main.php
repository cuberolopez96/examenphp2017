<?php 
comprobarPermisosGenerales();
 ?>
<header>
	<h3>Examen PHP</h3>
</header>
<div class="header">
	<h4>Bienvenido <?php echo $_SESSION['usuario']['usuario']; ?> <a href="index.php?page=logout">Salir</a></h4>
</div>
<div class="container">
	<nav>
		<ul>
			<?php foreach ($_SESSION['perfiles'] as $key => $perfil): ?>
				<li><a href="index.php?page=<?php echo $perfil['perfil'] ?>"><?php echo $perfil['perfil'] ?></a></li>
			<?php endforeach ?>
		</ul>
	</nav>
</div>