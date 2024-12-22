<?php
require_once ("../../models/Mesas.php");

class MesaController{
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

    public function getAllMesas(){
        $mesas = $thos->model->obtenerMesas();
        return $mesas;
    }

    public function obtenerMesaId(){
        $mesas = $this->model->obtenerMesaPorId();
        return $mesas;
    }

    //Agrega una nueva mesa a la lista

    public function agregarMesa(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoge los datos del formulario
        $dataMesa = [
            'n_mesa' => $_POST['n_mesa'],
            'capacidad_mesa' => $_POST['capacidad_mesa'],
            'descripcion_mesa' => $_POST['descripcion_mesa'],
        ];
            
            // Crear una instancia del modelo
            $model = new Mesa();
            // Llamar al método del modelo para agregar la mesa
           return $this->model->agregarMesa($dataMesa);
        
            // Redireccionar a la lista de mesas después de agregar
            header('Location: list_mesas.php');
            exit();
        }
}

    public function actualizarMesa(){
        return $this->model->actualizarMesa($dataMesa);        
        
        if ($response) {
            header('Location: list_mesas.php');
            exit();
        } else {
            echo "Error al actualizar la mesa.";
        }
    }


    public function eliminarMesa(){
        $id_mesa = $_REQUEST["id_mesa"];
       return $this->model->eliminarMesa($id_mesa);
}
}

?>