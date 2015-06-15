<?php 
include 'modelo.php';
session_start();
$var=$_SESSION['met'];
$_SESSION['idt']=$_POST['id'];
$_SESSION['nombret']=$_POST['nombre'];
if ($var == 'int') {
	header("Location: cont_int.php");
}
elseif ($var == 'des') {
	header("Location: cont_des.php");
}
elseif ($var == 'global') {
	header("Location: cont_global.php");
}

?>