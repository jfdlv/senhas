<?php 
include 'modelo.php';
session_start();
$usuario = $_POST["user"];
$password = $_POST["pass"];
$nombre = $_POST["nombres"];
$apellido = $_POST["apellidos"];
$u = new usuario($usuario,$password,$nombre,$apellido);
$u -> altaUsuario();
$_SESSION["usuario"] = $usuario;
$_SESSION["nombre"] = $nombre;
header("Location: index.php");
?>