<?php
require_once('../include/usuario.php');
require_once('../include/crud_usuario.php');
require_once('../include/conexion.php');

$formData = (object) ($_REQUEST);

// // $usuario = $_REQUEST["usuario"];
// echo "
// 	Usuario:  $formData->usuario <br>
// 	Clave: $formData->clave <br>
// ";
// $clave = $_REQUEST["clave"];
// echo "Clave:" . $clave . "<br>";
// $tipo = $_REQUEST["tipo"];
// echo "Tipo:" . $tipo . "<br>";


//inicio de sesion
session_start();
$usuario = new Usuario();
$crud = new CrudUsuario();
//verifica si la variable registrarse está definida
//se da que está definicda cuando el usuario se loguea, ya que la envía en la petición
// if (isset($_REQUEST["accion"])) {
// 	if ($_REQUEST["accion"] == "CERRARCESION") {
// 		session_destroy();
// 		header('location:ingreso.php');
// 	}
// }
// if (isset($_POST['registrarse'])) {
// 	$usuario->setNombre($_POST['usuario']);
// 	$usuario->setClave($_POST['pas']);
// 	if ($crud->buscarUsuario($_POST['usuario'])) {
// 		$crud->insertar($usuario);
// 		header('Location:index.php');
// 	} else {
// 		header('Location: error.php?mensaje=El nombre de usuario ya existe');
// 	}
// }

if (isset($_REQUEST["accion"])) {
	if ($_REQUEST["accion"] == "CERRARCESION") {
		session_destroy();
		header('location: ../admin/index.php');
	}
}

if (isset($_POST['registrarse'])) {
	$usuario->setNombre($_POST['usuario']);
	$usuario->setClave($_POST['pas']);
	if ($crud->buscarUsuario($_POST['usuario'])) {
		$crud->insertar($usuario);
		header('Location:index.php');
	} else {
		header('Location: error.php?mensaje=El nombre de usuario ya existe');
	}
}

if (isset($_POST['entrar'])) { //verifica si la variable entrar está definida

	// echo "<br>---> Usuario:" . $_POST['usuario'] . " pass:" . $_POST['clave'] . " Tipo:" . $tipo;
	$existeUsuario = $crud->obtenerUsuario($_POST['usuario'], $_POST['clave']);


	if (empty($existeUsuario)) {
		echo "<br>Waman Huasi";
		echo "<br>1. ERROR, credenciales no validas<br>";
		echo "<a href='index.php'>Regresar</a>";
		return;
	}

	if ($existeUsuario->getId() != NULL) {
		$_SESSION['usuario'] = $existeUsuario; //si el usuario se encuentra, crea la sesión de usuario			
		if ($existeUsuario->getTipo() == 'ADMIN') {

			header('Location:home.php?id_usuario=' . $existeUsuario->getId()); //envia a la página que simula la cuenta

		}

		if ($existeUsuario->getTipo() == 'ESTUDIANTE') {

			header('Location:home.php?id_usuario=' . $existeUsuario->getId()); //envia a la página que simula la cuenta

		}

		if ($existeUsuario->getTipo() == 'DOCENTE') {

			header('Location:home.php?id_usuario=' . $existeUsuario->getId()); //envia a la página que simula la cuenta

		}
		// else {
		// 	echo "Error, no hay usuario definido";
		// 	return;
		// }
	} else {
		header("Location:home.php?tipo=" . $usuario->getTipo());
		$_SESSION['usuario'] = $existeUsuario;
		// echo $usuario->getTipo();
		// echo "<br>Waman Huasi";
		// echo "<br>2. ERROR, credenciales no validas<br>";
		// echo "<a href='index.php'>Regresar</a>";
		// return;	
	}
}

if (isset($_REQUEST['salir'])) { // cuando presiona el botòn salir
	header('Location: index.php');
	unset($_SESSION['usuario']); //destruye la sesión
}
// // echo "alla va";
