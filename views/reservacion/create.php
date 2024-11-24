<?php

    require_once("./../head/head.php");
    // if($_SESSION['id_rol_usuario']!=1){
    //     header('Location:./../dashboard/index.php');
    // }
    /*
    require_once("./../../controllers/ReservacionesController.php");
    $obj= new ReservacionController();
    $rows = $obj->index();
    */
    // var_dump($roles_usuario);
    // die();
?>
<section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Guardar Reservacion</h1>
            <?php if(isset($_GET["msg"])=="userGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Usuario</strong> guardado con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <form action="./functions.php" method="POST" autocomplete="off" id="formPass">
            <!-- input controlador -->
            <input type="hidden" name="create">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <!-- Campos de Invisibles -->
                    <div class="mb-3">
                        <input id="mesa" name="mesa" type="hidden" value="1" />
                        <input id="estado" name="estado" type="hidden" value="2" />
                        <input id="fecha_reserva" name="fecha_reserva" type="hidden" value="<?= date('Y-m-d H:i:s')?>" />
                    </div>
              
                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <!-- Campo de Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" required>
                    </div>
                
                </div>

                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    
                    
                    <!-- Numero de Personas-->
                    <div class="mb-3">
                        <label for="num_personas" class="form-label">Numero de Personas</label>
                        <input type="number" name="num_personas" id="num_personas" class="form-control" required>
                    </div>

                    <!-- Campo de Teléfono -->
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" name="dni" id="dni" class="form-control" required>
                    </div>
                 
                    <!-- Codigo de acceso -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Codigo de acceso</label>
                        <div class="form-pass-div d-flex gap-1">
                            <input type="password" name="clave_acceso" id="clave_acceso" class="form-control" required>
                            <button type="button" id="btnMostrar">
                                <span>
                                    <!-- Botón con ojo -->
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_iconCarrier"> 
                                            <path 
                                            d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" 
                                            stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path> 
                                        </g>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>    
                <!-- Botones -->
                <div class="col-12">
                    <div class="mb-3 d-flex justify-content-around">
                        <input type="submit" value="Guardar" class="btn btn-success">
                        <a href="./reservacion_list.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
        
    </section>

<?php
    require_once("./../head/footer.php");
?>