    <?php
        require_once("./../head/head.php");
        require_once("./../../controllers/PacienteController.php");
        require_once("./../../controllers/ConsultaController.php");
        require_once("./../../controllers/AuxiliarController.php");

        $rows = indexConsultas();
        $estado_consultas = indexEstadoConsultas()
        // var_dump($rows);
        // die();
    ?>
    
    <section>
        <div class="container-fluid" >
            <h1 class="text-center">Consultas</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                    
                    <a href="./create.php" class="btn btn-success">Programar Consulta</a>
                
                <div class="d-flex gap-4">
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrar Datos
                    </button> -->
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            <?php if(isset($_GET["msg"])=="elimSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Consulta</strong> eliminada con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id="myTable">
                <thead class="">
                    <tr>
                        <th>ID Consulta</th>
                        
                        <th style="width:150px;">Paciente</th>
                        <th>Obra Social</th>
                        <th>Grupo Sanguineo</th>
                        <th>N° Seguro Social</th>
                        <th>CUIT</th>
                        <th>DNI</th>
                        <th>Contacto</th>
                        <th style="width:200px;">Fecha y Hora</th>
                        <th style="width:150px;">Médico</th>
                        <th style="width:240px;">Estado Consulta</th>
                        <th colspan="2">Funciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if($rows) :
                    foreach($rows as $row): ?>
                    <tr>
                        <td><?= $row['id_consulta']?></td>
                        
                        <td><?= $row['nombre_paciente']?></td>
                        <td><?= $row['obra_social']?></td>
                        <td><?= $row['grupo_sanguineo']?></td>
                        <td><?= $row['num_seguro_social']?></td>
                        <td><?= $row['cuit_persona']?></td>
                        <td><?= $row['dni_paciente']?></td>
                        <td><?= $row['contacto']?></td>
                        <td><?= $row['fecha_hora']?></td>
                        <td><?= $row['nombre_medico']?></td>
                        <td>
                            <form action="./functions.php" method="POST" style="width:100%;">
                                <input type="hidden" name="cambiarEstado">

                                <input type="hidden" name="id_consulta" value="<?= $row['id_consulta']?>">
                                
                                <select name="estado_consulta" id="estado_consulta" class="form-select text-center estado_consulta" style="color:#fff;">
                                <?php foreach($estado_consultas as $estado) :?>
                                    <option  value="<?= $estado["id_estado_consulta"]?>"
                                    <?php if($estado["id_estado_consulta"]==$row['id_estado_consulta']): ?> 
                                        selected 
                                    <?php else: ?> 
                                        
                                        <?php endif; ?> 
                                    ><?= $estado["estado_consulta"]?></option>
                                <?php endforeach;?>
                                </select>
                            </form>
                        </td>

                        <!-- <td>
                            <a href="./show.php?id=<?=$row['id_consulta']?>" 
                                class="btn btn-outline-primary">Ver</a>
                        </td> -->
                        <td>
                            <a href="./edit.php?id=<?=$row['id_consulta']?>" 
                            class="btn btn-outline-success">Editar</a>
                        </td>
                        <td>
                            <form action="./functions.php" method="POST">
                                <input type="hidden" name="deleteConsulta">
                                <input type="hidden" name="id_consulta" value="<?= $row['id_consulta']?>">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filtro de licencia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- <form action="empleado_cargo.php" method="POST" autocomplete="off" id="filtro"> -->
                <div class="modal-body">
                    <!-- <div class="mb-3 d-flex align-items-end gap-4">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio de Vacaciones:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="mb-3 d-flex align-items-end gap-4">
                        <label for="fecha_final" class="form-label">Fecha Fin de Vacaciones:</label>
                        <input type="date" name="fecha_final" id="fecha_final" class="form-control">
                    </div> -->
                </div>
                <div class="modal-footer d-flex justify-content-around border">
                    <button class="btn btn-outline-danger" id="clearFiltro" data-bs-dismiss="modal">Limpiar Filtro</button>
                    <!-- <input type="submit" value="Aplicar Filtro" class="btn btn-outline-success"> -->
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" id="filterBtn">Aplicar Filtro</button>

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <!-- </form> -->
                
            </div>
        </div>
    </div>

<?php
    require_once("./../head/footer.php");
?>
