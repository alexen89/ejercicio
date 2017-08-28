<?php
include('conexion_bd.php');
include('session.php');
//validamos que no tenga sentencias de mas el query que se va ejecutar
function validate_query($values){
	if(in_array ("select",$values) || in_array ('insert',$values) || in_array ('update',$values)){
		return false;
	}
	return true;
}
//se trae la información del usuario para poder loguearse
function qry_all($data){
	 $query = "SELECT * FROM $data[table] WHERE nombre = '$data[nombre]' AND pass = '$data[pass]';";
	return query_sele($query);
}
//preparamos el query para cargar los datos del usuario
function qry($data){
	$query = "SELECT * FROM $data[table] WHERE id_user = $data[id_user];";
	return query_sele($query);
}
//Query universal para poder insertar a la vase de datos
function query($values,$table){
	$data_array = processed_values_campos($values);
	$query = "INSERT INTO $table ($data_array[campos]) VALUES ($data_array[values]);";
	return execute_query($query);
}
//Query universal para traer los datos ya como arreglos de un select
function query_sele($query){
	$conexion = open_conexion();
	$result = mysql_query($query);
	$resultado = false;
	if($result){
		while($row = mysql_fetch_assoc($result)){
  			$resultado[] = $row; 
  		}
	}
	close_conexion($conexion);

	return $resultado;
}
//proceso de ejecución del query
function execute_query($query){
	$conexion = open_conexion();
	$result = mysql_query($query);
	if($result){
		$result = insert_id();
	}
	close_conexion($conexion);
	return $result;
}
//obtenemos el array, se retorna capmos y values para la insercion
function processed_values_campos($array = array()){
	foreach ($array as $key) {
		$result[] = "'".$key."'";
	}
	$val = implode(',',$result);
	$keys = array_keys($array);
	$campos = implode(',',$keys);
	return array('campos'=> $campos, 'values'=> $val);
}
//retorna el ultimo id registrado
function insert_id(){
	return mysql_insert_id();
}
//funcion para cargar la sesión de un usuario apenas registrado
function load_user($id){
	$data['table'] = 'user';
	$data['id_user'] = $id;

	$data_array = qry($data);
	if(is_array($data_array)){
		load_sesion($data_array);
	}
}
//función para cargar los datos de un usuario ya registrado
function load_user_registrer($data_array){
	if(is_array($data_array)){
		load_sesion($data_array);
	}
}
?>