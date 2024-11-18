
    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/MedicoController.php");
        require_once("./../../controllers/AuxiliarController.php");

        $rows = indexMedicos();
        $especialidades = contMedicosPorEspecialidad2();
        $situacion_revista = indexSituacionRevista();
        // var_dump($rows);
        // die();
    ?>
    
    <section>
        <div class="container-fluid">
            <h1 class="text-center">Médicos</h1>
            
            <div class="mb-3">
            </div>
            <div class="mb-3 d-flex justify-content-around">
                <a href="./create.php" class="btn btn-success">Agregar Nuevo Medico</a>

                <!-- Button trigger modal -->
                
                <div class="d-flex gap-4">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrar Datos
                    </button>
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            <?php if(isset($_GET["msg"])=="elimSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Medico</strong> eliminado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="">
                        <tr>
                            <th>ID Medico</th>
                            <th>ID Empleado</th>
                            <th>Nombre y Apellido</th>
                            <th>Especialidad</th>
                            <th>Situación Revista</th>
                            <th>Número de Colegiado</th>
                            <th>CUIT</th>
                            <th>DNI</th>
                            <th>Municipio</th>
                            <th>Dirección</th>
                            <th>Código Postal</th>
                            <th>Contacto</th>
                            <th colspan="3">Funciones</th>
                            <!-- <th>Editar</th> -->
                            <!-- <th>Eliminar</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows) :
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id_medico']?></td>
                            <td><?= $row['id_empleado']?></td>
                            <td><?= $row['nombre_persona']?></td>
                            <td><?= $row['especialidad']?></td>
                            <td><?= $row['situacion_revista']?></td>
                            <td><?= $row['numero_colegiado']?></td>
                            <td><?= $row['cuit_persona']?></td>
                            <td><?= $row['dni_persona']?></td>
                            <td><?= $row['nombre_municipio']?></td>
                            <td><?= $row['direccion']?></td>
                            <td><?= $row['codigo_postal']?></td>
                            <td><?= $row['contacto']?></td>
                            <td>
                                <a href="./show.php?id=<?=$row['id_medico']?>" 
                                class="btn btn-outline-primary">Ver</a>
                            </td>
                            <td>
                                <a href="./edit.php?id=<?=$row['id_medico']?>" 
                                class="btn btn-outline-success">Editar</a>
                            </td>
                            <td>
                                <form action="./functions.php" method="POST">
                                    <input type="hidden" name="deleteMedico">
                                    <input type="hidden" name="id_persona" value="<?= $row['id_persona']?>">
                                    <input type="hidden" name="id_empleado" value="<?= $row['id_empleado']?>">
                                    <input type="hidden" name="id_medico" value="<?= $row['id_medico']?>">
                                    <input type="submit" class="btn btn-outline-danger btn-delete" value="Borrar">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">No hay Registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Filtros</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 d-flex align-items-end gap-4">
                    <label for="especialidad" class="form-label">Especialidad:</label>
                    <select name="especialidad" id="filterEspecialidad" class="form-select">
                        <!-- Esta option es para no utilizar este parametro para el filtro -->
                        <option value="0">NO APLICAR FILTRO</option>
                    <?php foreach($especialidades as $esp) :?>
                        <option value="<?= $esp["id_especialidad"]?>"><?= $esp["tipo_especialidad"]?> (<?= $esp['cantidad_registros']?>)</option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-end gap-4">
                    <label for="especialidad" class="form-label">Situacion Revista:</label>
                    <select name="situacion_revista" id="filterSituRevista" class="form-select">
                        <!-- Esta option es para no utilizar este parametro para el filtro -->
                        <option value="0">NO APLICAR FILTRO</option>
                    <?php foreach($situacion_revista as $situ) :?>
                        <option value="<?= $situ["id_situacion_revista"]?>"><?= $situ["situacion_revista"]?> (<?= $situ['cantidad_registros']?>)</option>
                    <?php endforeach;?>
                    </select>
                </div>
                </div>
            <div class="modal-footer d-flex justify-content-around">
                
                <!-- Boton para quitar todos los filtros (mostrar todas las filas) -->
                <button class="btn btn-outline-danger" id="clearFiltro" data-bs-dismiss="modal">Limpiar Filtro</button>
                <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" id="filterBtn">Aplicar Filtro</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php
    require_once("./../head/footer.php");
?>
