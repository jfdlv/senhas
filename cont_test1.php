<?php 
include'modelo.php';
session_start();
$a = array();
foreach($_POST as $nombre_campo => $valor){ 

   $a[$nombre_campo] = $valor;
}
$pregs=$_SESSION['pregs'];
$idt=$_SESSION['testid'];
$vals = array();
foreach ($pregs as $preg) {
	$p = new pregunta($preg['id'],$preg['desc']);
	$resps = $p -> obtenerRespuestas();
	$rs = array();
	foreach ($resps as $resp) {
		$key = "group".$resp['idr'];
		//echo $a[$key].'<br>';
		array_push($rs, $a[$key]);
	}
	print_r($rs);
	array_push($vals, $rs);
	echo "<br>";
}
$t = new test($idt,null,null,null);
$puntaje = $t -> evaluarTest($vals);
$_SESSION['puntaje']=$puntaje;
unset($_SESSION['pregs']);
unset($_SESSION['testid']);
unset($_SESSION['testnom']);
if (isset($_SESSION['usuario'])) {
	$t -> almacenarPuntaje($puntaje,$_SESSION['usuario']);
	header("Location: resultado.php");
} else {
	header("Location: resultado.php");
}


?>