<?php
/*Seccion que valida todos los procesos para logueo y registro*/
include('model_login.php');
include('global.php');
//include('session.php');
include('plantillas.php');
	//Valida el parametro POST para el login
	if(isset($_POST['login'])){
		$success = false;
		if($_POST['nombre']=='' || $_POST['pass']==''){
			$msg 	  = 'El nombre y contraseña no deben estar vacíos.';
		}else{		
		$_POST['pass'] = md5($_POST['pass']);
		$_POST['table'] = 'user';
		$msg 	  = 'El usuario y/o contraseña no son correctos.';
		$data	= qry_all($_POST);
		load_user_registrer($data);
		if(isset($_SESSION['id_user'])){
			$msg 	= 'Bienvenido.';
		}

		}
	}
	//Valida el parametro POST para registrarse
	if(isset($_POST['registrer'])){
		$success = false;
		$msg 	 = 'Todos los campos son obligatorios';
		//se elimina registrer para solo pasar los datos y poder insertar
		unset($_POST['registrer']);
		if($_POST['nombre'] || $_POST['paterno'] || $_POST['materno'] || $_POST['direccion'] || $_POST['pass']){
			$_POST['timestamp_create']	 = timestamp();
			$_POST['timestamp_update']	 = timestamp();
			$_POST['activo']	 = 1;
			$_POST['pass'] = md5($_POST['pass']);
			$validate = validate_query($_POST);
			$msg 	  = 'Lo datos contienen información no valida.';
			if($validate){
				$query = query($_POST,'user');
				$msg = 'No se pudo dar de alta el usuario.';
				if($query){
					$success = true;
					$msg = 'Se ha dado de alta correctamente el usuario.';
					load_user($query);
				}
			}
		}
	}
	if(isset($_POST['registrarse'])){
		//Muestra la plantilla para poder registrarse
		$success = plantilla_resgitrarse();
		$msg ='';
	}
	if(isset($_POST['close_sesion'])){
		//proceso para cerrar la sesión
		close_sesion();
		$success = true;
		$msg ='Hasta pronto';
	}
		echo json_encode(array('success'=> $success, 'msg'=> $msg));
?>
