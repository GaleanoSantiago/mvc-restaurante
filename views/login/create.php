<?php

    require_once("./../head/head.php");
    if($_SESSION['id_rol_usuario']!=1){
        header('Location:./../dashboard/index.php');
    }
    require_once("./../../controllers/EmpleadoController.php");
    require_once("./../../controllers/AuxiliarController.php");
    require_once("./../../controllers/LoginController.php");

    $empleados = indexModel();
    $roles_usuario = indexRolesUsuario();
    // var_dump($empleados);
    // die();
?>
<section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Guardar Usuario</h1>
            <?php if(isset($_GET["msg"])=="userGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Usuario</strong> guardado con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <form action="./functions.php" method="POST" autocomplete="off" id="formPass">
                <!-- input controlado -->
                <input type="hidden" name="insertUsuario">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Nombre de Usuario</label>
                            <input type="text" name="user_name" id="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <!-- <input type="password" name="password" class="form-control" id="passwordInput1" required> -->
                            <div class="form-pass-div d-flex gap-1">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <button type="button" id="btnMostrar">
                                    <span class="" >
                                        <!-- Boton con ojo -->
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier"> 
                                        <path 
                                        d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" 
                                        stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="id_persona" class="form-label ">Seleccionar Persona 
                                <span class="text-secondary"></span>(Id Persona | Nombre)</label>

                            <select name="id_persona" id="" class="form-select">
                                <?php foreach($empleados as $empleado) :?>
                                    <option value="<?= $empleado["id_persona"]?>"><?= $empleado["id_persona"]?> | <?= $empleado["nombre_persona"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="num_colegiado" class="form-label">Rol de Usuario</label>
                            <select name="id_rol_usuario" id="" class="form-select">
                                <?php foreach($roles_usuario as $rol) :?>
                                    <option value="<?= $rol["id_rol_usuario"]?>"><?= $rol["rol_usuario"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-12">
                        <div class="mb-3 d-flex justify-content-around">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <!-- <input type="reset" value="Reset" class="btn btn-danger"> -->
                            <a href="./user_list.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </section>

<?php
    require_once("./../head/footer.php");
?>