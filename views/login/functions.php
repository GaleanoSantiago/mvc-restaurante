<?php

require("../../controllers/LoginController.php");
$userObj = new UsuarioController();
session_start();

if(isset($_REQUEST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $users=$userObj->LoginController($username, $password);
    // var_dump($users);
    // die();

    if($users){

        $_SESSION['user_name'] = $user["usuario"];
        $_SESSION['id_rol'] = $user["id_rol"];

        header("Location: ./../../views/dashboard/index.php");
    }else{
        header("Location:index.php?msg=error");
    }
}elseif(isset($_REQUEST["logout"])){
    // Destruir la sesión
    cerrarSesion();

}elseif(isset($_REQUEST["insertUsuario"])){
    $response = guardarUsuario();
    if($response != false){
        header("Location:create.php?msg=userGuard");
    }
}elseif(isset($_REQUEST["deleteUsuario"])){
    $response = deleteUsuario();
    
    if($response != false){

        header("Location:user_list.php?msg=elimSuccs");

    }
}elseif(isset($_REQUEST["create"])){
    
    $response=$userObj->create();

    if($response != false){

        header("Location:create.php?msg=succs");

    }
}

// ==================================== Funciones que ya no se usan ====================================

function cerrarSesion(){
    
    session_destroy();

    // Redirigir al usuario a la página de inicio o de login
    header("Location: ./../../views/login/index.php");

}


function deleteUsuario(){
    $id_usuario = $_REQUEST["id_usuario"];

    $result = eliminarUsuario($id_usuario);

    return $result;
}
