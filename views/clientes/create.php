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
    // $mesa = $_POST["id_mesa"] ?? 1;
    // $n_mesa = $_POST["n_mesa"] ?? "";

?>
<section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Guardar Cliente</h1>
            <?php if(isset($_GET["msg"])=="userGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cliente</strong> guardado con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>


            <form action="./functions.php" method="POST" autocomplete="off" id="formCliente">
            <!-- input controlador -->
            <input type="hidden" id="inputHidden" name="create">
            <div class="row  justify-content-center">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12 column-first">
                    
                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control " required>
                    </div>
                    
                    <!-- Campo de dni -->
                    <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" name="dni" id="dni" class="form-control " required>
                        </div>
                    </div>

                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    
                    <!-- Campo de Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control " required>
                    </div>
                    
            
                    <!-- Codigo de acceso -->
                    <div class="mb-3">
                        <label for="clave_acceso" class="form-label">Código de acceso</label>

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