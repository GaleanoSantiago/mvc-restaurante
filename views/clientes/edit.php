<?php
        require_once("./../head/head.php");
        require("../../controllers/ClienteController.php");

        // $empleados = showEmpleado($_GET["id"]);
        $obj = new ClienteController();

        $row = $obj->getById();
        // var_dump($rows);
    ?>
<section>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="text-center">Editar Cliente</h1>
        <?php if(isset($_GET["msg"])=="actSucc"): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> actualizado con exito en la base de datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php else: ?>
        <div class=""></div>
        <?php endif; ?>
        <?php
            if($row) :?>
        <form action="./functions.php" method="POST" autocomplete="off" id="formCliente">
            <!-- input controlador -->
            <input id="id_cliente" name="id_cliente" class="form-control" type="hidden" value="<?= $_GET['id'] ?>" >
            <input type="hidden" id="inputHidden" name="edit">
            <div class="row  justify-content-center">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12 column-first">

                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control " value="<?= $row["nombre_cliente"]?>" required>
                    </div>

                    <!-- Campo de dni -->
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" name="dni" id="dni" class="form-control " value="<?= $row["dni_cliente"]?>" required>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-6 col-sm-12">

                    <!-- Campo de Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control " value="<?= $row["apellido_cliente"]?>" required>
                    </div>


                    <!-- Codigo de acceso -->
                    <div class="mb-3">
                        <label for="clave_acceso" class="form-label">Código de acceso</label>

                        <div class="form-pass-div d-flex gap-1">
                            <input type="text" name="clave_acceso" id="input_clave" class="form-control" value="<?= $row["clave_acceso_cliente"]?>" required>
                            <button type="button" id="btn_clave">
                                <span>
                                    x
                                </span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="mb-3 d-flex justify-content-around">
                        <input type="submit" value="Actualizar" class="btn btn-success">
                        <!-- <input type="reset" value="Reset" class="btn btn-danger"> -->
                        <a href="./index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
        </form>

        <?php else : ?>
        <h2>No se encontraron registros</h2>
        <?php endif; ?>
    </div>

</section>

<?php
    require_once("./../head/footer.php");
?>