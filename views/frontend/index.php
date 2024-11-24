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
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>
<body>
    <section>
        <div class="container-fluid">
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
                        <h3>Descripción</h3>
                        <p class="side-descripcion">Pase el mouse sobre una mesa para ver detalles!</p>

                    </div>
                </div>
                <div class="col-9">
                    <div class="container-mesas">

                    <?php 
                        if($rows) :
                            foreach($rows as $row): ?>

                        <div class="mesa-box estado-<?= $row['id_estado']?>">
                            <h1 class="titulo-mesa text-center">M <?= $row['n_mesa']?></h1>
                            <p class="estado-mesa">Estado <?= $row["estado_reservacion"]; ?></p>
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
