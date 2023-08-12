<!DOCTYPE html>
<html lang="en">


<?php
include './cabecera.php';
?>


<body>


    <?php
    include 'menu.php';
    ?>




    <div class="container">
        <div class="row">
            <div class="col">

                <?php

                if (isset($_REQUEST['accion']) and $_REQUEST['accion'] != "") {
                    $accion = $_REQUEST["accion"];
                } else {
                    $accion = "";
                }

                if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
                    //echo "Boton:".$_REQUEST['submit'];
                    extract($_REQUEST);

                    if ($accion == "NUEVO") {
                        $data = array(
                            'nombre_ruta' => $nombre,
                        );

                        $insert = $db->insert('ruta', $data);
                        if ($insert) {
                            $mensaje = "Registro almacenado correctamente";
                            echo "<div class='alert alert-success'><i class='fa fa-thumbs-up'></i> $mensaje </div>";
                            $accion = "";
                        } else {
                            $mensaje = "Error, el registro no se pudo almacenar";
                        }
                    }
                    if ($accion == "EDITAR") {
                        $data_SET = array(
                            'nombre_ruta' => $nombre,
                        );

                        $data_WHERE = array(
                            'id_ruta' => $id_ruta,
                        );

                        $actualizar = $db->update('ruta', $data_SET, $data_WHERE);
                        if ($actualizar) {
                            $mensaje = "Registro actualizado correctamente";
                            echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>' . $mensaje . '</div>';
                            $accion = "";
                        } else {
                            $mensaje = "Error, el registro no se pudo actualizar";
                        }
                    }
                }

                if ($accion == "EDITAR") {
                    $id_ruta = $_REQUEST['id_ruta'];

                    $condition = " AND id_ruta=$id_ruta ";
                    // echo "<br>" . $condition . "<br>";
                    $userData = $db->select('ruta', '*', $condition, ' ORDER BY id_ruta ');
                    foreach ($userData as $val) {
                        $id_ruta = $val["id_ruta"];
                        $nombre = $val["nombre_ruta"];
                    }
                }

                if ($accion == "ELIMINAR") {
                    $id_ruta = $_REQUEST['id_ruta'];

                    $data = array(
                        'id_ruta' => $id_ruta,
                    );

                    $borrar = $db->delete('ruta', $data);

                    if ($borrar) {
                        $mensaje = "Registro eliminado correctamente";
                        echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i>' . $mensaje . '</div>';
                        $accion = "";
                    } else {
                        $mensaje = "Registro no se pudo eliminar";
                    }
                }


                ?>
                <div class="card">
                    <div class="card-head">
                        <h5 class="card-title form-control">Administración de rutas</h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre ruta</label>
                                <input required type="hidden" class="form-control" name="accion" id="accion" <?php if ($accion == "EDITAR") {
                                    echo " value=EDITAR";
                                } else {
                                    echo "value=NUEVO";
                                } ?>>
                                <input required type="hidden" class="form-control" name="id_ruta" id="id_ruta" <?php if ($accion == "EDITAR") {
                                    echo " value=" . $id_ruta;
                                } ?>>
                                <input required type="text" class="form-control" name="nombre" id="nombre"
                                    placeholder="Ingrese el nombre de la ruta" <?php if ($accion == "EDITAR") {
                                        echo " value='" . $nombre . "'";
                                    } ?>>
                            </div>
                            <div class="mb-3">
                                <button name="submit" value="submit" id="submit" type="submit" class="btn btn-primary">
                                    Guardar
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de la ruta</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rutas = $db->select("ruta");

                        ?>
                        <?php foreach ($rutas as $ruta): ?>
                            <tr>
                                <td>
                                    <?= $ruta["id_ruta"] ?>
                                </td>
                                <td>
                                    <?= $ruta["nombre_ruta"] ?>
                                </td>
                                <td>
                                    <a href="ruta.php?accion=ELIMINAR&id_ruta=<?= $ruta["id_ruta"] ?>"
                                        class="btn btn-danger">Eliminar</a>
                                    <a href="ruta.php?accion=EDITAR&id_ruta=<?= $ruta["id_ruta"] ?>"
                                        class="btn btn-warning">Editar</a>
                                </td>
                            </tr>





                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>

    </div>







</body>
<?php include './scripts.php'; ?>

</html>