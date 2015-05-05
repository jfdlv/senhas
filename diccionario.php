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
				  <div class="panel-heading">DICCIONARIO</div>
				  <div class="panel-body">
					<form action="cont_dicc.php" class="form" method="post">
						<div class="formgroup">
							<label for="palabra" class="sr-only">Palabra en lenguaje natural</label>
							<div class="row row-centered">
								<div class="col-md-6 col-md-offset-4">
									<div class="input-group">
										<input type="text" class="form-control" id="user" placeholder="Palabra en lenguaje natural" name="palabra" >
									</div>
								</div>
							</div>
						</div>	
					</form>
				  </div>
				  <div class="panel-footer">
				  	<div class="row">
				  		<div class="col-md-2 col-md-offset-10">
				  			<button class="btn btn-primary" type="submit" form="formDicc"><i class="fa fa-search"></i></button>
				  		</div>
				  	</div>
				  </div>
			</div>
			
		</div>
	</div>


<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">		
			
						
<?php
if (isset($_SESSION["imagen"])) {
	$palabra=$_SESSION['palabra'];
	echo "<div class='panel panel-default's>";
	echo "<div class='panel-heading'>".$_SESSION["palabra"]."</div>";
	$imagen=$_SESSION["imagen"];
		echo "<div class='panel-body'>";
		if (!empty($imagen)) {
			
			echo "<img class='img-responsive' src=$imagen>";
			
		}
		else
		{
			$tr= new traductor(null,null,null);
			$tr -> deletrear($palabra);
		}
	unset($_SESSION["imagen"]);
	unset($_SESSION["palabra"]);
	echo "</div>";
	echo "</div>";
}
?>
					
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