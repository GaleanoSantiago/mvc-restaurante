<?php
        require_once("./../head/head.php");
        require_once("./../../controllers/PacienteController.php");
        require_once("./../../controllers/ConsultaController.php");
        require_once("./../../controllers/DiagnosticoController.php");
        require_once("./../../controllers/AuxiliarController.php");

        if(isset($_REQUEST['fecha'])){
            $rows = consultasPorMedicoFecha($_SESSION["dni"], $_REQUEST["fecha"]);
            $fecha = $_REQUEST["fecha"];
            $response = true;
        }else{
            $rows = consultasPorMedico($_SESSION["dni"]);
            // Obtener la fecha actual en el formato YYYY-MM-DD
            $fecha = date('Y-m-d');
            $response = false;

        }
        $estado_consultas = indexEstadoConsultas();
        // var_dump(showDiagnostico(7));
        // die();
        // echo $_SESSION["dni"];
        // echo "<br>";
        // var_dump($rows);
        // die();
    ?>
    
    <section>
        <div class="container-fluid" >
            <h1 class="text-center">Consultas Medicas de <?=$_SESSION["usuario"]?></h1>
            
            <div class="btnContainer mb-3 d-flex justify-content-around">
                    
                    <a href="./create.php" class="btn btn-success">Programar Consulta</a>
                
                <div class="d-flex gap-4 align-items-center">
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrar Datos
                    </button> -->
                    <div class="formFliltroFecha ">
                        <form action="./consultas_medico.php" method="">
                            <input type="date" name="fecha"  id="filtroFecha" value="<?= $fecha ?>" class="form-control" required>
                            <input type="submit" class="btn btn-info" value="Fltrar por Fecha">
                            <?php if($response): ?>
                                <a href="./consultas_medico.php" style="min-width:120px;" class="btn btn-warning">Limpiar Filtro</a>
                            <?php endif; ?>

                        </form>
                    </div>
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            
            <?php if(isset($_GET["msg"]) && $_GET["msg"] == "elimSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Diagnostico</strong> eliminada con éxito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif(isset($_GET["msg"]) && $_GET["msg"] == "diagnosticoSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Diagnostico</strong> almacenado con éxito en la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif(isset($_GET["msg"]) && $_GET["msg"] == "actSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Diagnostico</strong> actualizado con éxito en la base de datos.
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
                        
                        <th>Paciente</th>
                        <th>Obra Social</th>
                        <th>Grupo Sanguineo</th>
                        <th>N° Seguro Social</th>
                        <th>CUIT</th>
                        <th>DNI</th>
                        <th>Contacto</th>
                        <th style="width:200px;">Fecha y Hora</th>
                        <th style="width:200px;">Estado Consulta</th>
                        <th colspan="1">Funciones</th>
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
                        <td>
                            <form action="./functions.php" method="POST" style="width:100%;">
                                <input type="hidden" name="cambiarEstado">
                                <input type="hidden" name="filtroMedico">
                                <?php if($response): ?> 
                                    <input type="hidden" name="fechaFiltro" value="<?=$fecha?>">
                                <?php endif; ?> 
                                
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
                        
                        <td><button class="btn btn-outline-success btn-diagnostico" 
                        data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?=$row["id_consulta"]?>" disabled>Diagnostico</button></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php else : ?>
                        <tr>
                            <td colspan="11" class="text-center">No hay Consultas esta Fecha</td>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Diagnosticar Paciente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="./functions.php" method="POST" autocomplete="off" style="width:100%;">
                    <input type="hidden" id="inputDiagnosticoModal" name="insertDiagnostico">
                    <?php if($response): ?> 
                        <input type="hidden" name="fechaFiltro" value="<?=$fecha?>">
                    <?php endif; ?> 
                    <div class="modal-body">
                        <div class="w-100 d-flex justify-content-around d-none" id="updateDiv">
                            <button class="btn btn-updateModal" id="updateBtn">Actualizar</button>
                            <button class="btn btn-outline-danger" id="deleteBtn">Borrar</button>
                        </div>
                        <!-- Input para el id consulta -->
                        <input type="hidden" name="id_consulta" id="inputIdConsulta" value="" class="form-control">
                        <div class="mb-3">
                            <label for="" class="form-label w-100 text-center fs-5">Diagnostico del Paciente</label>
                            <textarea name="descripcion_diagnostico" class="form-control" id="descripcionDiagnostico" cols="30" rows="10"  required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label w-100 text-center fs-5">Notas Adicionales</label>
                            <textarea name="notas_adicionales" class="form-control" id="notasAdicionales" cols="30" rows="8" required></textarea>
                        </div>
                    
                    </div>
                    <div class="modal-footer d-flex justify-content-around border">
                        <input type="submit" value="Diagnosticar" class="btn btn-outline-success" id="btnEnviarModal">

                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

<?php
    require_once("./../head/footer.php");
?>
