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

    
    public function getMesasReservacionesLibres() {
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
            reservaciones.id_estado = estados_reservacion.id_estado
        WHERE 
            COALESCE(estados_reservacion.estado_reservacion, 'Libre') = 'Libre';
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}