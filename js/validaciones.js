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
var valform2 = {
	Sub: function() {
		$("#formDicc").submit(function( event ){
				var vector = Par();
				if (vector>1) 
				{
					//alert("El diccionario solo busca una palabra");
					$("#alerta").html("El diccionario solo busca una palabra");
	  				event.preventDefault();
				};
		});
	}
	
}
var valform3 = {
	Sub: function() {
		$("#formDel").submit(function( event ){
				var vector = Par();
				if (vector>1) 
				{
					//alert("El diccionario solo busca una palabra");
					$("#alerta").html("Solo puede deletrear una palabra");
	  				event.preventDefault();
				};
		});
	}
	
}
function Par () {
		var vector = new Array();
		var palabra = $("#palabra").val();
		var cadena = "";
		for (var i = 0; i < palabra.length; i++) {
			if(palabra.charCodeAt(i)!=32){
				
				cadena = cadena.concat(palabra.charAt(i));
				if (i == (palabra.length - 1)) 
				{
					vector.push(cadena);
					break;
				};
			}
			else 
			{
				vector.push(cadena);
			};
		};
		return vector.length;

}
$(document).ready(valform1.Sub);
$(document).ready(valform2.Sub);
$(document).ready(valform3.Sub);



