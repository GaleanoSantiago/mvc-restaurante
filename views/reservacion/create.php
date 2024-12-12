<?php

    require_once("./../head/front_head.php");
    
    $mesa = $_POST["id_mesa"] ?? 1;
    $n_mesa = $_POST["n_mesa"] ?? "";

?>
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
<section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Reservar Mesa <?= $n_mesa?></h1>
            <?php if(isset($_GET["msg"])=="userGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Reservación</strong> guardado con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>

                <!-- Pantalla para identificarse como usuario -->
                <div class="clienteCards">
                <button class="btn btn-clienteCard btn-first activado">Es mi primera reservación</button>
                <button class="btn btn-clienteCard btn-key">Tengo clave de acceso</button>
                </div>

            <form action="./functions.php" method="POST" autocomplete="off" id="formCliente">
            <!-- input controlador -->
            <input type="hidden" id="inputHidden" name="create">
            <div class="row  justify-content-center">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12 column-first">
                    <!-- Campos de Invisibles -->
                    <div class="">
                        <?php

                            // echo $mesa;
                            // die();
                        ?>
                        <input id="mesa" name="mesa" class="form-control" type="hidden" value="<?= $mesa ?>" >
                        <input id="estado" name="estado" type="hidden" value="2" >
                        <input id="fecha_reserva" name="fecha_reserva" type="hidden" value="<?= date('Y-m-d H:i:s')?>" />
                    </div>
              
                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control inputFirst" required>
                    </div>
                    <!-- Campo de Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control inputFirst" required>
                    </div>
                <!-- Campo de dni -->
                <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" name="dni" id="dni" class="form-control inputFirst" required>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    
                    
                    <!-- Numero de Personas-->
                    <div class="mb-3">
                        <label for="num_personas" class="form-label">Cantidad de Personas</label>
                        <input type="number" name="num_personas" id="num_personas" class="form-control" max="<?= $_POST['capacidad_mesa']; ?>" required>
                    </div>
            
                <!-- Codigo de acceso -->
                <div class="mb-3">
                        <label for="clave_acceso" class="form-label">Codigo de acceso</label>

                        <div class="form-pass-div d-flex gap-1">
                            <input type="text" name="clave_acceso"  id="input_clave" class="form-control" required>
                            <button type="button" id="btn_clave">
                                <span>
                                    x
                                </span>
                            </button>
                        </div>
                    </div>    
                
            </div>
            <!-- Botones -->
            <div class="col-12">
                    <div class="mb-3 d-flex justify-content-around">
                        <input type="submit" value="Guardar" class="btn btn-success">
                        <a href="./index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
        </form>
        </div>
        
    </section>

<?php
    require_once("./../head/footer.php");
?>