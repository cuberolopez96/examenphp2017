<?php 
unset($_SESSION['usuario']);
unset($_SESSION['perfiles']);
session_destroy();
header("Location: index.php");
 ?>