<?php

require("../../controllers/LoginController.php");
session_start();

if(isset($_REQUEST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $users=LoginController($username, $password);
    // var_dump($users);
    // die();

    if($users){
        // var_dump($users);
        // die();
        foreach($users as $user){

            $_SESSION['usuario'] = $user["nombre_persona"];
            $_SESSION['user_name'] = $user["user_name"];
            $_SESSION['dni'] = $user["dni_persona"];
            $_SESSION['rol_persona'] = $user["rol_persona"];
            $_SESSION['rol_usuario'] = $user["rol_usuario"];
            $_SESSION['id_rol_usuario'] = $user["id_rol_usuario"];

            // if($_SESSION["id_rol_usuario"]==4){
            //     $_SESSION["id_medico"]=$user["id_medico"];
            // }
        }
        // echo $_SESSION['usuario'];
        // die();
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
}

function cerrarSesion(){
    
    session_destroy();

    // Redirigir al usuario a la página de inicio o de login
    header("Location: ./../../views/login/index.php");

}

function guardarUsuario(){
    $id_persona=$_REQUEST["id_persona"];
    $id_rol_usuario = $_REQUEST["id_rol_usuario"];
    $user_name = $_REQUEST["user_name"];
    $password = $_REQUEST["password"];

    $result = insertarUsuario($id_persona, $id_rol_usuario, $user_name, $password);
    
    return $result;
}

function deleteUsuario(){
    $id_usuario = $_REQUEST["id_usuario"];

    $result = eliminarUsuario($id_usuario);

    return $result;
}
