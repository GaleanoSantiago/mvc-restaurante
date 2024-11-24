<?php
require_once "./../../models/Reservaciones.php";
require_once "ClienteController.php";

class ReservacionController {
    private $model;

    public function __construct() {
        $this->model = new Reservacion();
    }

    //Llamar a todas las reservaciones
    public function index() {
        $reservacion = $this->model->getAll();
        return $reservacion;
    }

    public function create() {
        
            // $dataCliente = [
            //     'nombre' => $_POST['nombre'],
            //     'apellido' => $_POST['apellido'],
            //     'dni' => $_POST['dni'],
            //     'clave_acceso' => $_POST['clave_acceso']
            // ];
            $objCliente = new ClienteController();
            // $dataCliente guarda el id_cliente
            $dataCliente = $objCliente->create();

            $dataReserva = [
                'fecha_reservacion' => $_POST['fecha_reserva'],
                'id_mesa' => $_POST['mesa'],
                'id_estado' => $_POST['estado'],
                'num_personas' => $_POST['num_personas'],
                "id_cliente" => $dataCliente
            ];
            
        return $this->model->create($dataReserva);

    }

    public function createByKey($key) {

        $dataReserva = [
            'fecha_reservacion' => $_POST['fecha_reserva'],
            'id_mesa' => $_POST['mesa'],
            'id_estado' => $_POST['estado'],
            'num_personas' => $_POST['num_personas'],
            "id_cliente" => $key
        ];
        
    return $this->model->create($dataReserva);

    }  

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_cliente' => $_POST['id_cliente'],
                'id_estado' => $_POST['id_estado'],
                'numero_personas' => $_POST['numero_personas'],
                'fecha_reservacion' => date('Y-m-d'),
                'id_mesa' => $_POST['id_mesa']
            ];
            $this->model->update($id, $data);
            //header('Location: /usuarios');
        } else {
            $usuario = $this->model->getById($id);
            //require_once 'views/usuarios/edit.php';
        }
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}