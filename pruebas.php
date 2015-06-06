<?php
// $var=explode("ó", "conquistó");
// echo $var[0];

include 'modelo.php';

// $tr= new automata(null,null,null,null);
// $palabra=$tr->desConji("abuela",2);
// echo $palabra."<br>";
// $s=new senha(null,null,null,null);
// echo $s->obVi("bendecir")
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
$r1 = array("47","54","51","40");
$r2 = array("49","40","48","52","44");
$r3 = array("52","54","53","59","40","66","40");
$r4 = array("42","40","58","40");
$r5 = array("61","40","53","40","47","54","57","48","40");
$a = array();
array_push($a, $r1);
array_push($a, $r2);
array_push($a, $r3);
array_push($a, $r4);
array_push($a, $r5);
print_r($a);


$t = new test(1,null,null,null);
echo $t->evaluarTest($a)." esto es?";
// $p = new pregunta(1,null);
// $ids = array(47,54,51,40);
// 

?>
<!-- <html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2">	
			<img class='img-responsive' src="imagenes/abuela.png" id="image">
			</div>
		</div>
	</div>
</div>
				

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="JS/caman.full.min.js"></script>
	<script>
		Caman("#image", function () {
		// width, height, x, y
		this.crop(150,150,0,0);

		// Still have to call render!
		this.render();
		});
	</script>
</body>
</html> -->
