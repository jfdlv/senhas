<?php 
include 'modelo.php';
session_start();
$usuario = $_SESSION['usuario'];
$u = new usuario($usuario,null,null,null);
$data = $u->obtenerGcurv();
echo json_encode( $data );

?>