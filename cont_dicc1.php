<?php 
include 'modelo.php';
session_start();
$letra = $_POST['optradio'];
$s = new senha(null,null,null,null);
$a = $s->obAlf($letra);
print_r($a[1]);
while ($result = mysqli_fetch_array($a[0])) {
	$ets[] = $result;
}
while ($result1 = mysqli_fetch_array($a[1])) {
	$vis[] = $result1;
}
if(isset($ets)){
	$_SESSION['tabet'] = $ets;
	foreach($ets as $et)
	{
		echo $et['palabra'].'<br>';
	}
}
if (isset($vis)) {
	$_SESSION['tabvi'] = $vis;
	foreach($vis as $vi)
	{
		echo $vi['infinitivo'].'<br>';
	}
}
header("Location: diccionario1.php")
 ?>