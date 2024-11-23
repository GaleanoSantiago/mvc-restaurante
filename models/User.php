<?php
require_once "./../../config/bd.php";

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /* Método para autenticar un usuario
     * @param string $username
     * @param string $password
     * @return array|false Devuelve los datos del usuario si es válido, o false si falla
     */
    public function authenticate($username, $password) {
        /*
         $stmt = $this->db->prepare("
            SELECT 
                u.id_usuario, 
                u.usuario, 
                u.contrasena, 
                u.id_rol, 
                r.nombre_rol,
                u.nombre,
                u.apellido
            FROM 
                usuarios u
            INNER JOIN 
                roles_usuarios r 
            ON 
                u.id_rol = r.id_rol 
            WHERE u.usuario = :username
        ");
        */
        
        $stmt = $this->db->prepare("
            SELECT 
                u.id_usuario, 
                u.usuario, 
                u.contrasena, 
                u.id_rol, 
                r.nombre_rol
            FROM usuarios u
            INNER JOIN roles_usuarios r ON u.id_rol = r.id_rol
            WHERE u.usuario = :username
        ");
    
        $stmt->bindParam(':username', $username);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si el usuario existe y la contraseña es correcta
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['contrasena'])) {
                unset($user['contrasena']);  // Eliminar la contraseña por seguridad
                return $user;  // Retorna todos los datos del usuario
            }
        }
    
        // Si no se encuentra el usuario o la contraseña es incorrecta, retornar false
        return false;
    }
    

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoles() {
        $stmt = $this->db->query("SELECT * FROM roles_usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO usuarios 
        (nombre, apellido, email, telefono, usuario, contrasena, id_rol, fecha_registro) 
        VALUES (:nombre, :apellido, :email, :telefono, :usuario, :contrasena, :id_rol, :fecha_registro)");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, telefono = :telefono, usuario = :usuario, contrasena = :contrasena, id_rol = :id_rol WHERE id_usuario = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

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

