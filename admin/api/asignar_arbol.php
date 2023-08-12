<?php
include '../../include/cusuario.php';
// include '../include/conexion.php';
include '../../include/config.php';

$body = json_decode(file_get_contents('php://input'));
$ok = false;

if (!empty($body->idRegistro)) {
   $data = [
      "id_registro" => intval($body->idRegistro)
   ];

   foreach ($body as $key => $value) {
      
      if (strpos($key, 'idArbol') !== false) {
         $where = ["id_arbol" => intval($value)];
         $update = $db->update("arbol", $data, $where);
         if ($update) {
            $ok = true;
         }
         
         
      }

   }
   echo json_encode(["success" => $ok]);

   // if ($update) {
   // } else {
   //    echo json_encode(["success" => false]);
   // }


   //  echo json_encode(["hola" => $data->idRegistro]);


} else {
   echo json_encode(["error" => "No se proporcionó un idRegistro válido"]);
}