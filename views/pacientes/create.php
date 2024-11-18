
    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/EmpleadoController.php");
        require_once("./../../controllers/PacienteController.php");
        require_once("./../../controllers/AuxiliarController.php");

        $municipios = indexMunicipios();
        $tipo_empleados = indexTipoEmpleados();
        $paises = indexPaises();
        $departamentos = indexDepartamentos();
        $provincias = indexProvincias();
        $obras_sociales = indexObraSocial();
        $grupos_sanguineos = indexGrupoSanguineo();
        // var_dump($obras_sociales);
        // echo "<br><br>";
        // var_dump($paises);
        // die();
    ?>
    
    <section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Guardar Paciente</h1>
            <?php if(isset($_GET["msg"])=="pacGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Paciente</strong> guardado con éxito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif(isset($_GET["errors"])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($_GET["errors"]) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <form action="./functions.php" method="POST" autocomplete="off" class="formPacientesValidacion" id="formEmpleados">
                <!-- input controlado -->
                <input type="hidden" name="insertPaciente">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre y Apellido</label>
                            <input type="text" name="nombre" class="form-control" required>
                            <span class="text-danger" id="nombreError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="cuit" class="form-label">Cuil 
                                <span class="text-secondary">(Solo números, sin guiones)</span>
                            </label>
                            <input type="number" name="cuit" id="cuitInput" class="form-control" required>
                            <span class="text-danger" id="cuitError"></span>

                        </div>
                        <div class="mb-3">
                            <label for="obra_social" class="form-label">Obra Social</label>
                            <select name="obra_social" class="form-select">
                                <?php foreach($obras_sociales as $obra) :?>
                                    <option value="<?= $obra["id_obra_social"]?>"><?= $obra["obra_social"]?></option>
                                <?php endforeach;?>
                            </select>
                            <span class="text-danger" id="obraSocialError"></span>
                        </div>

                        <div class="mb-3 d-flex flex-column ">
                            <label for="" class="form-label">Municipio</label>
                            <select name="municipio" id="municipio" class="form-select">
                                <?php foreach($municipios as $mun) :?>
                                    <option value="<?= $mun["id_municipio"]?>"><?= $mun["nombre_municipio"]?></option>
                                <?php endforeach;?>
                                <option value="new_municipio" class="text-center bg-success text-light">
                                    Agregar Nuevo Municipio
                                </option>
                            </select>
                            <button type="button" class="btn btn-outline-primary d-none" id="modalTrigger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Datos Nuevo Municipio
                            </button>
                            <span id="new_municipio_span" class="text-secondary d-none"></span>
                        </div>
                        <div class="mb-3">
                            <label for="cod_postal" class="form-label">Código Postal</label>
                            <input type="number" name="cod_postal" class="form-control" required>
                            <span class="text-danger" id="codPostalError"></span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                            <select name="grupo_sanguineo" class="form-select">
                                <?php foreach($grupos_sanguineos as $grupo) :?>
                                    <option value="<?= $grupo["id_grupo_sanguineo"]?>"><?= $grupo["grupo_sanguineo"]?></option>
                                <?php endforeach;?>
                            </select>
                            <span class="text-danger" id="grupoSanguineoError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" name="dni" id="dniInput" class="form-control" readonly required>
                            <span class="text-danger" id="dniError"></span>
                            
                        </div>
                        
                        <div class="mb-3">
                            <label for="num_seg_social" class="form-label">Número de Seguro Social</label>
                            <input type="number" name="num_seg_social" class="form-control" required>
                            <span class="text-danger" id="numSegSocialError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" class="form-control" required>
                            <span class="text-danger" id="direccionError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" required>
                            <span class="text-danger" id="emailError"></span>
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

