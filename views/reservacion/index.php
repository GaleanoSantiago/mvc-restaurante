
<?php
    require_once("./../head/head.php");

    // if($_SESSION['id_rol_usuario']!=1){
    //     header('Location:./../dashboard/index.php');
    // }

    require_once("./../../controllers/ReservacionesController.php");
    $obj= new ReservacionController();
    $rows = $obj->index();
        
    // var_dump($rows);
    // die();
?>
    
    <section>
        <div class="container" >
            <h1 class="text-center">Reservaciones</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                <?php #if($_SESSION['id_rol_usuario']==1): ?>
                    <a href="./create.php" class="btn btn-success">Agregar Nueva Reservacion</a>
                <?php #endif; ?>

                
                <div class="d-flex gap-4">
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrar Datos
                    </button> -->
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            <?php if(isset($_GET["msg"])=="elimSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Reservacion</strong> eliminado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="">
                        <tr>			
                            <th>ID Reservacion</th>
                            <th>ID Cliente</th>
                            <th>Cliente</th>
                            <th>Fecha Reservacion</th>
                            <!-- <th>ID Rol Usuario</th> -->
                            <th>Estado</th>
                            <th>Numero de Personas</th>
                            <th>Numero de Mesa</th>
                            <th>Capacidad de Mesa</th>
                            <th colspan="3">Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows): 
                        
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id_reservacion']?></td>
                            <td><?= $row['id_cliente']?></td>
                            <td><?= $row['nombre_cliente'] ." ". $row['apellido_cliente']?></td>
                            <td><?= $row['fecha_reservacion']?></td>
                            <td><?= $row['estado_reservacion']?></td>
                            <td><?= $row['numero_personas']?></td>
                            <td><?= $row['n_mesa']?></td>
                            <td><?= $row['capacidad_mesa']?></td>
                            <td>
                                <a href="./edit.php?id=<?= $row['id_reservacion']?>" class="btn btn-outline-success">Editar</a>
                            </td>
                            <td>
                                <form action="./functions.php" method="POST">
                                    <input type="hidden" name="deleteUsuario">
                                    <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                    <input type="submit" class="btn btn-outline-danger btn-delete" value="Borrar">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                            <tr>
                                <td colspan="13" class="text-center">No hay Registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
   
<?php
    require_once("./../head/footer.php");
?>