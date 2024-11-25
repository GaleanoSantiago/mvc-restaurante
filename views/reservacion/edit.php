<?php

    require_once("./../head/head.php");

    //Mesas 
    require_once("./../../controllers/MesaController.php");
    $mesasObj = new MesaController();
    $mesa = $mesasObj->getMesasReservacionesLibres();

    //Estado reservacion
    require_once("./../../controllers/ReservacionesController.php");
    $obj= new ReservacionController();
    $estado_reserva = $obj->indexEstadoReservacion(); 

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
                    <div class="">
                        <input id="id_cliente" name="id_cliente" class="form-control" type="hidden" value="<?= $_POST['id_cliente'] ?>" >
                        <input id="fecha_reservacion" name="fecha_reservacion" type="hidden" value="<?= date('Y-m-d H:i:s')?>" />
                        <input type="hidden" name="id_reservacion" value="<?= $_POST['id_reservacion']?>">
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
               
                </div>

                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    
                    <!-- ID Mesa-->
                    <div class="mb-3">
                        <label for="id_mesa" class="form-label">Mesa</label>
                        <select name="id_mesa" id="id_mesa" class="form-select text-center id_mesa">
                            <?php foreach($mesa as $detallesMesa) :?> 
                                <option value="<?= $detallesMesa['id_mesa'] ?>" data-capacidad="<?= $detallesMesa['capacidad_mesa'] ?>"
                                    <?php if($detallesMesa['n_mesa']==$_POST['n_mesa']): ?> 
                                        selected 
                                    <?php endif; ?> 
        
                                        ><?= 'Mesa N° '. $detallesMesa['n_mesa'] . ' con capacidad de '. $detallesMesa['capacidad_mesa'] . ' Personas' ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Numero de Personas-->
                    <div class="mb-3">
                        <label for="numero_personas" class="form-label">Cantidad de Personas</label>
                        <input type="number" name="numero_personas" id="numero_personas" value="<?= $_POST['numero_personas'] ?>" class="form-control" max="<?= $_POST['numero_personas']; ?>" required>
                    </div>
            
                    <!-- Estado de Reservaion -->
                    <div class="mb-3">
                        <label for="estado_reserva" class="form-label">Estado de Reservacion</label>
                        <select name="estado_reserva" id="estado_reserva" class="form-select text-center estado_reserva" style="">
                            <?php foreach($estado_reserva as $estado) :?> 
                                <option  value="<?= $estado["id_estado"]?>"
                                    <?php if($estado["id_estado"]==$_POST['id_estado']): ?> 
                                        selected 
                                    <?php endif; ?> 
                                        ><?= $estado["estado_reservacion"]?></option>
                            <?php endforeach;?>
                        </select>
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