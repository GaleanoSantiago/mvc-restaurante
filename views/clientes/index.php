
<?php
    require_once("./../head/head.php");

    // if($_SESSION['id_rol_usuario']!=1){
    //     header('Location:./../dashboard/index.php');
    // }

    require_once("./../../controllers/ClienteController.php");
    $obj= new CLienteController();
    $rows = $obj->index();
    // $estado_reserva = $obj->indexEstadoReservacion();  
    // var_dump($rows);
    // die();
?>
    
    <section>
        <div class="container" >
            <h1 class="text-center">Clientes</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                <?php #if($_SESSION['id_rol_usuario']==1): ?>
                    <a href="./create.php" class="btn btn-success">Agregar Nuevo Cliente</a>
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
                    <strong>Cliente</strong> almacenado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="">
                        <tr>			
                            <th>ID Cliente</th>
                            <th>Nombre y Apellido</th>
                            <th>DNI</th>
                            <th>Clave de Acceso</th>

                            <th colspan="2">Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows): 
                        
                        foreach($rows as $row): ?>
                        
                        <tr>
                            <td><?= $row['id_cliente']?></td>
                            <td><?= $row['nombre_cliente'] ." ". $row['apellido_cliente']?></td>
                            <td><?= $row['dni_cliente']?></td>
                            <td><?= $row['clave_acceso_cliente']?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary  btn-action" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Acciones
                                </button>
                            </td>
                            <td colspan=""   class="btn-funciones d-none">
                                <a href="./edit.php?id=<?= $row['id_cliente'];?>" class="btn btn-outline-primary w-100">Editar</a>

                                <form action="./functions.php" method="POST" style="">
                                    <input type="hidden" name="delete">
                                    <input type="hidden" name="id_cliente" value="<?= $row['id_cliente']?>">
                                    <input type="submit" class="btn btn-outline-danger btn-delete w-100" value="Borrar">
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Acciones</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-contenido d-flex justify-content-around">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
    require_once("./../head/footer.php");
?>