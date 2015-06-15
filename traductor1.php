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
<!-- CONTENIDO PAGINA -->
	<div class="container-fluid">

<!-- MODAL AYUDA -->
<div class="modal fade  bs-example-modal-lg" role="dialog" id="modalAyuda">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center">Ayuda</h4>
				      </div>
				      <div class="modal-body">
				        <div class="row">
				        	<div class="col-md-12">
				        		<p>Con este traductor puedes traducir oraciones enunciativas, enunciativas negativas, predicativas y activas que cumplan con las siguientes estructuras:</p>
				        	</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12">
				        		<img src="imagenesst/estructuras.png" alt="" class="img-responsive" size="100">
				        	</div>
				        </div>
				        <hr>
				        <div class="row">
				        	<div class="col-md-12">
				        		<h3>Siendo:</h3>
				        	</div>
				        </div>
				        <div class="row text-center">
				        <div class="row">
				        	<div class="col-md-12">
				        		<p>SUS = SUSTANTIVO</p>
				        	</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12">
				        		<p>V = VERBO</p>
				        	</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12">
				        		<p>ART = ARTICULO</p>
				        	</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12">
				        		<p>ADV = ADVERBIO</p>
				        	</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12">
				        		<p>PRN = PRONOMBRE</p>
				        	</div>
				        </div>
				        </div>
				        <hr>
				        <div class="row">
				        	<div class="col-md-12">
				        		<p class="importante">NOTA: Si la palabra no existe en el corpus de lenguaje de señas esta se traducirá</p>
				        	</div>
				        </div>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

		<br>
	<br>
	<div class="row">
			<div class="col-md-12 cab">
				
				<!-- Modal Login -->

				<div class="modal fade" id="modalLogin">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center">Login</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form" id="formLogin" method="post" action="cont_login.php" >
						  <div class="form-group">
						    <label class="sr-only" for="user">Nombre de usuario</label>
						    <label class="sr-only" for="pass">Contraseña</label>
						    <div class="row">
						    	<div class="col-md-6 col-md-offset-3">						    		
								    <div class="input-group">
								    		<input type="text" class="form-control" id="user1" name='usuario' placeholder="Nombre de usuario" required>
								    		<div class="input-group-addon"><i class="fa fa-user"></i></div>
								    </div>	
								    <br>
								    <div class="input-group">
								      		<input type="password" class="form-control" id="pass1" name='pass' placeholder="Contraseña" required>
								      		<div class="input-group-addon"><i class="fa fa-key"></i></div>
								    </div>
						    	</div>
						    </div>

						  </div>
						</form>
				      </div>
				      <div class="modal-footer">
				        <input type="submit" form="formLogin" value="entrar" class="btn btn-primary">
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<!-- Modal registro -->

				<div class="modal fade" id="modalRegister">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center">Registro</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form" id="formRegistro" method="post"	action="cont_registro.php" >
						  <div class="form-group">
						    <label class="sr-only" for="user">Nombre de usuario</label>
						    <label class="sr-only" for="pass">Contraseña</label>
						    <label class="sr-only" for="pass1">Repetir Contraseña</label>
						    <legend class="text-left">Datos de usuario</legend>
						    <div class="row row-centered">
						    	<div class="col-md-6 col-md-offset-3">						    	
								    <div class="input-group">
								    		<div class="input-group-addon"><i class="fa fa-user"></i></div>
								    		<input type="text" class="form-control" id="user2" name="user" placeholder="Nombre de usuario" required>
								    		
								    </div>
								    <br>
								    <div class="input-group">		
								    		<div class="input-group-addon"><i class="fa fa-key"></i></div>				   
								    		<input type="password" class="form-control" id="pass2" name="pass" placeholder="Contraseña" required>								      		
								    </div>
								    <br>
								    <div class="input-group">		
								    		<div class="input-group-addon"><i class="fa fa-key"></i></div>				   
								    		<input type="password" class="form-control" id="pass3" placeholder="Repetir Contraseña" required>								      		
								    </div>
						    	</div>	
						    </div>
						    <br>
						    <legend class="text-left">Datos personales</legend>
						    <div class="row">						    	
						    	<div class="col-md-6 col-md-offset-3">						    	
								    <div class="input-group">
								    		<div class="input-group-addon">Nombres</div>
								    		<input type="text" name='nombres' class="form-control" required>
								    </div>
								    <br>
								    <div class="input-group">
								    		<div class="input-group-addon">Apellidos</div>
								    		<input type="text" name='apellidos' class="form-control" required>
								      		
								    </div>
						    	</div>	
						    </div>

						  </div>
						</form>
				      </div>
				      <div class="modal-footer">
				      	<div class="row">
				      		<div class="col-md-12">
				      			<div class="col-md-6 text-left">
				      				<p id='alerta' class='importante'></p>
				      			</div>
				      			<div class="col-md-6 txt-right">
				      				<input type="submit" form="formRegistro" value="entrar" class="btn btn-primary">
				      			</div>
				      		</div>
				      	</div>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				<nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>
				<div class='container-fluid'>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6 text-left">
								<a href='index.php' class='btn btn-default navbar-btn'>Atras</a>
							</div>
				<!-- Botones -->
				<?php
				if(!isset($_SESSION["usuario"])){
					echo "<div class='col-md-6 text-right'>";
						echo "<a href='#modalLogin' data-toggle='modal' class='btn btn-default navbar-btn'>Login</a> ";
						echo "<a href='#modalRegister' data-toggle='modal' class='btn btn-default navbar-btn'>Registro</a>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		echo "</nav>";
				}
				else
				{
						echo "<div class='col-md-6 text-right'>";
							echo "<div class='btn-group'>";
							 echo "<button type='button' class='btn btn-default dropdown-toggle btn-cab' data-toggle='dropdown' aria-expanded='false'>".$_SESSION['nombre']."<span class='caret'></span></button>";
	 						 //echo "<button type='button' class='btn btn-default dropdown-toggle btn-cab' data-toggle='dropdown' aria-expanded='false'>usuario<span class='caret'></span></button> ";
							 echo "<ul class='dropdown-menu dropdown-menu-right' role='menu'>";
							 		echo "<li><a href='estadisticas.php'>Estadisticas</a></li>";
	    							echo "<li><a href='logout.php'>Cerrar sesión</a></li>";
	  						echo "</ul>";
	  						echo "</div>";
	  					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		echo "</nav>";
				}
				?>
					
			</div>

		<div class="row">	
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					  <div class="panel-heading">
					  <div class="row">
					  	<div class="col-md-12">
					  		<div class="col-md-6 text-left">TRADUCTOR</div>
					  		<div class="col-md-6 text-right"><a href="#modalAyuda" data-toggle="modal" class="btn btn-primary"><i class="fa fa-question-circle"></i></a></div>
					  	</div>
					  </div>
					  </div>
					  <div class="panel-body">
						<form action="cont_trad.php" id="formTrad" class="form" method="post">
							<div class="formgroup">
								<label for="palabra" class="sr-only">Oración en lenguaje natural</label>
								<div class="row row-centered">
									<div class="col-md-6 col-md-offset-4">
										<div class="input-group">
											<input type="text" class="form-control" id="frase" onChange="Min('#frase')" placeholder="Oración en lenguaje natural" name="frase" required>
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
		unset($_SESSION["var"]);
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
    	<div class="container-fluid">
    		<div class="navbar-text pull-left">
    			<p class="letras">© Fernando De La Via</p>
    		</div>
    	</div>
</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validaciones.js"></script>
	<script>

	// $( document ).ready(function() {
 //    	$('#alerta').append("si da papa");
	// });
	</script>
</body>
</html>