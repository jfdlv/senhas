<?php 
include 'modelo.php';
session_start();
 ?>
<html>
<head>
	<title>curva por test</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/serial.js" type="text/javascript"></script>
<script src="js/dataloader.min.js" type="text/javascript"></script>
<body>
<div class="container-fluid">
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
								<a href='index.php' class='btn btn-default navbar-btn'>Inicio</a>
								<a href='estadisticas.php' class='btn btn-default navbar-btn'>Estadísticas</a>
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

		<div class="row jumbotron">
			<div class="row banner">
				<div class="col-md-12 text-center">
					<div class="row">
						<h1>Curva global</h1>	
					</div>
				</div>
			</div>
		</div>

<hr>


		<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 col-md-offset-3">
						<div id="chartdiv" style="width:100%; height:400px;"></div>
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
  var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "dataLoader": {
      "url": "data1.php"
    },
    "pathToImages": "/images/",
    "categoryField": "fecha",
    "dataDateFormat": "YYYY-MM-DD",
    "startDuration": 1,
    "categoryAxis": {
      "parseDates": true
    },
    valueAxes: [{
                   stackType: "regular",
                   gridAlpha: 0.07,
                   title: "Promedios"
               }],

    "graphs": [ {
      "title": "rendimiento de usuario",
      "valueField": "media",
      "bullet": "round",
      "bulletBorderColor": "#FFFFFF",
      "bulletBorderThickness": 2,
      "lineThickness ": 2,
      "lineAlpha": 0.5
    }, {
    "title": "rendimiento global",
    "valueField": "mediag",
    "bullet": "round",
    "bulletBorderColor": "#FFFFFF",
    "bulletBorderThickness": 2,
    "lineThickness ": 2,
    "lineAlpha": 0.5
  	} ],
    legend: {
	    position: "bottom",
	    valueText: "[[value]]",
	    valueWidth: 100,
	    valueAlign: "left",
		equalWidths: false,
   	},
    chartCursor: {
       cursorAlpha: 0
    }
  } );
</script>
</body>
</html>