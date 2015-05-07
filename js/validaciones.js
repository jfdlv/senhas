var valform1 = {
	Sub: function() {
		$( "#formRegistro" ).submit(function( event ) {
	  			var campo1 = $("#pass2").val();
	  			var campo2 = $("#pass3").val();
	  			if (campo1 != campo2)
	  			{
	  				$("#alerta").html("La contraseña no coincide");
	  				event.preventDefault();
	  			};
			});
	}
};
$(document).ready(valform1.Sub);


