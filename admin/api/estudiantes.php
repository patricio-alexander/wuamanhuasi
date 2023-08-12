<?php

include '../../include/conexion.php';
include '../../include/cusuario.php'; # comprueba si esta auenticado 


$db = DB::conectar();
$params = (object) $_GET;

if (empty($params->estudianteDni)) {
    $sentencia = $db->prepare(
        'SELECT registro.id_registro, registro.cedula, estudiante.nombre, estudiante.telefono, estudiante.apellido, especialidad.especialidad, periodo_academico.nombre_ac  FROM registro INNER JOIN estudiante ON registro.cedula = estudiante.cedula 
        INNER JOIN periodo_academico ON periodo_academico.id_periodo_academico = registro.id_periodo_academico
        INNER JOIN especialidad ON especialidad.id_especialidad = registro.id_especialidad LIMIT 5'
    );
    $sentencia->execute();
    $estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($estudiantes);
} else {
    $sentencia = $db->prepare(
        "SELECT registro.id_registro, registro.cedula, estudiante.nombre, estudiante.telefono, estudiante.apellido, especialidad.especialidad, periodo_academico.nombre_ac  FROM registro INNER JOIN estudiante ON registro.cedula = estudiante.cedula 
        INNER JOIN periodo_academico ON periodo_academico.id_periodo_academico = registro.id_periodo_academico
        INNER JOIN especialidad ON especialidad.id_especialidad = registro.id_especialidad 
        WHERE estudiante.cedula LIKE ?
    ");
    $sentencia->execute(["%$params->estudianteDni%"]);
    $estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($estudiantes);
}