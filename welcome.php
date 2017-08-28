<?php
//Archivo de bienvenida a un usuario registrado
echo "Bienvenido <strong>".$_SESSION['nombre'].'</strong>';
plantilla_close_sesion();
?>