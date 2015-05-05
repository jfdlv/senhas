<!DOCTYPE html>
<?php 
include "modelo.php";
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
		<br>
		<div class="row">
			<div class="col-md-12 text-right cab">
				
				<!-- Modal Login -->

				<div class="modal fade" id="modalLogin">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center">Login</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form" id="formLogin" method="post" action="cont_login.php">
						  <div class="form-group">
						    <label class="sr-only" for="user">Nombre de usuario</label>
						    <label class="sr-only" for="pass">Contraseña</label>
						    <div class="row">
						    	<div class="col-md-6 col-md-offset-3">						    		
								    <div class="input-group">
								    		<input type="text" class="form-control" id="user" placeholder="Nombre de usuario" required>
								    		<div class="input-group-addon"><i class="fa fa-user"></i></div>
								    </div>	
								    <br>
								    <div class="input-group">
								      		<input type="password" class="form-control" id="pass" placeholder="Contraseña" required>
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
				        <form class="form" id="formRegistro" method="post" action="cont_registro.php">
						  <div class="form-group">
						    <label class="sr-only" for="user">Nombre de usuario</label>
						    <label class="sr-only" for="pass">Contraseña</label>
						    <legend class="text-left">Datos de usuario</legend>
						    <div class="row row-centered">
						    	<div class="col-md-6 col-md-offset-3">						    	
								    <div class="input-group">
								    		<div class="input-group-addon"><i class="fa fa-user"></i></div>
								    		<input type="text" class="form-control" id="user" placeholder="Nombre de usuario" required>
								    		
								    </div>
								    <br>
								    <div class="input-group">		
								    		<div class="input-group-addon"><i class="fa fa-key"></i></div>				   
								    		<input type="text" class="form-control" id="pass" placeholder="Contraseña" required>								      		
								    </div>
						    	</div>	
						    </div>
						    <br>
						    <legend class="text-left">Datos personales</legend>
						    <div class="row">						    	
						    	<div class="col-md-6 col-md-offset-3">						    	
								    <div class="input-group">
								    		<div class="input-group-addon">Nombres</div>
								    		<input type="text" class="form-control" required>
								    </div>
								    <br>
								    <div class="input-group">
								    		<div class="input-group-addon">Apellidos</div>
								    		<input type="text" class="form-control" required>
								      		
								    </div>
						    	</div>	
						    </div>

						  </div>
						</form>
				      </div>
				      <div class="modal-footer">
				        <input type="submit" form="formRegistro" value="entrar" class="btn btn-primary">
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<!-- Botones -->

				<a href="#modalLogin" data-toggle="modal" class="btn btn-primary">Login</a>
				<a href="#modalRegister" data-toggle="modal" class="btn btn-primary">Registro</a>
			</div>
		</div>
		<div class="row jumbotron">
			<div class="row banner">
				<div class="col-md-12">
					<div class="col-md-6 col-md-offset-4">
					<img class="img-responsive" src="imagenesst/banner.png" alt="">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
		<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">	
			<ul class="nav nav-pills">
				<li class="active" role="presentation"><a href="">Inicio</a></li>
				<li   role="presentation"><a href="diccionario.php">Diccionario</a></li>
				<li   role="presentation"><a href="traductor1.php">Traductor</a></li>
				<li   role="presentation"><a href="#">Pruebas</a></li>
				<li   role="presentation"><a href="#">Acerca de</a></li>
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
    	<div class="container">
    		<div class="navbar-text pull-left">
    			<p class="letras">© Fernando De La Via</p>
    		</div>
    	</div>
    </div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	$().ready(function(){
		// $(".mypop1").popover({
		// 	placement: "bottom",
		// 	title: "Inicie sesión",
		// 	content:"<form action='cont_init.php' method='POST'><input type='text' name='usuario' /><input type='password' name='pass' /><input type='submit' value='entrar' /></form>",
		// 	html: true,
		// });
	})
	</script>
</body>
</html>