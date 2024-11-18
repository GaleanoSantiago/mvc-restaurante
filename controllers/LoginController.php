<?php
require_once "./../../models/User.php";


function LoginController($username, $password){
    
    return Authenticate($username,$password);
}

function showUser($id){
    $result = showUserModel($id);
    if ($result != false) {
        return $result;
    } else {
        // header("Location:show.php?id=".$id);
        return false;

    }
}

function indexUsuarios(){
    $result=indexUsuariosModel();
    return $result;
}


function insertarUsuario($id_persona, $id_rol_usuario, $user_name, $password){
    $result = insertarUsuarioModelo($id_persona, $id_rol_usuario, $user_name, $password);
    return $result;
}

// Eliminar usuario
function eliminarUsuario($id_usuario){
    $result = eliminarUsuarioModal($id_usuario);
    return $result;
}