
    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/EmpleadoController.php");
        require_once("./../../controllers/PacienteController.php");
        require_once("./../../controllers/AuxiliarController.php");

        $pacientes = showPaciente($_GET["id"]);
        // var_dump($pacientes);
        // die();
        $municipios = indexMunicipios();
        $tipo_empleados = indexTipoEmpleados();
        $paises = indexPaises();
        $departamentos = indexDepartamentos();
        $provincias = indexProvincias();
        $obras_sociales = indexObraSocial();
        $grupos_sanguineos = indexGrupoSanguineo();
    ?>
    
    <section>
    <div class="container">
        <h2 class="text-center">Detalles del Registro</h2>
        <?php
            if($pacientes) :
            foreach($pacientes as $paciente): ?>
            
        <div class="pb-3 d-flex gap-2">
            <a href="./index.php" class="btn btn-outline-primary" style="height:fit-content;">Volver</a>
            <a href="./edit.php?id=<?= $paciente['id_paciente']?>" style="height:fit-content;" class="btn btn-outline-success">Modificar</a>
            <form action="./functions.php" method="POST" class="formDelete">
                <input type="hidden" name="deletePaciente">
                <input type="hidden" name="id_persona" value="<?= $paciente["id_persona"]?>">
                <button type="submit" class="btn btn-outline-danger btn-delete">Eliminar</button>
            </form>
            <div class="d-flex gap-4">
                <a href="./create.php" class="btn btn-outline-success ms-auto">Agregar Paciente</a>
                
                <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
            </div>
        </div>
        <?php if(isset($_GET["msg"])=="actSucc"): ?>
        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
            <strong>Paciente</strong> actualizado con éxito.
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
                                <th>ID Paciente</th>
                                <td><?= $paciente['id_paciente']?></td>
                            </tr>
                            <tr>
                                <th>ID Persona</th>
                                <td><?= $paciente['id_persona']?></td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td><?= $paciente['nombre_persona']?></td>
                            </tr>
                            <tr>
                                <th>CUIT</th>
                                <td><?= $paciente['cuit_persona']?></td>
                            </tr>
                            <tr>
                                <th>DNI</th>
                                <td><?= $paciente['dni_persona']?></td>
                            </tr>
                            <tr>
                                <th>Obra Social</th>
                                <td>
                                    <?php 
                                        foreach($obras_sociales as $obra) {
                                            if($obra["id_obra_social"] == $paciente['id_obra_social']) {
                                                echo $obra["obra_social"];
                                                break;
                                            }
                                        }
                                    ?>    
                                </td>
                            </tr>
                            <tr>
                                <th>Municipio</th>
                                <td>
                                    <?php 
                                        foreach($municipios as $mun) {
                                            if($mun["id_municipio"] == $paciente['id_municipio']) {
                                                echo $mun["nombre_municipio"];
                                                break;
                                            }
                                        }
                                    ?>    
                                </td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td><?= $paciente['direccion']?></td>
                            </tr>
                            <tr>
                                <th>Correo Electrónico</th>
                                <td><?= $paciente['contacto']?></td>
                            </tr>
                            <tr>
                                <th>Código Postal</th>
                                <td><?= $paciente['codigo_postal']?></td>
                            </tr>
                            <tr>
                                <th>Grupo Sanguíneo</th>
                                <td>
                                    <?php 
                                        foreach($grupos_sanguineos as $grupo) {
                                            if($grupo["id_grupo_sanguineo"] == $paciente['id_grupo_sanguineo']) {
                                                echo $grupo["grupo_sanguineo"];
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Número de Seguro Social</th>
                                <td><?= $paciente['num_seguro_social']?></td>
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
