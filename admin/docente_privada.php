<!DOCTYPE html>
<html lang="en">

<?php include "cabecera.php" ?>

<body>
    <?php include "menu.php" ?>

    <div class="container">

        <div class="card">
            <div class="card-header">
                Asignar arbol a docente

            </div>
            <div class="card-body">
                <h5 class="card-title">Docentes</h5>
                <?php

                $coneccion =  Db::conectar();

                $sentencia = $coneccion->prepare(
                    "SELECT CONCAT(docente.nombre, ' ', docente.apellido) AS nombres_completos, 
                    docente.telefono, 
                    docente.correo, 
                    GROUP_CONCAT(ruta.nombre_ruta SEPARATOR ', ') AS rutas_asignadas
                    FROM docente 
                    INNER JOIN arbol ON docente.id_docente = arbol.id_docente
                    INNER JOIN ruta ON arbol.id_ruta = ruta.id_ruta
                    GROUP BY docente.id_docente
                    "
                );

                $sentencia->execute();
                $docentes = $sentencia->fetchAll(PDO::FETCH_OBJ);
                
                ?>


                <div class="col">

                    <table class="table">
                        <thead>
                            <tr>

                                <th>Nombres</th>
                                <th>Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($docentes as $docente) { ?>
                                <tr>
                                    <td>
                                        <?= $docente->nombres_completos ?> 
                                        </span>
                                    </td>
                                    <td>
                                        <?php 
                                            $rutas = explode(",", $docente->rutas_asignadas)
                                        ?>

                                        <div class="btn-group dropup">
                                            <button type="button" class="btn btn-dark dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Ver
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($rutas as $ruta) {?>
                                                <li><a class="dropdown-item-text" href="#"><?= $ruta ?></a></li>
                                                <?php } ?>
                                               
                                            </ul>
                                        </div>

                                        





                                    </td>
                                </tr>
                            <?php } ?>



                        </tbody>
                    </table>
                </div>

            </div>





        </div>
    </div>
    </div>


</body>
<?php include "scripts.php" ?>

</html>