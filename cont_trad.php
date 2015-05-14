<?php
// $arrEP = array('SUS','V','ART','SUS');//1
// $arrAct = array('ART','SUS','V','ART','SUS');//2
// $arrTrans = array('SUS','V','ART','SUS','PRP','ADP','SUS');//3
// $arrInTrans = array('SUS','V','PRP','SUS','ART','SUS','CCT');//4
include 'modelo.php';
session_start();
$frase=$_POST['frase'];
$a= new automata($frase,null,null,null);
$num=$a->idenAut();
$arret=$a->obArret();
print_r($arret);
if ($num==0) {
	//header("Location: traductor1.php?var=$num");
}
else
{
	$tr= new traductor($num,$t=$a->obTiempo(),$a->obArr());
	echo $num."<br>";
	$t=$a->obTiempo();
	echo $t."<br>";
	$arr=$a->obArr();
	print_r($arr);
	echo "<br>";
	$arret=$a->obArret();
	print_r($arret);
	echo "<br>";
	$imagenes=$tr->obtenerSenhas();
	print_r($imagenes);
	$_SESSION["imagenes"]=$imagenes;
	$_SESSION["palabras"]=$arr;
	$_SESSION["etiquetas"]=$arret;
	$_SESSION["frase"]=$frase;
	header("Location:traductor1.php");
}

// for ($i=0; $i < sizeof($imagenes) ; $i++) { 
// 	echo "<img src=$imagenes[$i]>";
// }
//print_r($imagenes);


?>
