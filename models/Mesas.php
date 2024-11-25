<?php
require_once "./../../config/bd.php";

Class Mesa{
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM mesas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMesasReservaciones() {
        $stmt = $this->db->query("SELECT 
            mesas.id_mesa,
            mesas.n_mesa,
            mesas.capacidad_mesa,
            mesas.descripcion_mesa,
            COALESCE(reservaciones.id_estado, '1') AS id_estado,
            COALESCE(estados_reservacion.estado_reservacion, 'Libre') AS estado_reservacion
        FROM 
            mesas
        LEFT JOIN 
            reservaciones
        ON 
            mesas.id_mesa = reservaciones.id_mesa
        LEFT JOIN 
            estados_reservacion
        ON 
            reservaciones.id_estado = estados_reservacion.id_estado;
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    // Obtener todas las mesas
    public function obtenerMesas() {
        $query = "SELECT * FROM mesas";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar una nueva mesa
    public function agregarMesa($n_mesa, $capacidad_mesa, $descripcion_mesa) {
        $query = "INSERT INTO mesas (n_mesa, capacidad_mesa, descripcion_mesa) VALUES (:n_mesa, :capacidad_mesa, :descripcion_mesa)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':n_mesa', $n_mesa);
        $stmt->bindParam(':capacidad_mesa', $capacidad_mesa);
        $stmt->bindParam(':descripcion_mesa', $descripcion_mesa);
        return $stmt->execute();
    }

    // Obtener una mesa por ID
    public function obtenerMesaPorId($id_mesa) {
        $query = "SELECT * FROM mesas WHERE id_mesa = :id_mesa";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_mesa', $id_mesa);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una mesa
    public function actualizarMesa($id_mesa, $n_mesa, $capacidad_mesa, $descripcion_mesa) {
        $query = "UPDATE mesas SET n_mesa = :n_mesa, capacidad_mesa = :capacidad_mesa, descripcion_mesa = :descripcion_mesa WHERE id_mesa = :id_mesa";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':n_mesa', $n_mesa);
        $stmt->bindParam(':capacidad_mesa', $capacidad_mesa);
        $stmt->bindParam(':descripcion_mesa', $descripcion_mesa);
        $stmt->bindParam(':id_mesa', $id_mesa);
        return $stmt->execute();
    }

    // Eliminar una mesa
    public function eliminarMesa($id_mesa) {
        $stmt = $this->db->prepare("DELETE FROM mesas WHERE id_mesa = :id_mesa");
        $stmt->bindParam('id_mesa', $id_mesa);
        return $stmt->execute();
    }
}