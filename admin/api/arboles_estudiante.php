<?php
include '../../include/cusuario.php';
include '../../include/conexion.php';
include '../../include/config.php';

$get = (object) $_GET;
$DB = DB::conectar();
if (!empty($get->cedula)) {
    $sentencia = $DB->prepare(
        "SELECT registro.id_registro,arbol.id_arbol, ruta.nombre_ruta, especie.especie 
        FROM arbol 
        INNER JOIN especie ON especie.id_especie = arbol.id_especie
        INNER JOIN ruta ON ruta.id_ruta = arbol.id_ruta
        INNER JOIN registro ON registro.id_registro = arbol.id_registro
        INNER JOIN estudiante ON estudiante.cedula = registro.cedula WHERE estudiante.cedula = :cedula 
        "
    );

    $sentencia->bindValue(":cedula", intval($get->cedula));
    $sentencia->execute();
    $arbolesAsignosPorEstudiante = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (!empty($arbolesAsignosPorEstudiante)) {
        echo json_encode($arbolesAsignosPorEstudiante);
    } else {
        echo json_encode(["notFound" => true]);
    }
}


if (!empty($get->idArbol)) {
    // echo json_encode(["hola" => "$get->idRegistro-$get->idArbol"]);
    $data = [
        "id_registro" => null
    ];

    $where = ["id_arbol" => intval($get->idArbol)];
    $update = $db->update("arbol", $data, $where);


    if ($update) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}