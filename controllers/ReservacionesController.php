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

    //Llama a todo los datos del estado reservacion
    public function indexEstadoReservacion() {
        $reservacion = $this->model->getEstadoReservacionAll();
        return $reservacion;
    }

    public function getByClave(){
        // Recibe los datos post del cliente
        $dataCliente = [
            'dni' => $_POST['dni'],
            'clave' => $_POST['clave']
        ];
        // var_dump($dataCliente);
        // die();
        // Ejecuta la busqueda por clave y dni
        $reservaciones = $this->model->getByClave($dataCliente);
        return $reservaciones;
    }

    public function create() {
        
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

    public function edit() {
        
        $data = [
            'id_cliente' => $_POST['id_cliente'],
            'id_reservacion' => $_POST['id_reservacion'],
            'numero_personas' => $_POST['numero_personas'],
            'id_estado' => $_POST['estado_reserva'],
            'id_mesa' => $_POST['id_mesa'],
            'fecha_reservacion' => $_POST['fecha_reservacion']
        ];
        
        // Retorna
    return $this->model->update($data);
    }

    function updateEstadoReserva($id_reservacion, $id_estado_reserva){
        $response = $this->model->updateEstadoReservaModel($id_reservacion, $id_estado_reserva);
        return $response;
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}
