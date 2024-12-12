
<?php
    require_once("./../head/head.php");

    require_once("./../../controllers/ReservacionesController.php");
    $obj= new ReservacionController();
    $rows = $obj->index();
    $estado_reserva = $obj->indexEstadoReservacion();  
    // var_dump($rows);
    // die();
?>
    
    <section>
        <div class="container" >
            <h1 class="text-center">Reservaciones</h1>

            <?php if(isset($_GET["msg"]) && $_GET["msg"]=="userGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Reservación</strong> actualizada con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="mb-3 d-flex justify-content-around">
                <?php #if($_SESSION['id_rol_usuario']==1): ?>
                    <a href="../frontend/index.php" class="btn btn-success">Agregar Nueva Reservacion</a>
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
            <?php if(isset($_GET["msg"]) && $_GET["msg"]=="elimSuccs"): ?>
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
                            <th>Numero de Personas</th>
                            <th>Numero de Mesa</th>
                            <th>Capacidad de Mesa</th>
                            <th>Estado</th>
                            <?php if($_SESSION['id_rol'] == 1):?>
                                <th colspan="3">Funciones</th>
                            <?php endif; ?> 
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
                            <td><?= $row['numero_personas']?></td>
                            <td><?= $row['n_mesa']?></td>
                            <td><?= $row['capacidad_mesa']?></td>
                            
                            <td>
                                <form action="./functions.php" method="POST" style="width:100%;">
                                    <input type="hidden" name="cambiarEstado">
                                    
                                    <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                
                                    <select name="estado_reserva" id="estado_reserva" class="form-select text-center estado_reserva" style="">
                                    <?php foreach($estado_reserva as $estado) :?> 
                                        <option  value="<?= $estado["id_estado"]?>"
                                        <?php if($estado["estado_reservacion"]==$row['estado_reservacion']): ?> 
                                            selected 
                                        <?php endif; ?> 
                                    ><?= $estado["estado_reservacion"]?></option>
                                <?php endforeach;?>
                                </select>
                                </form>
                            </td>
                            <?php if($_SESSION['id_rol'] == 1):?>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-primary  btn-action" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Acciones
                                    </button>
                                </td>
                                <!-- <div class=""> -->
                                <td class="btn-funciones d-none">
                                    <form action="./functions.php" method="POST">
                                        <input type="hidden" name="deleteUsuario">
                                        <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-outline-danger btn-delete w-100" value="Borrar">
                                        </div>
                                    </form>
                                <!-- </td> -->
                                <!-- <td> -->
                                    <form action="./edit.php" method="POST">
                                        <input type="hidden" name="updateReserva">

                                        <!--Envio para modificar cliente-->
                                        <input type="hidden" name="id_cliente" value="<?= $row['id_cliente']?>">
                                        <input type="hidden" name="nombre_cliente" value="<?= $row['nombre_cliente']?>">
                                        <input type="hidden" name="apellido_cliente" value="<?= $row['apellido_cliente']?>">

                                        <!--Envio para modificar Reservacion-->
                                        <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                        <input type="hidden" name="numero_personas" value="<?= $row['numero_personas']?>">
                                        <input type="hidden" name="n_mesa" value="<?= $row['n_mesa']?>">
                                        <input type="hidden" name="capacidad_mesa" value="<?= $row['capacidad_mesa']?>">
                                        <input type="hidden" name="id_mesa" value="<?= $row['id_mesa']?>">
                                        <input type="hidden" name="id_estado" value="<?= $row['id_estado']?>">
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-outline-success  w-100" value="Editar">
                                        </div>
                                    </form>
                                </td>
                            <?php endif; ?> 
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