<?php
//Archivo que carga inmediatamente, validando si el usuario esta registrado o no
session_start();
include('plantillas.php');
headers('login');
if(isset($_SESSION['id_user'])){
	include('welcome.php');
}else{
	
	plantilla_login();
}
footers();
?>