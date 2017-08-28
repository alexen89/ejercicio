<?php
//Inicio la sesión
function load_sesion($data){
	session_start();
	$_SESSION['id_user']			= $data[0]['id_user'];
	$_SESSION['nombre']				= $data[0]['nombre'];
	$_SESSION['paterno']			= $data[0]['paterno'];
	$_SESSION['materno']			= $data[0]['materno'];
	$_SESSION['direccion']			= $data[0]['direccion'];
	$_SESSION['timestamp_create']	= $data[0]['timestamp_create'];
	$_SESSION['activo']				= $data[0]['activo'];

}
function close_sesion(){
	session_start();
	session_destroy();
}
?>