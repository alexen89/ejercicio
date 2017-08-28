//Funciones para enviar a los archivos mediante ajax y respuesta json.
function registrer(){
	var nombre    = $('#nombre').val();
	var paterno   = $('#paterno').val();
	var materno   = $('#materno').val();
	var direccion = $('#direccion').val();
	var pass 	  = $('#pass').val();
	$.ajax({
		url: "login.php",
		type: "POST",
		dataType: "json",
		data: {"nombre" : nombre, "paterno" : paterno,"materno" : materno, "direccion" : direccion,'pass':pass,'registrer':true},
		success: function(result){
				alert(result.msg);
				$(location).attr('href','index.php');
		}
    });
}
function login(){
	var nombre = $('#nombre').val();
	var pass = $('#pass').val();
	$.ajax({
		url: "login.php",
		type: "POST",
		dataType: "json",
		data: {"nombre" : nombre, "pass" : pass,'login':true},
		success: function(result){
			alert(result.msg);
			$(location).attr('href','index.php');
		}
    });
}
function first(){
	$.ajax({
		url: "login.php",
		type: "POST",
		dataType: "json",
		data: {'registrarse':true},
		success: function(result){
			$("#login").html(result.success);
    	}
    });
}
function close_sesion(){
	$.ajax({
		url: "login.php",
		type: "POST",
		dataType: "json",
		data: {'close_sesion':true},
		success: function(result){
			alert(result.msg);
			$(location).attr('href','index.php');
    	}
    });	
}
