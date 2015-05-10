<?php 
include 'modelo.php';
session_start();
?>
<html>
<head>
	<title>Deletrear</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="modal fade  bs-example-modal-lg" role="dialog" id="modalAyuda">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center">Ayuda</h4>
				      </div>
				      <div class="modal-body">
				        <p>Usted puede deletrear una sola palabra</p>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

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
				  <div class="panel-heading">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6 text-left"><p>Deletrear</p></div>
							<div class="col-md-6 text-right"><a href="#modalAyuda" data-toggle="modal" class="btn btn-primary"><i class="fa fa-question-circle"></i></a></div>
						</div>
					</div>
				  </div>
				  <div class="panel-body">
					<form action="cont_del.php" class="form" method="post" id="formDicc">
						<div class="formgroup">
							<label for="palabra" class="sr-only">Palabra en lenguaje natural</label>
							<div class="row row-centered">
								<div class="col-md-6 col-md-offset-4">
									<div class="input-group">
										<input type="text" class="form-control" id="palabra" placeholder="Palabra en lenguaje natural" name="palabra" required>
									</div>
								</div>
							</div>
						</div>	
					</form>
				  </div>
				  <div class="panel-footer">
				  	<div class="row">
				  		<div class="col-md-12">
				  			<div class="col-md-6 text-left">
				  				<p id="alerta" class="importante"></p>
				  			</div>
				  			<div class="col-md-6 text-right">
				  				<button class="btn btn-primary" type="submit" form="formDicc"><i class="fa fa-search"></i></button>	
				  			</div>
				  		</div>
				  	</div>
				  </div>
			</div>
			
		</div>
	</div>
<hr>

	
<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			<div class="col-md-12">
						
<?php
if (isset($_SESSION["palabra"])) {

				$tr= new traductor(null,null,null);
				echo "<div class='panel panel-default's>";
					echo "<div class='panel-heading'>".$_SESSION["palabra"]."</div>";
					echo "<div class='panel-body'>";
							$tr -> deletrear($_SESSION["palabra"]);
					echo "</div>";
				echo "</div>";
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validaciones.js"></script>

</body>
</html>