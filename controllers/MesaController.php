<?php
require_once "./../../models/Mesas.php";

class MesaController {
    private $model;

    public function __construct() {
        $this->model = new Mesa();
    }

    public function index() {
        $mesas = $this->model->getAll();
        return $mesas;
        // require_once 'views/usuarios/index.php';
    }

    public function getMesasReservaciones(){
        $mesas = $this->model->getMesasReservaciones();
        return $mesas;
    }

    public function getMesasReservacionesLibres(){
        $mesas = $this->model->getMesasReservacionesLibres();
        return $mesas;
    }
}