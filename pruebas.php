<?php
// $var=explode("ó", "conquistó");
// echo $var[0];

include 'modelo.php';

$tr= new automata(null,null,null,null);
$palabra=$tr->desConji("abuela",2);
echo $palabra."<br>";
$s=new senha(null,null,null,null);
echo $s->obVi("bendecir")
// $et=$tr->obArret();
// print_r($et);
// $password = "hola";
// $hash1 = password_hash($password, PASSWORD_DEFAULT);
// echo $hash1."<br>";
// $hash2 = password_hash($password, PASSWORD_DEFAULT);
// echo $hash2."<br>";
// $hash3 = password_hash($password, PASSWORD_DEFAULT);
// echo $hash3."<br>";
// if (password_verify($password, $hash1)) {
//     echo '¡La contraseña es válida!';
// }
// if (password_verify($password, $hash2)) {
//  	echo '¡La contraseña es válida! 1';
// }
// if (password_verify($password, $hash3)) {
//  	echo '¡La contraseña es válida! 2';
//  } 
// else {
//     echo 'La contraseña no es válida.';
// }
//$tr -> deletrear("hola");
?>