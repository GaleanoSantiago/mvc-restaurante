
    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/EmpleadoController.php");
        require_once("./../../controllers/MedicoController.php");
        require_once("./../../controllers/AuxiliarController.php");
        // $empleados = showEmpleado($_GET["id"]);
        $medicos = showMedico($_GET["id"]);

        $municipios = indexMunicipios();
        $especialidades = indexEspecialidad();
        $situacion_revista = indexSituacionRevista();
        // $tipo_empleados = indexTipoEmpleados();
    ?>
    
    <section>
        <div class="container">
            <h2 class="text-center">Detalles del Registro</h2>
            <?php
                if($medicos) :
                foreach($medicos as $medico): ?>
                
            <div class="pb-3 d-flex gap-2">
                <a href="./index.php" class="btn btn-outline-primary" style="height:fit-content;">Volver</a>
                <a href="./edit.php?id=<?= $medico['id_medico']?>" style="height:fit-content;" class="btn btn-outline-success">Modificar</a>
                <form action="./functions.php" method="POST" class="formDelete">
                    <input type="hidden" name="deleteMedico">
                    <input type="hidden" name="id_persona" value="<?= $medico["id_persona"]?>">
                    <button type="submit" class="btn btn-outline-danger btn-delete">Eliminar</button>
                </form>
                <div class="d-flex gap-4">
                    <a href="./create.php" class="btn btn-outline-success ms-auto">Agregar Médico</a>
                    
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            <?php if(isset($_GET["msg"])=="actSucc"): ?>
            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                <strong>Médico</strong> actualizado con éxito.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php else: ?>
            <div class=""></div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-11">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border"  id="myTable">
                            <tbody>
                                <tr>
                                    <th>ID Medico</th>
                                    <td><?= $medico['id_medico']?></td>
                                </tr>
                                <tr>
                                    <th>ID Empleado</th>
                                    <td><?= $medico['id_empleado']?></td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <td><?= $medico['nombre_persona']?></td>
                                </tr>
                                <tr>
                                    <th>CUIT</th>
                                    <td><?= $medico['cuit_persona']?></td>
                                </tr>
                                <tr>
                                    <th>DNI</th>
                                    <td><?= $medico['dni_persona']?></td>
                                </tr>
                                <tr>
                                    <th>Municipio</th>
                                    <td>
                                        <?php 
                                            foreach($municipios as $mun) {
                                                if($mun["id_municipio"] == $medico['id_municipio']) {
                                                    echo $mun["nombre_municipio"];
                                                    break;
                                                }
                                            }
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td><?= $medico['direccion']?></td>
                                </tr>
                                <tr>
                                    <th>Correo Electrónico</th>
                                    <td><?= $medico['contacto']?></td>
                                </tr>
                                <tr>
                                    <th>Código Postal</th>
                                    <td><?= $medico['codigo_postal']?></td>
                                </tr>
                                <tr>
                                    <th>Situación Revista</th>
                                    <td>
                                        <?php 
                                            foreach($situacion_revista as $situ) {
                                                if($situ["id_situacion_revista"] == $medico['id_situacion_revista']) {
                                                    echo $situ["situacion_revista"];
                                                    break;
                                                }
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Especialidad</th>
                                    <td>
                                        <?php 
                                            foreach($especialidades as $esp) {
                                                if($esp["id_especialidad"] == $medico['id_especialidad']) {
                                                    echo $esp["tipo_especialidad"];
                                                    break;
                                                }
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Número de Colegiado</th>
                                    <td><?= $medico['numero_colegiado']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

                <?php else : ?>
                <h2>No se encontraron registros</h2>
                <?php endif; ?>
        </div>
    </section>

<?php
    require_once("./../head/footer.php");
?>
