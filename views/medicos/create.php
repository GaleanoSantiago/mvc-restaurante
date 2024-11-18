
    <?php
        require_once("./../head/head.php");

        require_once("./../../controllers/EmpleadoController.php");
        require_once("./../../controllers/MedicoController.php");
        require_once("./../../controllers/AuxiliarController.php");

        $municipios = indexMunicipios();
        $tipo_empleados = indexTipoEmpleados();
        $paises = indexPaises();
        $departamentos = indexDepartamentos();
        $provincias = indexProvincias();
        $especialidades = indexEspecialidad();
        $situacion_revista = indexSituacionRevista();
        // var_dump($situacion_revista);
        // echo "<br><br>";
        // var_dump($paises);
        // die();
    ?>
    <section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Guardar Medico</h1>
            <?php if(isset($_GET["msg"])): ?>
                <?php if($_GET["msg"] == "medGuard"): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Medico</strong> guardado con exito en la base de datos.
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> <?= htmlspecialchars($_GET["msg"]) ?>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <form action="./functions.php" method="POST" autocomplete="off" class="formMedicosValidacion" id="formEmpleados">
                <!-- input controlado -->
                <input type="hidden" name="insertMedico">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre y Apellido</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                            <span id="nombreError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="situacion_revista" class="form-label">Situación Revista</label>
                            <select name="situacion_revista" id="situacion_revista" class="form-select">
                                <?php foreach($situacion_revista as $situ) :?>
                                    <option value="<?= $situ["id_situacion_revista"]?>"><?= $situ["situacion_revista"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cuit" class="form-label">Cuil 
                                <span class="text-secondary">(Solo numeros, sin guiones)</span>
                            </label>
                            <input type="number" name="cuit" id="cuitInput" class="form-control" required>
                            <span id="cuitError" class="text-danger"></span>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="municipio" class="form-label">Municipio</label>
                            <select name="municipio" id="municipio" class="form-select">
                                <?php foreach($municipios as $mun) :?>
                                    <option value="<?= $mun["id_municipio"]?>"><?= $mun["nombre_municipio"]?></option>
                                <?php endforeach;?>
                                <option value="new_municipio" class="text-center bg-success text-light">Agregar Nuevo Municipio</option>
                            </select>
                            <!-- Input dinamico para agregar (Button trigger modal) -->
                            <button type="button" class="btn btn-outline-primary d-none" id="modalTrigger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Datos Nuevo Municipio
                            </button>
                            <span id="new_municipio_span" class="text-secondary d-none"></span>
                        </div>
                        <div class="mb-3">
                            <label for="cod_postal" class="form-label">Codigo Postal</label>
                            <input type="number" name="cod_postal" id="cod_postal" class="form-control" required>
                            <span id="codPostalError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <select name="especialidad" id="especialidad" class="form-select">
                                <?php foreach($especialidades as $esp) :?>
                                    <option value="<?= $esp["id_especialidad"]?>"><?= $esp["tipo_especialidad"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <!-- Tipo de Empleado Medico -->
                        <input type="hidden" name="tipo_empleado" id="" value="1">
                        <div class="mb-3">
                            <label for="num_colegiado" class="form-label">Numero de Colegiado</label>
                            <input type="number" name="num_colegiado" id="num_colegiado" class="form-control" required>
                            <span id="numColegiadoError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" name="dni" id="dniInput" class="form-control" readonly required>
                            <span id="dniError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" required>
                            <span id="direccionError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <span id="emailError" class="text-danger"></span>
                        </div>
                    </div>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Municipio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <form action="" id="formMunicipioEmpleados" class="w-100"> -->
                        <div class="mb-3">
                            <label for="" class="form-label">Pais</label>
                            <select name="pais_empleado" id="selectPaises" class="form-select">
                                <?php foreach($paises as $pais) :?>
                                    <option value="<?= $pais["id_pais"]?>"><?= $pais["pais"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Provincias</label>
                            <select name="provincia_empleado" id="selectProvincias" class="form-select">
                                <?php foreach($provincias as $prov) :?>
                                    <option value="<?= $prov["id_provincia"]?>"><?= $prov["nombre_provincia"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Departamento</label>
                            <select name="departamento_empleado" id="selectDepartamentos" form="formEmpleados" class="form-select">
                                <?php foreach($departamentos as $depa) :?>
                                    <option value="<?= $depa["id_departamento"]?>"><?= $depa["nombre_departamento"]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre Municipio</label>
                            <input type="text" name="new_municipio" id="new_municipio_input" form="formEmpleados" class="form-control">
                        </div>
                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Agregar Municipio</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("./../head/footer.php");
?>