<?php
//archivo general de la conexión a la bd
function open_conexion(){
	$conexion = mysql_connect('localhost','root','');
	mysql_select_db('ejercicio', $conexion);
	return $conexion;
}
function close_conexion($conexion){
	mysql_close($conexion);
}
?>