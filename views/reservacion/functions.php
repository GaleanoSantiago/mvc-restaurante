<?php

require("../../controllers/ReservacionesController.php");
$ReservacionObj = new ReservacionController();

if(isset($_REQUEST["create"])){
    
    $response=$ReservacionObj->create();

    if($response != false){

        header("Location:create.php?msg=succs");

    }
}


if(isset($_REQUEST["updateReserva"])){

    $response=$ReservacionObj->edit();

    if($response != false){

        header("Location:create.php?msg=userGuard");

    }
}


if(isset($_REQUEST["deleteUsuario"])){

    $id_reservacion = $_REQUEST["id_reservacion"];

    $response = $ReservacionObj->delete($id_reservacion);
    
    if($response != false){

        header('Location: reservacion_list.php?msg=elimSuccs');

    }
}
