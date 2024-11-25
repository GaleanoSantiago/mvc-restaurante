
    <?php
        require_once("./../head/head.php");
    ?>

    <div class="container-fluid">
        <h2 class="mt-5 text-center">¡Bienvenido <?=$_SESSION["nombre_apellido"]?>!</h2>
        <div class="row">
            <div class="col-4  border-end">
                <div class="perfil-section">
                    <h4 class="text-center">Mi Perfil</h4>
                    <div class="perfil-logo">
                        <img src="./../../assets/img/user.svg" alt="">

                    </div>
                    <div class="perfil-body">
                        <h5><span class="text-color">Nombre de Usuario:</span> <?=$_SESSION['user_name']?></h5>
                        <h5><span class="text-color">Apellido y Nombre:</span> <?=$_SESSION['nombre_apellido']?></h5>
                        <h5><span class="text-color">Email:</span> <?=$_SESSION['email']?></h5>
                        <h5><span class="text-color">Rol de Usuario:</span> <?=$_SESSION['nombre_rol']?></h5>
                        <h5><span class="text-color">Fecha de Registro:</span> <?=$_SESSION['fecha_registro']?></h5>
                        <?php if($_SESSION['id_rol']==1): ?>
                            <div class="btn-perfil">
                                <a href="./../login/user_list.php" class="btn btn-outline-success">Administrar Usuarios</a>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
            <div class="col-8">
            <div class="diseno-section-cards ">

                
                <a href="#" class="card-link" data-target="empleados-section">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/clientes.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Clientes</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y consultar información detallada sobre los clientes.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                
                <a href="#" class="card-link" data-target="pacientes-section">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/reservaciones.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Reservaciones</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y consultar información detallada sobre las reservaciones.</p>

                    </div>
                </div>
                </a>
                <a href="#" class="card-link" data-target="medicos-section">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/mesas.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Mesas</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los mesas.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
            

            

            

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
                            <img src="./../../assets/img/list.svg" class="card-svg">
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
                <a href="./../frontend/index.php">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/list.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Lista de Mesas</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre las mesas.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="#">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/add.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Agregar Nueva Mesa </h3>
                        <p class="card-text">Agregar nueva mesa en el sistema.</p>

                    </div>
                </div>
                </a>
                
            </div>

            <!----------------------------- Seccion para los medicos ------------------------------->

            <div id="empleados-section" class="diseno-section-cards d-none">
                <div class="container-forBack w-100 d-flex justify-content-end align-items-center ">
                    <button class="btn btn-outline-primary btnBack">Volver</button>
                </div>
                <a href="./../clientes/index.php">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/list.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Lista de Clientes</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los clientes.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="./../clientes/create.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/add.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Agregar Nuevo Cliente </h3>
                        <p class="card-text">Agregar un nuevo miembro cliente del restaurante en el sistema.</p>

                    </div>
                </div>
                </a>
                
            </div>
            
            <!----------------------------- Seccion para los medicos ------------------------------->

            <div id="pacientes-section" class="diseno-section-cards d-none">
                <div class="container-forBack w-100 d-flex justify-content-end align-items-center ">
                    <button class="btn btn-outline-primary btnBack">Volver</button>
                </div>
                <a href="./../reservacion/index.php">
                <div class="card" >
                    <!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/list.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Lista de Reservaciones</h3>
                        <p class="card-text">Accede aquí para gestionar, actualizar y revisar información detallada sobre los pacientes.</p>
                        <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                        
                    </div>
                </div>
                </a>
                <a href="./../frontend/index.php">
                <div class="card" >
                    <div class="card-body">

                        <div class="card-logo">
                            <img src="./../../assets/img/add.svg" class="card-svg">
                        </div>
                        <h3 class="card-title">Agregar Nueva Reservación</h3>
                        <p class="card-text">Agregar un nuevoa nueva reservación en el sistema.</p>

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