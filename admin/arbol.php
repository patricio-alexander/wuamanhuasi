<!DOCTYPE html>
<html lang="en">

<?php
include 'cabecera.php';

?>
<title>Arbol</title>
<style type="text/css">
    .titulo {
        color: #000000;
        background-color: #CCCCCC;
    }
</style>



<body>


    <?php
    include 'menu.php';

    ?>
    <div class="container">
        <?php
        //*Códgio insertar, editar,borrar
        
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
                    'id_ruta' => $id_ruta,
                    'id_especie' => $id_especie,
                    'descripcion' => $descripcion,
                    'estado' => $estado,
                    
                );

                $insert = $db->insert('arbol', $data);
                if ($insert) {
                    $mesaje = "Registro almacenado correctamente";
                    echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>' . $mesaje . '</div>';
                    $accion = "";
                } else {
                    $mesaje = "Error, el registro no se pudo almacenar";
                }
            }
            if ($accion == "EDITAR") {
                $data_SET = array(
                    'id_ruta' => $id_ruta,
                    'id_especie' => $id_especie,
                    'descripcion' => $descripcion,
                    'estado' => $estado,
                );

                $data_WHERE = array(
                    'id_arbol' => $id_arbol,
                );

                $actualizar = $db->update('arbol', $data_SET, $data_WHERE);
                if ($actualizar) {
                    $mesaje = "Registro actualizado correctamente";
                    echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>' . $mesaje . '</div>';
                    $accion = "";
                } else {
                    $mesaje = "Error, el registro no se pudo actualizar";
                }
            }
        }

        if ($accion == "EDITAR") {
            $id_arbol = $_REQUEST['id_arbol'];

            $condition = " AND id_arbol=$id_arbol ";
            echo "<br>" . $condition . "<br>";
            $userData = $db->select('arbol', '*', $condition, ' ORDER BY id_arbol ');
            foreach ($userData as $val) {

                $id_arbol = $val["id_arbol"];
                $descripcion = $val["descripcion"];
                $estado = $val["estado"];
                $id_ruta = $val["id_ruta"];
                $id_especie = $val["id_especie"];
            }
        }

        if ($accion == "ELIMINAR") {
            $id_arbol = $_REQUEST['id_arbol'];

            $data = array(
                'id_arbol' => $id_arbol,
            );

            $borrar = $db->delete('arbol', $data);

            if ($borrar) {
                $mesaje = "Registro eliminado correctamente";
                echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i>' . $mesaje . '</div>';
                $accion = "";
            } else {
                $mesaje = "Registro no se pudo eliminar";
            }
        }

        ?>
        <div class="row">
            <div class="col-sm-4 ">
                <div class="card">
                    <div class="card-header">
                        Arboles
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Administración de arboles</h5>

                        


                        <form>
                            <input required type="hidden" class="form-control" name="accion" id="accion" 
                            <?php if($accion=="EDITAR"){ echo " value=EDITAR";}else{ echo "value=NUEVO";}?>
                            >
                            <input required type="hidden" class="form-control" name="id_arbol" id="id_arbol" 
                            <?php if($accion=="EDITAR"){ echo " value=".$id_arbol;}?>
                            >              

                            <!-- <div class="form-group"> -->
                                <!-- <label>Elija la especie</label>  -->
                                <!-- <select class="form-control" name="id_especie"> -->
                                    <!-- <option value="0">Seleccione la especie</option> -->

                                <!-- </select> -->

                            <!-- </div> -->
                            <div class="form-group mb-3">
                                <label for="exampleFormControlSelect1">Elija la ruta</label>
                                <select class="form-control" id="id_ruta" name="id_ruta">
                                <option value='0'>Seleccione una ruta</option>
                                <?php
                                                        $condition	="  ";
                                                        $userData	=	$db->select('ruta','*',$condition,' ORDER BY id_ruta ',' LIMIT 50');
                                                        if(count($userData)>0){
                                                            $s	=	'';
                                                            foreach($userData as $val){
                                                            if($val['id_ruta']==$id_ruta){
                                                                echo "<option selected value='".$val['id_ruta']."'>".$val['nombre_ruta']."</option>";
                                                            }else{
                                                                echo "<option  value='".$val['id_ruta']."'>".$val['nombre_ruta']."</option>";
                                                            }
                                                            }
                                                        }
                                ?>
                                </select>

                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlSelect1">Elija especie</label>
                                <select class="form-control" id="id_ruta" name="id_especie">
                                <option value='0'>Seleccione especie</option>
                                <?php
                                                        $condition	="  ";
                                                        $userData	=	$db->select('especie','*',$condition,' ORDER BY id_especie',' LIMIT 50');
                                                        if(count($userData)>0){
                                                            $s	=	'';
                                                            foreach($userData as $val){
                                                            if($val['id_especie']==$id_especie){
                                                                echo "<option selected value='".$val['id_especie']."'>".$val['especie']."</option>";
                                                            }else{
                                                                echo "<option  value='".$val['id_especie']."'>".$val['especie']."</option>";
                                                            }
                                                            }
                                                        }
                                ?>
                                </select>

                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1">Descripción de la ruta</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">
                                <?php if($accion=="EDITAR") {
                                    echo $descripcion;
                                }
                                ?>
                                </textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlSelect1">Estado del árbol</label>

                                <select class="form-control" id="estado" name="estado">
                                <option value='No definido'>Elija un estado</option>
                                <option value="Saludable"             
                                <?php 
                                    if($accion=="EDITAR"){
                                    if($estado=="Saludable"){
                                        echo " selected ";
                                    }
                                    }
                                ?>>Saludable</option>
                                <option value="Extinto"
                                <?php 
                                    if($accion=="EDITAR"){
                                    if($estado=="Extinto"){
                                        echo " selected ";
                                    }
                                    }
                                ?>
                                >Extinto</option>
                                </select>
                            </div>
                            <button name="submit" id="submit" value="submit"  type="submit" class="btn btn-primary">Guardar</button>
                        </form>

                        

                    </div>
                </div>
                
                
                
            </div>

            <div class="col">
                <div class="card">
                <h5 class="card-header">Administración de arboles</h5>
                <div class="card-body">


                    <?php
                    
                    $condition = " ";
                    // echo $_REQUEST["submit"];
                    if (!empty($_REQUEST["submit"]) && $_REQUEST["submit"] !== "") {
                        // echo "hola";
                        extract($_REQUEST);
                        if ($accion == "BUSCAR") {
                            $condition = "AND descripcion LIKE '%$descripcion%'";
                            // echo "HOLA";
                            # code...
                        }
                    }
                    ?>
                    <h5 class="card-title">Lista de Arboles</h5>
                    <form class="form">
                        <input type="hidden" value="BUSCAR" name="accion">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar"  name="descripcion">
                            <input type="submit" class="btn btn-dark" value="Buscar" name="submit">
                        </div>

                    </form>
                    <?php
                    $columnas_db =["id_arbol", "descripcion", "fecha_s", "estado"];
                    
                    $arboles = $db->select('arbol', implode(",", $columnas_db), $condition);
                    $columnas = ["#", "descripción", "fecha", "estado", "acciones"];
                    // var_dump($arboles);
                    ?>                    

                    <table class="table table-hover">
                            <thead>
                            <tr>
                               <?php foreach ($columnas as $columna): ?>
                                <th><?= $columna ?></th>
                                <?php endforeach ?>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($arboles as $arbol): ?>
                                <tr>
                                    <td>
                                        <?= $arbol["id_arbol"] ?>
                                    </td>
                                    <td>
                                        <?= $arbol["descripcion"] ?>
                                    </td>
                                    <td>
                                        <?= $arbol["fecha_s"] ?>
                                    </td>
                                    <td>
                                        <?= $arbol["estado"] ?>
                                    </td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-danger">Editar</button> -->
                                        <!-- <button type="button" class="btn btn-warning">Eliminar</button> -->
                                        <a href="arbol.php?accion=ELIMINAR&id_arbol=<?= $arbol["id_arbol"] ?>"
                                        class="btn btn-danger">Eliminar</a>
                                    <a href="arbol.php?accion=EDITAR&id_arbol=<?= $arbol["id_arbol"] ?>"
                                        class="btn btn-warning">Editar</a>
                                    </td>

                                </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>



</body>
<?php include './scripts.php'; ?>
</html>