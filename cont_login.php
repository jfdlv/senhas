<?php 
include'modelo.php';
$u = new usuario($_POST['usuario'],null,null,null);
$result = $u->obtenerUsuario();
if (password_verify($_POST['pass'],$result['password'])) {
	session_start();
	$_SESSION['usuario']=$_POST['usuario'];
	$_SESSION['nombre']=$result['nombre'];
	header("Location: index.php");
	
} else {
	echo 'contraseña incorrecta';
}
?>