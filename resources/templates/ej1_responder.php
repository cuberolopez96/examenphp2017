<?php  
comprobarPermisosPerfil("EJ1");
if(!isset($_GET['id'])){
	header("location: index.php?page=EJ1");
}
$id = cleanInput($_GET['id']);
$pregunta = Preguntas::findById($id);
?>
<header>
	<h3> responder Pregunta</h3>
</header>
<div class="header">
	<h4><?php echo $pregunta['pregunta'] ?></h4>
</div>
<?php 
switch ($pregunta['tipo']) {
	case 'TEXT':
		require_once "resources/components/textform.php";
		break;
	case 'CHECK':
		require_once "resources/components/checkform.php";
		break;
	case 'LIST':
		require_once "resources/components/selectform.php";
		break;
	
	default:
		# code...
		break;
}
 ?>