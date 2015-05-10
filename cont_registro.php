<?php 
include 'modelo.php';
$usuario = $_POST["user"];
$password = $_POST["pass"];
$nombre = $_POST["nombres"];
$apellido = $_POST["apellidos"];
$u = new usuario($usuario,$password,$nombre,$apellido);
$u -> altaUsuario();
header("Location: index.php");
?>