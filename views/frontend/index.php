<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Mesa</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>
<body>
    <section>
        <div class="container-fluid">
            
            <?php if(isset($_GET["msg"])=="userGuard"): ?>
                <div class="container d-flex justify-content-center">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Mesa <strong>Reservada</strong> con éxito.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <a href="../login/index.php">Iniciar Sesión</a>
            
            <?php 
                require_once("./../../controllers/MesaController.php");
                $obj = new MesaController();
                $rows = $obj->getMesasReservaciones();

                // var_dump($rows);
                // die();
            ?>
            <div class="row">
                <div class="col-3 border-end">
                    <div class="div-descripcion">
                        <div class="contexto-color">
                            <div class="contexto"><div class="contexto-texto">Libre</div> <div class="libre-color">x</div></div>
                            <div class="contexto"><div class="contexto-texto">Pendiente</div> <div class="pendiente-color">x</div></div>
                            <div class="contexto"><div class="contexto-texto">Ocupado</div><div class="ocupado-color">x</div></div>
                        </div>
                        <div class="descripcion-body">

                            <h3>Descripción</h3>
                            <p class="side-descripcion">Pase el mouse sobre una mesa para ver detalles!</p>
                        </div>
                        <button class="btn-reservacion" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-search"></i> Tengo Reservacion</button>
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
                </div>
                <div class="col-9">
                    <div class="container-mesas">

                    <?php 
                        if($rows) :
                            foreach($rows as $row): ?>

                        <div class="mesa-box estado-<?= $row['id_estado']?>">
                            <h1 class="titulo-mesa text-center">M <?= $row['n_mesa']?></h1>
                            <p class="capacidad-mesa">Capacidad <?= $row['capacidad_mesa']?></p>
                            <div class="descripcion-mesa d-none">

                                <?= $row['descripcion_mesa']?>
                            </div>
                            <div class="form-resgistrar">
                                <form action="./../reservacion/create.php" method="POST">
                                    <input type="hidden" name="capacidad_mesa" value="<?= $row['capacidad_mesa']?>">
                                    <input type="hidden" name="id_mesa" value="<?= $row["id_mesa"]?>">
                                    <input type="hidden" name="n_mesa" value="<?= $row["n_mesa"]?>">
                                    <button type="submit" <?= ($row['id_estado'] != 1) ? 'disabled' : '' ?> class="<?= ($row['id_estado'] != 1) ? 'd-none' : '' ?> btn btn-light">Reservar</button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                            <?php else : ?>
                                <p>No hay Registros</p>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./../../assets/js/frontend/main.js"></script>
</body>
</html>
