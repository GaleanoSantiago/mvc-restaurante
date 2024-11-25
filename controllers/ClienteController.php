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
}