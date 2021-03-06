<!DOCTYPE html>
<?php 
include "modelo.php";
session_start();
?>
<html>
<head>
	<title>Aprende señas</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container-fluid">
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

				<!-- Botones -->
				<?php
				if(!isset($_SESSION["usuario"])){
					echo "<nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>";
					echo "<div class='container-fluid text-right'>";
						echo "<a href='#modalLogin' data-toggle='modal' class='btn btn-default navbar-btn'>Login</a> ";
						echo "<a href='#modalRegister' data-toggle='modal' class='btn btn-default navbar-btn'>Registro</a>";
					echo "</div>";
					echo "</nav>";
				}
				else
				{
					echo "<nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>";
					echo"<div class='container-fluid text-right'>";
						echo "<div class='btn-group'>";
						 echo "<button type='button' class='btn btn-default dropdown-toggle btn-cab' data-toggle='dropdown' aria-expanded='false'>".$_SESSION['nombre']."<span class='caret'></span></button>";
 						 //echo "<button type='button' class='btn btn-default dropdown-toggle btn-cab' data-toggle='dropdown' aria-expanded='false'>usuario<span class='caret'></span></button> ";
						 echo "<ul class='dropdown-menu dropdown-menu-right' role='menu'>";
						 		echo "<li><a href='estadisticas.php'>Estadisticas</a></li>";
    							echo "<li><a href='logout.php'>Cerrar sesión</a></li>";
  						echo "</ul>";
  						echo "</div>";
					echo "</div>";
					echo "</nav>";
				}
				?>
					
			</div>

		</div>
		<div class="row jumbotron">
			<div class="row banner">
				<div class="col-md-12 text-center">
					<div class="row">
						<h1>LENGUAJE DE SEÑAS</h1>	
					</div>
					<div class="row">
							<p>~ SISTEMA DE APRENDIZAJE ~</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
		<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">	
			<ul class="nav nav-pills">
					<li class="active" role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Diccionario<span class="caret"></span></a>
				    <ul class="dropdown-menu" role="menu">
				      <li>	
				      <a href="Diccionario.php">Español - Lenguaje de señas</a>
				      </li>
				      <li>	
				      <a href="Diccionario1.php">Lenguaje de señas - Español</a>
				      </li>
				    </ul>
		  		</li>
				<li   class="active" role="presentation"><a href="traductor1.php">Traductor</a></li>
				<li   class="active" role="presentation"><a href="deletrear.php">Deletrear</a></li>
				<li   class="active" role="presentation"><a href="lecciones.php">Lecciones</a></li>
				<li   class="active" role="presentation"><a href="tests.php">Pruebas</a></li>
				<li   class="active" role="presentation"><a href="#">Acerca de</a></li>
			</ul>
		</div>	
		</div>
		</div>
		
		<hr>

		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12 col-md-offset-5">
						<div class="col-md-4">
							<h1>LENGUA DE SEÑAS</h1>
							<p>
								El Ministerio de Educación y cultura define a la lengua de señas como un sistema 
								lingüístico que posee todas las características propias de las lenguas, con la 
								diferencia de que estas son posibles a partir de la utilización de los recursos 
								espacio-temporales que las manos y la expresión facial permite. De esta manera 
								la lengua de señas se puede declarar como un lenguaje por todas las características 
								previamente expuestas. 
							</p>
						</div>
						<div class="col-md-4">
							<img src="imagenesst/senha.jpg" alt="" class="img-responsive senha" size="100">
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