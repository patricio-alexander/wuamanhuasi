//Estilo de titulo de tarjeta *******************
<style type="text/css">
  .titulo {
    color: #000000;
    background-color: #CCCCCC;
  }
</style>


//grid Administración arbol ******************************
<div class="container">
  <div class="row">
    <div class="col-sm">

      <div class="card">
        <div class="card-head ">
          <h5 class="card-title form-control titulo">Administración de árboles</h5>
        </div>
        <div class="card-body">
          Cuerpo
        </div>
      </div>

    </div>
  </div>
</div>



<form>
  <input required type="hidden" class="form-control" name="accion" id="accion" <?php if ($accion == "EDITAR") {
    echo " value=EDITAR";
  } else {
    echo "value=NUEVO";
  } ?>>
  <input required type="hidden" class="form-control" name="id_arbol" id="id_arbol" <?php if ($accion == "EDITAR") {
    echo " value=" . $id_ruta;
  } ?>>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Elija la ruta</label>
    <select class="form-control" id="id_ruta" name="id_ruta">
      <option value='0'>Seleccione una ruta</option>
      <?php
      $condition = "  ";
      $userData = $db->getAllRecords('ruta', '*', $condition, ' ORDER BY id_ruta ', ' LIMIT 50');
      if (count($userData) > 0) {
        $s = '';
        foreach ($userData as $val) {
          if ($val['id_ruta'] == $id_ruta) {
            echo "<option selected value='" . $val['id_ruta'] . "'>" . $val['nombre_r'] . "</option>";
          } else {
            echo "<option  value='" . $val['id_ruta'] . "'>" . $val['nombre_r'] . "</option>";
          }
        }
      }
      ?>
    </select>

  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción de la ruta</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">
                <?php if ($accion == "EDITAR") {
                  echo " value='" . $descripcion . "'";
                } ?>
                </textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Estado del árbol</label>

    <select class="form-control" id="estado" name="estado">
      <option value='No definido'>Elija un estado</option>
      <option value="Saludable" <?php
      if ($accion == "EDITAR") {
        if ($estado == "Saludable") {
          echo " selected ";
        }
      }
      ?>>Saludable</option>
      <option value="Extinto" <?php
      if ($accion == "EDITAR") {
        if ($estado == "Extinto") {
          echo " selected ";
        }
      }
      ?>>Extinto
      </option>
    </select>
  </div>
  <button name="submit" id="submit" value="submit" type="submit" class="btn btn-primary">Guardar</button>
</form>



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

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
  $userData = $db->getAllRecords('arbol', '*', $condition, ' ORDER BY id_arbol ');
  foreach ($userData as $val) {

    $id_arbol = $val["id_arbol"];
    $descripcion == $val["descripcion"];
    $estado = $val["estado"];
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
<?php
require_once('menu.php');
?>