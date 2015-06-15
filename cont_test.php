<?php 
include'modelo.php';
session_start();
$test = new test($_POST['id'],null,null,null);
$pregs = $test->obtenerPreguntas();
$_SESSION['testid']=$_POST['id'];
$_SESSION['testnom']=$_POST['nombre'];
$_SESSION['pregs'] = $pregs;
header("Location: test.php");
?>