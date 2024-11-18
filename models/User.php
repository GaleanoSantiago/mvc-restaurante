<?php
require_once "./../../config/bd.php";

function Authenticate($username,$password){
    
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT usuarios.id_usuario, 
        usuarios.user_name,
        usuarios.created_at,
        usuarios.id_rol_usuario,
        personas.id_persona,
        personas.nombre_persona,
        personas.cuit_persona,
        personas.dni_persona,
        personas.id_rol_persona,
        roles_personas.rol_persona,
        roles_usuarios.rol_usuario
        FROM usuarios 
        INNER JOIN personas ON usuarios.id_persona = personas.id_persona
        INNER JOIN roles_personas ON personas.id_rol_persona = roles_personas.id_rol_persona
        INNER JOIN roles_usuarios ON usuarios.id_rol_usuario = roles_usuarios.id_rol_usuario
        where user_name='$username' and password= AES_ENCRYPT('$password', 'PEPE')");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Insertar usuario
function insertarUsuarioModelo($id_persona, $id_rol_usuario, $user_name, $password) {
    $PDO = getConnection();
    $stmt = $PDO->prepare(
        "INSERT INTO `usuarios`(`id_persona`, `id_rol_usuario`, `user_name`, `password`, `created_at`) 
        VALUES (:id_persona, :id_rol_usuario, :user_name, AES_ENCRYPT(:password, 'PEPE'), NOW())"
    );

    $stmt->bindParam(':id_persona', $id_persona);
    $stmt->bindParam(':id_rol_usuario', $id_rol_usuario);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':password', $password);

    return $stmt->execute();
}


function indexUsuariosModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT usuarios.id_usuario, 
        usuarios.user_name,
        usuarios.created_at,
        usuarios.id_rol_usuario,
        personas.id_persona,
        personas.nombre_persona,
        personas.cuit_persona,
        personas.dni_persona,
        personas.id_rol_persona,
        roles_personas.rol_persona,
        roles_usuarios.rol_usuario
        FROM usuarios 
        INNER JOIN personas ON usuarios.id_persona = personas.id_persona
        INNER JOIN roles_personas ON personas.id_rol_persona = roles_personas.id_rol_persona
        INNER JOIN roles_usuarios ON usuarios.id_rol_usuario = roles_usuarios.id_rol_usuario;");

    return ($stament->execute()) ? $stament->fetchAll() : false;
}

function showUserModel($id){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT usuarios.id_usuario, 
        usuarios.user_name,
        usuarios.created_at,
        usuarios.id_rol_usuario,
        personas.id_persona,
        personas.nombre_persona,
        personas.cuit_persona,
        personas.dni_persona,
        personas.id_rol_persona,
        roles_personas.rol_persona,
        roles_usuarios.rol_usuario
        FROM usuarios 
        INNER JOIN personas ON usuarios.id_persona = personas.id_persona
        INNER JOIN roles_personas ON personas.id_rol_persona = roles_personas.id_rol_persona
        INNER JOIN roles_usuarios ON usuarios.id_rol_usuario = roles_usuarios.id_rol_usuario
        WHERE usuarios.id_usuario = :id;");
    $stament->bindParam(":id", $id);

    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Para borrar usuario
function eliminarUsuarioModal($id_usuario) {
    $PDO = getConnection();
    $stmt = $PDO->prepare(
        "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = :id_usuario"
    );

    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

    return $stmt->execute();
}
