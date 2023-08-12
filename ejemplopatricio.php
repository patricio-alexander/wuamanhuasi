<?php


include 'include/config.php';



// INSERT DATA

// $data = [
//     "ciudad" => "Cariamanga",
//     "provincia" => "Loja",
//     "estado_civil" => "soltero"
// ];


// $insert = $db->insert('patricio_table', $data);
// if ($insert) {
//     echo "SE INSERTO CORRECTAMENTE EL REGISTRO <br/>";
// } else {
//     echo "ERROR NO SE INSERTO LOS DATOS <br/>";
// }



// DELETE DATA

// $dataToDelete = ["id" => 6];
// $remove = $db->delete('patricio_table', $dataToDelete);

// if($remove) {
//     echo "SE ELEMINÓ CORRECTAMENTE EL REGISTRO <br/>";
// } else {
//     echo "ERROR AL ELIMINAR <br/>";
// }



// UPDATE DATA
// $dataToUpdate = [
//     "ciudad" => "Cuenca",
//     "provincia" => "Azuay",
//     "estado_civil" => "viudo"
// ];

// $where = ["id" => 1];

// $update = $db->update('patricio_table', $dataToUpdate, $where);

// if ($update) {
//     echo "SE ACTULIZARON LOS DATOS <br/>";
// } else {
//     echo "NO SE PUDIERON ACTUALIZAR LOS DATOS <br/> ";
// }


//LISTAR

$condition = "AND estado_civil LIKE '%C%'";
$data = $db->select("patricio_table", "*", $condition, "ORDER BY id DESC");
// var_dump($data);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<table class="table">

<?php if(count($data) > 0): ?>
    <tr>
        <th>ID</th>
        <th>ciudad</th>
        <th>provincia</th>
        <th>estado_civil</th>
    </tr>

    <?php foreach($data as $row):?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["ciudad"] ?></td>
            <td><?= $row["provincia"] ?></td>
            <td><?= $row["estado_civil"] ?></td>
        </tr>

    <?php endforeach; ?>
<?php endif; ?>



</table>







