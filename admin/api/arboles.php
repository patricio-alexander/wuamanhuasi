<?php


include '../../include/cusuario.php';
include '../../include/conexion.php';
$db = DB::conectar();


$sentencia = $db->prepare(
    "SELECT arbol.id_arbol, ruta.nombre_ruta, especie.especie 
            FROM arbol 
                INNER JOIN especie ON especie.id_especie = arbol.id_especie
                INNER JOIN ruta ON ruta.id_ruta = arbol.id_ruta
                WHERE arbol.id_registro IS NULL
        "
);

$sentencia->execute();
$arbolesNoAsignados = $sentencia->fetchAll(PDO::FETCH_OBJ);
// json_encode($arbolesNoAsignados);
if (empty($arbolesNoAsignados)) {
        echo json_encode(["error" => "Arboles no disponibles"]);
        http_response_code(404);
} else {
        echo json_encode($arbolesNoAsignados);
}

// }

// if (!empty($get->cedula)) {

/*
SELECT estudiante.cedula, arbol.id_arbol, ruta.nombre_ruta, especie.especie 
FROM arbol 
INNER JOIN especie ON especie.id_especie = arbol.id_especie
INNER JOIN ruta ON ruta.id_ruta = arbol.id_ruta
INNER JOIN registro ON registro.id_registro = arbol.id_registro
INNER JOIN estudiante ON estudiante.cedula = registro.cedula WHERE estudiante.cedula = 1106011421

*/
# code...
// $sentencia = $db->prepare("


// ")

// }
