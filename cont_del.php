<?php
include 'modelo.php';
session_start();
$palabra=$_POST['palabra'];
$_SESSION["palabra"]=$palabra;
header("Location:deletrear.php");

?>
