<?php

require("../../controllers/LoginController.php");
$userObj = new UsuarioController();
session_start();

//Iniciar sesion
if(isset($_REQUEST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $users=$userObj->LoginController($username, $password);
    // var_dump($users);
    // die();

    if($users){
        // var_dump($users);
        // die();
        $_SESSION['user_name'] = $users["usuario"];
        $_SESSION['nombre_apellido'] = $users["apellido"] . " " . $users["nombre"];
        $_SESSION['nombre'] = $users['nombre'];
        $_SESSION['id_rol'] = $users["id_rol"];
        $_SESSION["nombre_rol"] = $users["nombre_rol"];
        $_SESSION["email"] = $users["email"];
        $_SESSION["fecha_registro"] = $users["fecha_registro"];
        header("Location: ./../../views/dashboard/index.php");
        // header("Location: ../reservacion/index.php");
    }else{
        header("Location:index.php?msg=error");
    }
}

//Cerrar sesion
if(isset($_REQUEST["logout"])){
    session_unset();    //Limpiar session
    session_destroy();  //Destruir session

    if(isset($_REQUEST["front"])){
        header("Location: ./../frontend/index.php");
        echo "se cierra sesion desde el front";
    }else{
        header("Location: index.php");

    }
    // die();
    // Redirigir al usuario a la página de inicio o de login

}

if(isset($_REQUEST["insertUsuario"])){
    $response = guardarUsuario();
    if($response != false){
        header("Location:create.php?msg=userGuard");
    }
}

if(isset($_REQUEST["deleteUsuario"])){
    $id_usuario = $_REQUEST["id_usuario"];
    $result = $userObj->delete($id_usuario);
    
    if($result != false){

        header('Location: user_list.php?msg=elimSuccs');

    }
}elseif(isset($_REQUEST["create"])){
    
    $response=$userObj->create();

    if($response != false){

        header("Location:create.php?msg=succs");

    }
}
