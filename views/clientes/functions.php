<?php

require("../../controllers/ClienteController.php");
$obj = new ClienteController();

if(isset($_REQUEST["create"])){
    
    $response=$obj->create();

    if($response != false){

        header("Location:create.php?msg=succs");

    }
}
// =========================================== Funciones que no se usan =============================================
if(isset($_REQUEST["createKey"])){

    $clienteObj = new ClienteController();
    $response=$clienteObj->getByClave();

    $respuesta = $ReservacionObj->createByKey($response["id_cliente"]);

    // var_dump($respuesta);
    // die();
    if($respuesta != false){

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

        header('Location: index.php?msg=elimSuccs');

    }
}


if(isset($_REQUEST["cambiarEstado"])){
    
    $id_reservacion = $_REQUEST["id_reservacion"];
    $id_estado_reserva = $_REQUEST["estado_reserva"];

    $response = $ReservacionObj->updateEstadoReserva($id_reservacion, $id_estado_reserva);

    if($response != false){
        header('Location: index.php');
    }
        
}

