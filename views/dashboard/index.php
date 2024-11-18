
    <?php
        require_once("./../head/head.php");
    ?>

    <div class="container-fluid">
        <h2 class="mt-5 text-center">¡Bienvenido <?=$_SESSION["usuario"]?>!</h2>
        <div class="row">
            <div class="col-4  border-end">
                <div class="perfil-section">
                    <h4 class="text-center">Mi Perfil</h4>
                    <div class="perfil-logo">
                        <img src="./../../assets/img/user.svg" alt="">

                    </div>
                    <div class="perfil-body">
                        <h5><span class="text-color">Nombre de Usuario:</span> <?=$_SESSION['user_name']?></h5>
                        <h5><span class="text-color">Apellido y Nombre:</span> <?=$_SESSION['usuario']?></h5>
                        <h5><span class="text-color">DNI:</span> <?=$_SESSION['dni']?></h5>
                        <h5><span class="text-color">Rol de Usuario:</span> <?=$_SESSION['rol_usuario']?></h5>
                        <?php if($_SESSION['id_rol_usuario']==1): ?>
                            <div class="btn-perfil">
                                <a href="./../login/user_list.php" class="btn btn-outline-success">Administrar Usuarios</a>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
            <div class="col-8">
            <div class="diseno-section-cards ">
            <?php if($_SESSION['id_rol_usuario']==1 || $_SESSION['id_rol_usuario']==2): ?>

                <a href="#" class="card-link" data-target="medicos-section">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/medicos.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Médicos</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los médicos.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="#" class="card-link" data-target="empleados-section">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/empleados.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Empleados</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y consultar información detallada sobre los empleados.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
            <?php endif; ?>

            <?php if($_SESSION['id_rol_usuario']==4): ?>

                <!-- Para medicos -->
                <a href="./../consultas/consultas_medico.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/consultas_medico.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Mis Consultas Medicas</h3>
                        <p class="card-text">Accede aqui para ver tus consultas medicas pendientes y atendidas.</p>

                    </div>
                </div>
                </a>
                <?php endif; ?>

            <?php if($_SESSION['id_rol_usuario']==1 || $_SESSION['id_rol_usuario']==3 || $_SESSION['id_rol_usuario']==4):?>
            
                <a href="#" class="card-link" data-target="pacientes-section">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/pacientes.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Pacientes</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y consultar información detallada sobre los pacientes.</p>

                    </div>
                </div>
                </a>
            <?php endif; ?>

            <?php if($_SESSION['id_rol_usuario']==1 || $_SESSION['id_rol_usuario']==3):?>

                <a href="#" class="card-link" data-target="consultas-section" id="consultasCard">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/consultas.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Consultas Medicas</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y 
                            revisar información detallada sobre las consultas medicas.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
            <?php endif; ?>

            

            </div>

            <!----------------------------- Seccion para las consultas medicas ------------------------------->
            <div id="consultas-section" class="diseno-section-cards d-none">
                <div class="container-forBack w-100 d-flex justify-content-end align-items-center ">
                    <button class="btn btn-outline-primary btnBack">Volver</button>
                </div>
                <a href="./../consultas/index.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/listado_consultas.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Listado de Consultas</h3>
                        <p class="card-text">Acceder al listado de todas las consultas 
                            cargadas en la base de datos.</p>
                        
                    </div>
                </div>
                </a>
                <a href="./../consultas/create.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/new_consultas.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Programar Nueva Consulta </h3>
                        <p class="card-text">Programar nueva consulta entre un medico y un paciente.</p>

                    </div>
                </div>
                </a>
                
            </div>

            <!----------------------------- Seccion para los medicos ------------------------------->

            <div id="medicos-section" class="diseno-section-cards d-none">
                <div class="container-forBack w-100 d-flex justify-content-end align-items-center ">
                    <button class="btn btn-outline-primary btnBack">Volver</button>
                </div>
                <a href="./../medicos/index.php">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/list_medicos.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Lista de Médicos</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los médicos.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="./../medicos/create.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/new_medicos.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Agregar Nuevo Medico </h3>
                        <p class="card-text">Agregar nuevo médico en el sistema.</p>

                    </div>
                </div>
                </a>
                
            </div>

            <!----------------------------- Seccion para los medicos ------------------------------->

            <div id="empleados-section" class="diseno-section-cards d-none">
                <div class="container-forBack w-100 d-flex justify-content-end align-items-center ">
                    <button class="btn btn-outline-primary btnBack">Volver</button>
                </div>
                <a href="./../empleados/index.php">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/list_empleados.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Lista de Empleados</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los empleados.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="./../empleados/create.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/new_empleados.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Agregar Nuevo Empleado </h3>
                        <p class="card-text">Agregar un nuevo miembro del personal del hospital en el sistema.</p>

                    </div>
                </div>
                </a>
                
            </div>
            
            <!----------------------------- Seccion para los medicos ------------------------------->

            <div id="pacientes-section" class="diseno-section-cards d-none">
                <div class="container-forBack w-100 d-flex justify-content-end align-items-center ">
                    <button class="btn btn-outline-primary btnBack">Volver</button>
                </div>
                <a href="./../pacientes/index.php">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/listado_consultas.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Lista de Pacientes</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los pacientes.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="./../pacientes/create.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/pacientes.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Agregar Nuevo Paciente</h3>
                        <p class="card-text">Agregar un nuevo paciente en el sistema.</p>

                    </div>
                </div>
                </a>
                
            </div>


            </div>
        </div>
    
    
    
    </div>
    
<?php
    require_once("./../head/footer.php");

?>