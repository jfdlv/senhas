<?php 
include 'modelo.php';
session_start();
$u = new usuario($_SESSION['usuario'],null,null,null);
$_SESSION['notas']= $u->obtenerPintento($_SESSION['idt']);
header("location: intentos.php")
?>