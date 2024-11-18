
    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/EmpleadoController.php");
        require_once("./../../controllers/MedicoController.php");
        require_once("./../../controllers/PacienteController.php");
        require_once("./../../controllers/AuxiliarController.php");
        
        $pacientes = indexPacientes();
        $medicos = indexMedicos();

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
            <h1 class="text-center">Programar Consulta</h1>
            <?php if(isset($_GET["msg"])=="consGuard"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Consulta</strong> programada con exito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <form action="./functions.php" method="POST" autocomplete="off" id="formEmpleados">
                <!-- input controlado -->
                <input type="hidden" name="insertConsulta">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Paciente</label>
                            <select name="id_paciente" id="selectPacientes" class="form-select">
                                <?php foreach($pacientes as $paciente) :?>
                                    <option value="<?= $paciente["id_paciente"]?>"><?= $paciente["nombre_persona"]?></option>
                                <?php endforeach;?>
                                <option value="new_paciente" class="text-center bg-success text-light">
                                    Agregar Nuevo Paciente
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Médico</label>
                            <select name="id_medico" class="form-select">
                                <?php foreach($medicos as $medico) :?>
                                    <option value="<?= $medico["id_medico"]?>"><?= $medico["nombre_persona"]?> (<?= $medico["especialidad"]?>)</option>
                                <?php endforeach;?>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Hora</label>
                            <input type="time" name="hora" id="" class="form-control">
                        </div>
                    </div>
                </div>


                <!----------------------- Row para pacientes nuevos ------------------------->
                <div class="row rowNewPaciente d-none">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre y Apellido</label>
                            <input type="text" name="nombre" id="" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="cuit" class="form-label">Cuil 
                                <span class="text-secondary">(Solo numeros, sin guiones)</span>
                            </label>
                            <input type="number" name="cuit" id="cuitInput" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="obra_social" class="form-label">Obra Social</label>
                            <select name="obra_social" class="form-select">
                                <?php foreach($obras_sociales as $obra) :?>
                                    <option value="<?= $obra["id_obra_social"]?>"><?= $obra["obra_social"]?></option>
                                <?php endforeach;?>
                            </select>
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
                            <!-- Input dinamico para agregar (Button trigger modal) -->
                            
                            <button type="button" class="btn btn-outline-primary d-none" id="modalTrigger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Datos Nuevo Municipio
                            </button>
                            <span id="new_municipio_span" class="text-secondary d-none"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Codigo Postal</label>
                            <input type="number" name="cod_postal" id="" class="form-control" >
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="grupo_sanguineo" class="form-label">Grupo Sanguineo</label>
                            <select name="grupo_sanguineo" class="form-select">
                                <?php foreach($grupos_sanguineos as $grupo) :?>
                                    <option value="<?= $grupo["id_grupo_sanguineo"]?>"><?= $grupo["grupo_sanguineo"]?></option>
                                <?php endforeach;?>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" name="dni" id="dniInput" class="form-control" readonly >
                        </div>
                        
                        <div class="mb-3">
                            <label for="num_seg_social" class="form-label">Número de Seguro Social</label>
                            <input type="number" name="num_seg_social" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" name="direccion" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Correo Electronico</label>
                            <input type="email" name="email" id="" class="form-control" >
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                <div class="col-12">
                        <div class="mb-3 d-flex justify-content-around">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <!-- <input type="reset" value="Reset" class="btn btn-danger"> -->
                            <?php if($_SESSION['id_rol_usuario']==4): ?>
                                <a href="./consultas_medico.php" class="btn btn-danger">Cancelar</a>
                            <?php else: ?>
                                <a href="./index.php" class="btn btn-danger">Cancelar</a>
                            
                            <?php endif; ?>
                            
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

