<?php 
include 'modelo.php';
session_start();
$idt = $_SESSION['idt'];
$usuario = $_SESSION['usuario'];
$u = new usuario($usuario,null,null,null);
$data = $u->obtenerPcurv($idt);
echo json_encode( $data );

?>