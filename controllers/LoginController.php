<?php
require_once "./../../models/User.php";

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function LoginController($username, $password){
        // Llamada a la función authenticate que ya maneja la verificación
        $usuarios = $this->model->authenticate($username, $password);
        
        // Retornar el resultado, que puede ser los datos del usuario o false
        return $usuarios;
    }

    public function index() {
        $usuarios = $this->model->getAll();
        return $usuarios;
        // require_once 'views/usuarios/index.php';
    }
    
    public function getRoles() {
        $usuarios = $this->model->getRoles();
        return $usuarios;
        // require_once 'views/usuarios/index.php';
    }

    public function create() {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono'],
                'usuario' => $_POST['usuario'],
                'contrasena' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'id_rol' => $_POST['id_rol'],
                'fecha_registro' => date('Y-m-d H:i:s')
            ];
            return $this->model->create($data);

            // header('Location: /usuarios');
        // } else {
        //     require_once 'views/usuarios/create.php';
        // }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono'],
                'usuario' => $_POST['usuario'],
                'contrasena' => password_hash($_POST['contrasena'], PASSWORD_DEFAULT),
                'id_rol' => $_POST['id_rol']
            ];
            $this->model->update($id, $data);
            header('Location: /usuarios');
        } else {
            $usuario = $this->model->getById($id);
            require_once 'views/usuarios/edit.php';
        }
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}


// ============================================== Funciones no utilizadas ==================================================


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
