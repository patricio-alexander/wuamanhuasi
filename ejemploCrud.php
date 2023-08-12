<?php

	include_once('include/config.php');
	$data	=	array(
				'nombre'=>"NOMBRE CRUD ",
				'apellido'=>"APELLIDO CRUD",
				'correo'=>"correo@hotmail.com",
			);
			
			
	$insert	=	$db->insert('cliente',$data);
	if($insert){
		echo "<br>Registro insertado correctamente";
	}else{
		echo "<br>No se inserto el registro";
	}

//Eliminar registro
	$data	=	array(
				'id_cliente'=>"19",
			);
			
	$borrar = $db->delete('cliente',$data);

	if($borrar){
		echo "<br>Registro eliminado correctamente";
	}else{
		echo "<br>No se elimino el registro";
	}
	
//ACTUALIZAR
	$data_SET	=	array(
				'nombre'=>"NOMBRE CRUD2 ",
				'apellido'=>"APELLIDO CRUD2",
				'correo'=>"correo@hotmail.com2",
			);
	
	$data_WHERE	=	array(
				'id_cliente'=>"5",
			);
	
	$actualizar = $db->update('cliente',$data_SET,$data_WHERE);		
			
	if($actualizar){
		echo "<br>Registro actualizado correctamente";
	}else{
		echo "<br>El registro no se actualizo";
	}
	
?>