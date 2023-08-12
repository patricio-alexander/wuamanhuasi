<!DOCTYPE html>
<html lang="en">

<?php include "cabecera.php" ?>

<body>
  <?php include "menu.php";
  
  if ($_SESSION['usuario']->getTipo() !== 'ADMIN') {					
      echo "<br>No tines permiso para acceder";
      echo "<br>Contacta con el administrador";
      header('Location: ../include/controller_login.php?accion=CERRARCESION');
      return;
  }
  
  ?>



  <div class="container" x-data>

    <div class="card">

      <div class="card-header">
        Arboles Estudiantes
      </div>
      <div class="card-body">

        <div class="d-flex justify-content-end mb-3">
          <div class="input-group" style="width: 250px">
            <span class="input-group-text"><span class="icon-address-card"></span></span>
            <input type="text" class="form-control" placeholder="Buscar por cédula"
              @input="$store.estudiantesStore.buscarEstudiantes($event)" />
          </div>
        </div>








        <div class="table-responsive">
          <table class="table" id="tabla_estudiantes">
            <thead x-data="{
              columnas: [
                'Cedula',
                'Nombre',
                'Apellido',
                'Telefono',
                'Especialidad',
                'Periodo',
                'Accion',
                ]
              }
              ">
              <tr>
                <template x-for="columna in columnas">
                  <th x-text="columna"></th>
                </template>
              </tr>

            </thead>
            <tbody>
              <template x-for="estudiante in $store.estudiantesStore.estudiantes">
                <tr>
                  <td x-text="estudiante.cedula"></td>
                  <td x-text="estudiante.nombre"></td>
                  <td x-text="estudiante.apellido"></td>
                  <td x-text="estudiante.telefono"></td>
                  <td x-text="estudiante.especialidad"></td>
                  <td x-text="estudiante.nombre_ac"></td>
                  <td>
                    <button type="button" class="btn btn-outline-primary" @click="mostrarDatosEnModal"
                      data-bs-toggle="modal" data-bs-target="#modal_asignar_arbol"
                      :data-bs-id-registro="estudiante.id_registro"
                      :data-bs-whatever="`${estudiante.cedula}-${estudiante.nombre}-${estudiante.apellido}`">
                      Asignaciones
                    </button>
                  </td>

                </tr>
              </template>




            </tbody>

          </table>

        </div>



        <div class="modal fade" id="modal_asignar_arbol" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Arbol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form @submit.prevent="asignarArbol">
                <div class="modal-body">
                  <div class="row">
                    <h6>Asignar arbol</h6>
                    <div class="col">
                      <div class="mb-3">
                        <div class="input-group mb-3">
                          <span class="input-group-text">@</span>
                          <input type="text" autocomplete="off" class="form-control input_cedula" aria-label="cedula"
                            readonly>
                          <input type="hidden" class="id_registro" name="idRegistro">
                        </div>



                      </div>
                    </div>


                    <div class="col">
                      <div class="mb-3">
                        <!-- <div class="dropdown">
                          <button class="btn btn-light btn_dropdown_asignar_arbol" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false" >
                            Buscar Arboles

                          </button>

                          <div class="dropdown-menu" id="dropdown_lista_arboles">
                            <div class="m-2">
                              <input class="form-control" @input="filtrarArboles" aria-describedby="emailHelp">
                              <input type="hidden" class="input_id_arbol_item" name="idArbol">
                            </div>
                            <ul id="lista_arboles" class="scrollable-container list-group">


                            </ul>

                          </div>
                        </div> -->
                        <div class="btn-group">
                          <button class="btn btn-light dropdown-toggle " type="button" id="dropdownMenuClickableInside"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            Seleccionar árbol
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="width: 300px">
                            <li class="m-2">
                              <input class="form-control" @input="filtrarArboles" aria-describedby="emailHelp">
                              <!-- <input type="hidden" class="input_id_arbol_item" name="idArbol"> -->
                            </li>
                            <div id="lista_arboles" class="scrollable-container list-group list-group-flush">


                            </div>

                          </ul>
                        </div>


                      </div>
                    </div>



                  </div>

                  <div class="row">
                    <div class="column">
                      <h6>Lista de Asignaciones</h6>
                      <ul class="list-group list-group-flush" id="lista_asignaciones">

                      </ul>
                    </div>
                  </div>



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php include "scripts.php" ?>

  <script src="./js/asignar_arbol.min.js"></script>
  <script src="./js/alpinejs.min.js"></script>

</body>


</html>