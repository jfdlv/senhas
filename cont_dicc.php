<?php
include 'modelo.php';
session_start();
$palabra=$_POST['palabra'];
$a= new automata(null,null,null,null);
$etiqueta=$a->idenEti($palabra);
$s=new senha(null,null,null,null);
$imagen="";
switch ($etiqueta) {
	case 'SUS':
		$imagen=$s->obSus($palabra);
		break;
	case 'V':
		$imagen=$s->obV($palabra);
		if(empty($imagen)){
		$imagen=$s->obVi($palabra);
		echo $imagen;
		}
		break;
	case 'ART':
		$imagen=$s->obArt($palabra);
		break;
	case 'PRP':
		$imagen=$s->obPrp($palabra);
		break;
	case 'ADP':
		$imagen=$s->obAdp($palabra);
		break;
	case 'CCT':
		$imagen=$s->obCct($palabra);
		break;
	case 'ADV':
		$imagen=$s->obAdv($palabra);
		break;
	case 'ADJ':
		$imagen=$s->obAdj($palabra);
		break;
	case 'ITG':
		$imagen=$s->obItg($palabra);
		break;
	case 'PRN':
		$imagen=$s->obPrn($palabra);
		break;
}
$_SESSION["imagen"]=$imagen;
$_SESSION["palabra"]=$palabra;
header("Location:diccionario.php");

?>
