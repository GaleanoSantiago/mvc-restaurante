    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/EmpleadoController.php");
        require_once("./../../controllers/AuxiliarController.php");
        $empleados = showEmpleado($_GET["id"]);
        $municipios = indexMunicipios();
        $tipo_empleados = indexTipoEmpleados();
    ?>
    <section>
    <div class="container">
        <h2 class="text-center">Detalles del Registro</h2>
        <?php
            if($empleados) :
            foreach($empleados as $empleado): ?>
            
        <div class="pb-3 d-flex gap-2">
            <a href="./index.php" class="btn btn-outline-primary" style="height:fit-content;">Volver</a>
            <a href="./edit.php?id=<?= $empleado['id_empleado']?>" style="height:fit-content;" class="btn btn-outline-success">Modificar</a>
            <form action="./functions.php" method="POST" class="formDelete">
                <input type="hidden" name="deleteEmpleado">
                <input type="hidden" name="id_persona" value="<?= $empleado["id_persona"]?>">
                <button type="submit" class="btn btn-outline-danger btn-delete">Eliminar</button>
            </form>
            <div class="d-flex gap-4">
                <a href="./create.php" class="btn btn-outline-success ms-auto">Agregar Empleado</a>
                
                <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
            </div>
        </div>
        <?php if(isset($_GET["msg"])=="actSucc"): ?>
        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
            <strong>Empleado</strong> actualizado con éxito.
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
                                <th>ID</th>
                                <td><?= $empleado['id_empleado']?></td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td><?= $empleado['nombre_persona']?></td>
                            </tr>
                            <tr>
                                <th>CUIT</th>
                                <td><?= $empleado['cuit_persona']?></td>
                            </tr>
                            <tr>
                                <th>DNI</th>
                                <td><?= $empleado['dni_persona']?></td>
                            </tr>
                            <tr>
                                <th>Municipio</th>
                                <td>
                                    <?php 
                                        foreach($municipios as $mun) {
                                            if($mun["id_municipio"] == $empleado['id_municipio']) {
                                                echo $mun["nombre_municipio"];
                                                break;
                                            }
                                        }
                                    ?>    
                                </td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td><?= $empleado['direccion_persona']?></td>
                            </tr>
                            <tr>
                                <th>Correo Electrónico</th>
                                <td><?= $empleado['contacto_persona']?></td>
                            </tr>
                            <tr>
                                <th>Código Postal</th>
                                <td><?= $empleado['codigo_postal']?></td>
                            </tr>
                            <tr>
                                <th>Tipo de Empleado</th>
                                <td>
                                    <?php 
                                        foreach($tipo_empleados as $tipo) {
                                            if($tipo["id_tipo_empleado"] == $empleado['id_tipo_empleado']) {
                                                echo $tipo["tipo_empleado"];
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Inicio de Vacaciones</th>
                                <td><?= $empleado['fecha_inicio']?></td>
                            </tr>
                            <tr>
                                <th>Final de Vacaciones</th>
                                <td><?= $empleado['fecha_fin']?></td>
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
