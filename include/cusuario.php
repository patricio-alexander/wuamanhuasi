<?php 
require_once('usuario.php');
session_start();

if (empty($_SESSION['usuario'])) {
	header('Location: index.php');
}



		
/*if ($_SESSION['usuario']->getTipo() !== 'ADMIN') {					
    echo "<br>No tines permiso para acceder";
    echo "<br>Contacta con el administrador";
    header('Location: controller_login.php?accion=CERRARCESION');
    return;
}*/


        // include "db.php";
        // include "config.php";
?>