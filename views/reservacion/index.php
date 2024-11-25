
<?php
    require_once("./../head/head.php");

    require_once("./../../controllers/ReservacionesController.php");
    $obj= new ReservacionController();
    $rows = $obj->index();
    $estado_reserva = $obj->indexEstadoReservacion();  
    // var_dump($rows);
    // die();
?>
    
    <section>
        <div class="container" >
            <h1 class="text-center">Reservaciones</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                <?php #if($_SESSION['id_rol_usuario']==1): ?>
                    <a href="../frontend/index.php" class="btn btn-success">Agregar Nueva Reservacion</a>
                <?php #endif; ?>

                
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
                    <strong>Reservacion</strong> eliminado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="">
                        <tr>			
                            <th>ID Reservacion</th>
                            <th>ID Cliente</th>
                            <th>Cliente</th>
                            <th>Fecha Reservacion</th>
                            <th>Numero de Personas</th>
                            <th>Numero de Mesa</th>
                            <th>Capacidad de Mesa</th>
                            <th>Estado</th>
                            <?php if(isset($_SESSION['id_rol']) &&  $_SESSION['id_rol'] == 1):?>
                                <th colspan="3">Funciones</th>
                            <?php endif; ?> 
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows): 
                        
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id_reservacion']?></td>
                            <td><?= $row['id_cliente']?></td>
                            <td><?= $row['nombre_cliente'] ." ". $row['apellido_cliente']?></td>
                            <td><?= $row['fecha_reservacion']?></td>
                            <td><?= $row['numero_personas']?></td>
                            <td><?= $row['n_mesa']?></td>
                            <td><?= $row['capacidad_mesa']?></td>
                            <td>
                                <form action="./functions.php" method="POST" style="width:100%;">
                                    <input type="hidden" name="cambiarEstado">
                                                               
                                    <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                
                                    <select name="estado_reserva" id="estado_reserva" class="form-select text-center estado_reserva" style="color:#fff;" onchange="this.form.submit()">
                                    <?php foreach($estado_reserva as $estado) :?> 
                                        <option  value="<?= $estado["id_estado"]?>"
                                        <?php if($estado["estado_reservacion"]==$row['estado_reservacion']): ?> 
                                            selected 
                                        <?php endif; ?> 
                                    ><?= $estado["estado_reservacion"]?></option>
                                <?php endforeach;?>
                                </select>
                                </form>
                            </td>
                            <?php if(isset($_SESSION['id_rol']) &&  $_SESSION['id_rol'] == 1):?>
                                <td>
                                    <form action="./functions.php" method="POST">
                                        <input type="hidden" name="deleteUsuario">
                                        <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                        <input type="submit" class="btn btn-outline-danger btn-delete" value="Borrar">
                                    </form>
                                </td>
                                <td>
                                    <form action="./edit.php" method="POST">
                                        <input type="hidden" name="updateReserva">

                                        <!--Envio para modificar cliente-->
                                        <input type="hidden" name="id_cliente" value="<?= $row['id_cliente']?>">
                                        <input type="hidden" name="nombre_cliente" value="<?= $row['nombre_cliente']?>">
                                        <input type="hidden" name="apellido_cliente" value="<?= $row['apellido_cliente']?>">

                                         <!--Envio para modificar Reservacion-->
                                        <input type="hidden" name="id_reservacion" value="<?= $row['id_reservacion']?>">
                                        <input type="hidden" name="numero_personas" value="<?= $row['numero_personas']?>">
                                        <input type="hidden" name="n_mesa" value="<?= $row['n_mesa']?>">
                                        <input type="hidden" name="capacidad_mesa" value="<?= $row['capacidad_mesa']?>">
                                        <input type="hidden" name="id_mesa" value="<?= $row['id_mesa']?>">
                                        <input type="hidden" name="id_estado" value="<?= $row['id_estado']?>">

                                        <input type="submit" class="btn btn-outline-danger btn-delete" value="Editar">
                                    </form>
                                </td>
                            <?php endif; ?> 
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                            <tr>
                                <td colspan="13" class="text-center">No hay Registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
  
    <style>
        #estado_reserva option {
            padding: 30px 0 !important;
        }
    </style>

    <script>
        const btnDiagnostico = document.querySelectorAll(".btn-diagnostico") || null;

        if (btnDiagnostico) {
    btnDiagnostico.forEach(btn => {
        btn.addEventListener("click", () => {
            const idConsulta = btn.value;
            inputIdConsulta.value = idConsulta;
            
            fetch(`functions.php?id_reservacion=${idConsulta}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {

                        descripcionDiagnostico.value = data.descripcion_diagnostico;
                        notasAdicionales.value = data.notas_adicionales;
                        descripcionDiagnostico.disabled=true;
                        notasAdicionales.disabled=true;
                        btnEnviarModal.disabled=true;

                        updateDiv.classList.remove("d-none");

                    } else {
                        descripcionDiagnostico.value = '';
                        notasAdicionales.value = '';
                        descripcionDiagnostico.disabled=false;
                        notasAdicionales.disabled=false;
                        btnEnviarModal.disabled=false;
                        if (!updateDiv.classList.contains("d-none")) {
                            updateDiv.classList.add("d-none");
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
}
        document.addEventListener("DOMContentLoaded", () => {
    const selectEstadoReservas = document.querySelectorAll(".estado_reserva");

    if (selectEstadoReservas.length > 0) {
        selectEstadoReservas.forEach(selectEstado => {
            setOptionColors(selectEstado);
            updateSelectColor({ target: selectEstado });

            selectEstado.addEventListener("change", updateSelectColor);
            selectEstado.addEventListener("change", handleSelectChange);
        });
    } else {
        console.warn("No se encontraron elementos con la clase 'estado_reserva'.");
    }
});

function setOptionColors(selectEstado) {
    const options = selectEstado.options;

    if (options.length > 0) {
        if (options[0]) options[0].classList.add("bg-danger", "text-white");
        if (options[1]) options[1].classList.add("bg-warning", "text-white");
        if (options[2]) options[2].classList.add("bg-success", "text-white");
    }
}

function updateSelectColor(event) {
    const selectEstado = event.target;
    const selectedOption = selectEstado.options[selectEstado.selectedIndex];

    if (selectedOption) {
        const bgColorClass = selectedOption.className.split(' ')[0];
        selectEstado.className = 'form-select text-center ' + bgColorClass;
    }
}

function handleSelectChange(event) {
    console.log("Opción seleccionada:", event.target.value);
}
    </script>
   
<?php
    require_once("./../head/footer.php");
?>