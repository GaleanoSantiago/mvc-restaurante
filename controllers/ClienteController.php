<?php
require_once "./../../models/Clientes.php";

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    //Llamar a todas las reservaciones
    public function index() {
        $clientes = $this->model->getAll();
        return $clientes;
    }
    public function getById() {
        $id = $_REQUEST["id"];
        $cliente = $this->model->getById($id);
        // var_dump($cliente);
        // die();
        return $cliente;
    }
    //Llamar a todas las reservaciones
    public function getByClave() {
        $key = $_POST["clave_acceso"];
        // echo $key;
        // die();
        $cliente = $this->model->getByClave($key);
        // var_dump($cliente);
        // die();
        return $cliente;
    }

    public function create() {
        
            $dataCliente = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'dni' => $_POST['dni'],
                'clave_acceso' => $_POST['clave_acceso']
            ];
            
            // Retorna el id_cliente
        return $this->model->create($dataCliente);

    }

    public function edit() {
        
        $data = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'id_cliente' => $_POST['id_cliente']
        ];

    return $this->model->update($data);
    }

    public function editClienteCompleto() {
        
        $data = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'id_cliente' => $_POST['id_cliente'],
            'clave_acceso_cliente' => $_POST['clave_acceso'],
            'dni_cliente' => $_POST['dni']
        ];
        
    return $this->model->updateCompleto($data);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}