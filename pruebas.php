<?php
// $var=explode("ó", "conquistó");
// echo $var[0];

include 'modelo.php';

$tr= new automata("este",null,null,null);
$tr->idenAut();
$et=$tr->obArret();
print_r($et);
//$tr -> deletrear("hola");
?>