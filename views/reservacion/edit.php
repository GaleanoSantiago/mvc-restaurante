<?php

    require_once("./../head/head.php");

?>
<section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Editar Reservacion</h1>

            <!--Mensaje modal emergente-->
            <?php if(isset($_GET["msg"])=="userGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Reservación</strong> guardado con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="./functions.php" method="POST" autocomplete="off" id="formUpdateReservacion">
            <!-- input controlador -->
            <input type="hidden" id="inputHidden" name="updateReserva">
            <div class="row  justify-content-center">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12 column-first">
                    <!-- Campos de Invisibles -->

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
                    
                    
                    <div class="">
                        <input id="id_cliente" name="id_cliente" class="form-control" type="hidden" <?= $_POST['id_cliente'] ?> >
                        <input id="fecha_reserva" name="fecha_reserva" type="hidden" value="<?= date('Y-m-d H:i:s')?>" />
                    </div>
              
                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?= $_POST['nombre_cliente'] ?>" class="form-control inputFirst" required>
                    </div>
                    
                    <!-- Campo de Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" value="<?= $_POST['apellido_cliente'] ?>" class="form-control inputFirst" required>
                    </div>
                <!-- Campo de dni -->
                <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" name="dni" id="dni" class="form-control inputFirst" required>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    
                    <!-- ID Mesa-->
                    <div class="mb-3">
                        <label for="id_mesa" class="form-label">Mesa</label>
                        <select name="id_mesa" id="id_mesa" class="form-select text-center id_mesa" style="color:#fff;">
                            <option value=""></option>
                        </select>
                    </div>

                    <!-- Numero de Personas-->
                    <div class="mb-3">
                        <label for="numero_personas" class="form-label">Cantidad de Personas</label>
                        <input type="number" name="numero_personas" id="numero_personas" value="<?= $_POST['numero_personas'] ?>" class="form-control" max="<?= $_POST['numero_personas']; ?>" required>
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
                <!-- Botones -->
                <div class="col-12">
                    <div class="mb-3 d-flex justify-content-around">
                        <input type="submit" value="Guardar" class="btn btn-success">
                        <a href="./index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
        
    </section>

<?php
    require_once("./../head/footer.php");
?>