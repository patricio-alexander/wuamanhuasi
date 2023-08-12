<?php

include 'include/config.php';



// INSERT DATA

// $data = [
//     "cedula" => "1106011424",
//     "nombre" => "patricio",
//     "apellido" => "briceno",
//     "telefono" => "923242334",
//     "correo" => "pato@gmail.com",
//     "foto_perfil" => "imagenFotoPato.jpg"

// ];


// $insert = $db->insert('estudiante', $data);
// if ($insert) {
//     echo "SE INSERTO CORRECTAMENTE EL REGISTRO <br/>";
// } else {
//     echo "ERROR NO SE INSERTO LOS DATOS <br/>";
// };



// DELETE DATA

// $dataToDelete = ["cedula" => 1106011421];
// $remove = $db->delete('estudiante', $dataToDelete);

// if($remove) {
//     echo "SE ELEMINÓ CORRECTAMENTE EL REGISTRO <br/>";
// } else {
//     echo "ERROR AL ELIMINAR <br/>";
// }





// // UPDATE DATA
// $dataToUpdate = [
//     "nombre" => "alexander",
//     "apellido" => "sarango",
//     "telefono" => "11111111",
//     "correo" => "alex@gmail.com",
//     "foto_perfil" => "fotoAlex2.jpg"
// ];

// $where = ["cedula" => 1106011421];

// $update = $db->update('estudiante', $dataToUpdate, $where);

// if ($update) {
//     echo "SE ACTULIZARON LOS DATOS <br/>";
// } else {
//     echo "NO SE PUDIERON ACTUALIZAR LOS DATOS <br/> ";
// }


// LIST DATA


// $condition = "AND estado_civil LIKE '%C%'";
$data = $db->select("estudiante", "*", "ORDER BY cedula DESC");
?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
<table class="table">

    <?php if (count($data) > 0) : ?>
        <tr>
            <th>DNI</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>telefono</th>
            <th>correo</th>
            <th>foto</th>
        </tr>

        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?= $row["cedula"] ?></td>
                <td><?= $row["nombre"] ?></td>
                <td><?= $row["apellido"] ?></td>
                <td><?= $row["telefono"] ?></td>
                <td><?= $row["correo"] ?></td>
                <td><?= $row["foto_perfil"] ?></td>
            </tr>

        <?php endforeach; ?>
    <?php endif; ?>



</table>