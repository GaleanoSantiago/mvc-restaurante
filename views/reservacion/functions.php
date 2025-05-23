<?php

require("../../controllers/ReservacionesController.php");
$ReservacionObj = new ReservacionController();
$ClienteObj = new ClienteController();

if(isset($_REQUEST["create"])){
    
    $response=$ReservacionObj->create();

    if($response != false){

        header("Location:./../frontend/index.php?msg=succs");

    }
}

if(isset($_REQUEST["createKey"])){

    $clienteObj = new ClienteController();
    $response=$clienteObj->getByClave();

    $respuesta = $ReservacionObj->createByKey($response["id_cliente"]);

    // var_dump($respuesta);
    // die();
    if($respuesta != false){

        header("Location:./../frontend/index.php?msg=succs");

    }
}



if(isset($_REQUEST["updateReserva"])){
    $response2 = $ClienteObj->edit();
    $response1 = $ReservacionObj->edit();
   

    if($response1 != false && $response2 != false){

        header("Location:index.php?msg=userGuard");

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
        if(isset($_REQUEST["front"])){
            header('Location: ./../frontend/index.php');
        }else{
            header('Location: index.php');

        }
    }
        
}

