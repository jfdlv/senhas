<?php 
include 'modelo.php';
session_start();
?>
<html>
<head>
	<title>traductor</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container-fluid">
		<br>
		<div class="row">
			<div class="col-md-12 cab">
				<div class="col-md-6 text-left">
					<a href="index.php" class="btn btn-primary">Atras</a>
				</div>
			</div>
		</div>

		<div class="row">	
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					  <div class="panel-heading">TRADUCTOR</div>
					  <div class="panel-body">
						<form action="cont_trad.php" id="formTrad" class="form" method="post">
							<div class="formgroup">
								<label for="palabra" class="sr-only">Oración en lenguaje natural</label>
								<div class="row row-centered">
									<div class="col-md-6 col-md-offset-4">
										<div class="input-group">
											<input type="text" class="form-control" id="user" placeholder="Oración en lenguaje natural" name="frase" required>
										</div>
									</div>
								</div>
							</div>	
						</form>
					  </div>
					  <div class="panel-footer">
					  	<div class="row">
					  		<div class="col-md-2 col-md-offset-10">
					  			<button class="btn btn-primary" type="submit" form="formTrad"><i class="fa fa-language"></i></button>
					  		</div>
					  	</div>
					  </div>
				</div>
			</div>
		</div>

		<hr>

		<?php
		if (isset($_GET["var"])) {
		echo "<div class='row text-center'><div class='col-md-12'><h1>La oración no cumple con ningún autómata</h1></div></div>";
		}
		?>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			<div class="col-md-12">
<?php

if (isset($_SESSION["imagenes"])) {
	$imagenes=$_SESSION["imagenes"];
	$palabras=$_SESSION["palabras"];
	$etiquetas=$_SESSION["etiquetas"];
	echo "<div class='panel panel-default'>";
	echo "<div class='panel-heading'>".$_SESSION["frase"]."</div>";
	echo "<div class='panel-body'>";
	for ($i=0; $i < (sizeof($imagenes)-1) ; $i++) { 
		if (!empty($imagenes[$i])) {
			if ($etiquetas[$i]=="V") {
				if ($imagenes['tiempo'] == 'presente') {
					echo "<div class='panel panel-default's>";
					echo "<div class='panel-heading'>".$palabras[$i]."</div>";
					echo "<div class='panel-body'>";
					echo "<img class='img-responsive'src=$imagenes[$i]>";
					echo "</div>";
					echo "</div>";
				}
				else
				{
					echo "<div class='panel panel-default's>";
					echo "<div class='panel-heading'>".$palabras[$i]."</div>";
					echo "<div class='panel-body'>";
					echo "<img class='img-responsive'src=".$imagenes['tiempo'].">";
					echo "</div>";
					echo "</div>";
					echo "<div class='panel panel-default's>";
					echo "<div class='panel-heading'>".$palabras[$i]."</div>";
					echo "<div class='panel-body'>";
					echo "<img class='img-responsive'src=$imagenes[$i]>";
					echo "</div>";
					echo "</div>";
				}
				
			}
			else
			{
				echo "<div class='panel panel-default's>";
				echo "<div class='panel-heading'>".$palabras[$i]."</div>";
				echo "<div class='panel-body'>";
				echo "<img class='img-responsive'src=$imagenes[$i]>";
				echo "</div>";
				echo "</div>";
			}
			
		}
		else
		{
			$tr= new traductor(null,null,null);
			echo "<div class='panel panel-default's>";
			echo "<div class='panel-heading'>".$palabras[$i]."</div>";
			echo "<div class='panel-body'>";
				$tr -> deletrear($palabras[$i]);
			echo "</div>";
			echo "</div>";
		}
	}
	echo "</div>";
	echo "</div>";
	unset($_SESSION["imagenes"]);
}
?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom bg" role="navigation">
    	<div class="container">
    		<div class="navbar-text pull-left">
    			<p class="letras">© Fernando De La Via</p>
    		</div>
    	</div>
</div>
</body>
</html>