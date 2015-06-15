<?php 
include 'modelo.php';
session_start();	
?>
<html>
<head>
	<title>Conjuncion</title>
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
				<nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>
				<div class='container-fluid'>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6 text-left">
								<a href='lecciones.php' class='btn btn-default navbar-btn'>Atras</a>
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

	</div>

	<div class="row well">
		<div class="row banner">
			<div class="col-md-12 text-center">
				<div class="row">
					<h1>Conjungar verbos en lenguaje de señas</h1>	
				</div>
			</div>
		</div>
	</div>

<div class="row">
	<div class="col-md-12">	
		<div class="col-md-4 col-md-offset-4">
		<h4>Asi como en el español, en lenguaje de señas se requiere la conjunción de los verbos para expresar el tiempo de la oración.</h4>
		</div>
	</div>
</div>

<hr>



<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
		<h4>Conjunción en tiempo presente</h4>
		<p>Cuando se necesita expresar algo en presente en lenguaje de señas, sencillamente realiza la seña correspondiente al verbo</p>
		<br>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
		<h4>Conjunción en tiempo pasado</h4>
		<p>Cuando se necesita conjugar un verbo para expresar una oración en pasado, se realiza la primero la seña correspondiente a "antes" y posteriormente se realiza la seña del verbo</p>
		<br>
		<h4>Seña correspondiente a la palabra "antes"</h4>
		<img src="imagenes/antes.png" class='img-responsive'>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
		<h4>Conjunción en tiempo futuro</h4>
		<p>Al igual que cuando se conjuga un verbo en pasado cuando se trata de un verbo conjugado en futuro se realiza la primero la seña correspondiente a "futuro" y posteriormente se realiza la seña del verbo</p>
		<br>
		<h4>Seña correspondiente a la palabra "futuro"</h4>
		<img src="imagenes/futuro.png" class='img-responsive'>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			<h4>A continuación se presentá un ejemplo de como se veria una oración conjugada en tiempo pasado. Esta forma de conjugación es aplicable también para tiempo futuro pero cuando se trata de tiempo presente, como se ha mencionado antes sencillamente se realiza la seña correspondiente al verbo y ya no se especifica el tiempo</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			<p>La frase que se traducirá será "juan escribió una carta", esta como se puede ver a continuación es una frase de tipo:</p>
			<?php 
				$frase="juan escribió una carta";
				$a= new automata($frase,null,null,null);
				$num=$a->idenAut();
				$etiquetas=$a->obArret();
				$tr= new traductor($num,$t=$a->obTiempo(),$a->obArr());
				$t=$a->obTiempo();
				$palabras=$a->obArr();
				$arret=$a->obArret();
				$imagenes=$tr->obtenerSenhas();
				echo "<div class='panel panel-default'>";
				echo "<div class='panel-heading'>".$frase."</div>";
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
				echo "<br><br><br><br>"
			?>
		</div>
	</div>
</div>
<br><br><br>
<div class="navbar navbar-inverse navbar-fixed-bottom bg" role="navigation">
    	<div class="container-fluid">
    		<div class="navbar-text pull-left">
    			<p class="letras">© Fernando De La Via</p>
    		</div>
    	</div>
</div>
</div>
</body>
</html>