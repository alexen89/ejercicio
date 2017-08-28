<?php
//Todas las plantillas de html que se utilizaron para mostrar en la web
function plantilla_login(){
	$html = "
			<div id='login'>
			  Nombre:<br>
			  	<input type='text' name='nombre' id='nombre'><br>
			  Contraseña:<br>
			  	<input type='password' name='pass' id='pass'><br>
			  <button onclick='login()'>Iniciar Sesión </button>
			  <button onclick='first()'>Registrarse</button>
			</div>
			";
	echo $html;
}
function plantilla_resgitrarse(){
	$html = "
			<div id='registro'>
			  Nombre:<br>
			  	<input type='text' name='nombre' id='nombre'><br>
			  Apellido Paterno:<br>
			  	<input type='text' name='paterno' id='paterno'><br>
			  Apellido Materno:<br>
			  	<input type='text' name='materno' id='materno'><br>
			  Dirección:<br>
			  <input type='text' name='direccion' id='direccion'><br>
			  Contraseña:<br>
			  	<input type='password' name='pass' id='pass'><br>
			  <button onclick='registrer()'>Registrarse</button>
			</div>
			";
	return $html;
}
function plantilla_close_sesion(){
	$html = "
			<div id='cerrar_sesion'>
			  <button onclick='close_sesion();'>Cerrar Sesión</button>
			</div>
			";
	echo $html;
}
function headers($js=false){
if($js){
	$include = "<script src='js/$js.js'></script>";
}
$html = "<html>
			<head>
				<script src='js/jquery-3.2.1.min.js'></script>
				$include
				<title></title>
			</head>
			<body>";
	echo $html;
}
function footers(){
$html = "</body>
		</html>";
	echo $html;
}
?>
