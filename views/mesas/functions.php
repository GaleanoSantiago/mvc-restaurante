<?php
require_once("../../controllers/MesaController.php");
$MesaObj= new MesaController();

if (isset($_REQUEST['create'])){
    
    $response=$MesaObj->agregarMesa();

    header('Location: list_mesas.php');
    exit();
}

if (isset($_REQUEST['edit'])){
    $response = $MesaObj->actualizarMesa();
            
    if ($response) {
        header('Location: list_mesas.php');
        exit();
    } else {
        echo "Error al actualizar la mesa.";
    }
}

if (isset($_REQUEST['delete'])){
   
    $response=$MesaObj->eliminarMesa($id_mesa);

    header('Location: list_mesas.php');
    exit();
}



?>