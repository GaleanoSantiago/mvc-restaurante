<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Reservación</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>

<body>
    <?php
        require_once "./../../controllers/ReservacionesController.php";

        $obj = new ReservacionController();
        $rows = $obj->getByClave();
        $estado_reserva = $obj->indexEstadoReservacion();  

        // var_dump($reservaciones);
    ?>
    <section>
        <div class="container" >
            <h1 class="text-center">Reservaciones</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                <?php #if($_SESSION['id_rol_usuario']==1): ?>
                    <a href="../frontend/index.php" class="btn btn-success" style="height:fit-content;">Hacer Nueva Reservación</a>

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
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="">
                        <tr>			
                            <!-- <th>ID Reservacion</th>
                            <th>ID Cliente</th> -->
                            <th>Cliente</th>
                            <th>Fecha Reservacion</th>
                            <th>Cantidad de Personas</th>
                            <th>Numero de Mesa</th>
                            <th>Capacidad de Mesa</th>
                            <th>Estado</th>
                            <th colspan="3">Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows): 
                        
                        foreach($rows as $row): ?>
                        <tr>
                            <!-- <td><?= $row['id_reservacion']?></td>
                            <td><?= $row['id_cliente']?></td> -->
                            <td><?= $row['nombre_cliente'] ." ". $row['apellido_cliente']?></td>
                            <td><?= $row['fecha_reservacion']?></td>
                            <td><?= $row['numero_personas']?></td>
                            <td><?= $row['n_mesa']?></td>
                            <td><?= $row['capacidad_mesa']?></td>
                            <td>
                                <?php foreach($estado_reserva as $estado) :?> 
                                        <?php if($estado["estado_reservacion"]==$row['estado_reservacion']): ?> 
                                            <?=$estado["estado_reservacion"];?>
                                        <?php endif; ?> 
                                <?php endforeach;?>
                            </td>
                            <td>
                                <form action="./functions.php" method="POST">
                                    <input type="hidden" name="cancelar">
                                    <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                    <input type="submit" class="btn btn-outline-danger btn-delete" value="Cancelar">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                            <tr>
                                <td colspan="13" class="text-center">No se encontraron reservaciones asociadas a esos datos, vuelva a intentar</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="mb-3 ">
                    <!-- <a href="./index.php" class="btn btn-primary">Volver</a> -->
                    <button class="btn-reservacion" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-search"></i> Buscar Otra Reservación</button>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Ingrese sus datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <p class="text-secondary text-center">Ingrese sus Datos</p> -->
                        <form action="./buscar_reservacion.php" method="post" id="formCliente" autocomplete="off">
                            <div class="mb-3">
                                <label for="" class="form-label">DNI</label>
                                <input type="number" class="form-control" name="dni" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Clave de Acceso</label>
                                <input type="text" class="form-control" name="clave" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" form="formCliente">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./../../assets/js/frontend/main.js"></script>
</body>