
<?php
    require_once("./../head/head.php");

    // if($_SESSION['id_rol_usuario']!=1){
    //     header('Location:./../dashboard/index.php');
    // }

    require_once("./../../controllers/LoginController.php");
    $obj= new UsuarioController();
    $rows = $obj->index();
        
    // var_dump($rows);
    // die();
?>
    
    <section>
        <div class="container" >
            <h1 class="text-center">Usuarios</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                <?php #if($_SESSION['id_rol_usuario']==1): ?>
                    <a href="./create.php" class="btn btn-success">Agregar Nuevo Usuario</a>
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
                    <strong>Usuario</strong> eliminado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="">
                        <tr>
                            <th>ID Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <!-- <th>ID Rol Usuario</th> -->
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>UserName</th>
                            <th>Rol Usuario</th>
                            <th>Fecha de Creación</th>
                            <th colspan="3">Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows) :
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id_usuario']?></td>
                            <td><?= $row['nombre']?></td>
                            <td><?= $row['apellido']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['telefono']?></td>
                            <td><?= $row['usuario']?></td>
                            <td><?= $row['id_rol']?></td>
                            <td><?= $row['fecha_registro']?></td>
                            <td>
                                <a href="./show.php?id=<?= $row['id_usuario']?>" class="btn btn-outline-primary">Ver</a>
                            </td>
                            <td>
                                <a href="./edit.php?id=<?= $row['id_usuario']?>" class="btn btn-outline-success">Editar</a>
                            </td>
                            <td>
                                <form action="./functions.php" method="POST">
                                    <input type="hidden" name="deleteUsuario">
                                    <input type="hidden" name="id_usuario" value="<?= $row['id_usuario']?>">
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
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filtro de licencia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- <form action="empleado_cargo.php" method="POST" autocomplete="off" id="filtro"> -->
                <div class="modal-body">
                    <div class="mb-3 d-flex align-items-end gap-4">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio de Vacaciones:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="mb-3 d-flex align-items-end gap-4">
                        <label for="fecha_final" class="form-label">Fecha Fin de Vacaciones:</label>
                        <input type="date" name="fecha_final" id="fecha_final" class="form-control">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around border">
                    <button class="btn btn-outline-danger" id="clearFiltro" data-bs-dismiss="modal">Limpiar Filtro</button>
                    <!-- <input type="submit" value="Aplicar Filtro" class="btn btn-outline-success"> -->
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" id="filterBtn">Aplicar Filtro</button>

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <!-- </form> -->
                
            </div>
        </div>
    </div>
<?php
    require_once("./../head/footer.php");
?>