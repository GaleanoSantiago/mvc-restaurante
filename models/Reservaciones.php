<?php
require_once "./../../config/bd.php";

class Reservacion {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    } 

    //Llama a todo los datos reservacion
    public function getAll() {
        $stmt = $this->db->prepare("SELECT r.id_reservacion, r.fecha_reservacion, r.numero_personas, c.nombre_cliente, c.apellido_cliente, c.id_cliente,m.id_mesa ,m.n_mesa, m.capacidad_mesa, e.estado_reservacion, e.id_estado 
        FROM reservaciones r 
        INNER JOIN clientes c on c.id_cliente = r.id_cliente
        INNER JOIN mesas m on m.id_mesa = r.id_mesa
        INNER JOIN estados_reservacion e ON e.id_estado = r.id_estado"
    );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Llama a todo los datos del estado reservacion
    public function getEstadoReservacionAll() {
        $stmt = $this->db->prepare("SELECT * FROM estados_reservacion");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT r.id_reservacion, r.fecha_reservacion, r.numero_personas, c.nombre_cliente, c.apellido_cliente, c.id_cliente, m.n_mesa, m.capacidad_mesa, e.estado_reservacion, e.id_estado 
            FROM reservaciones r 
            INNER JOIN clientes c on c.id_cliente = r.id_cliente
            INNER JOIN mesas m on m.id_mesa = r.id_mesa
            INNER JOIN estados_reservacion e ON e.id_estado = r.id_estado
            Where r.id_reservacion = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getByClave($dataClientes) {
        // Preparar la consulta
        $stmt = $this->db->prepare("SELECT r.id_reservacion, r.fecha_reservacion, r.numero_personas, 
            c.nombre_cliente, c.dni_cliente, c.apellido_cliente, c.id_cliente, c.clave_acceso_cliente, 
            m.n_mesa, m.capacidad_mesa, e.estado_reservacion, e.id_estado 
            FROM reservaciones r
            INNER JOIN clientes c ON c.id_cliente = r.id_cliente 
            INNER JOIN mesas m ON m.id_mesa = r.id_mesa 
            INNER JOIN estados_reservacion e ON e.id_estado = r.id_estado 
            WHERE c.clave_acceso_cliente = :clave 
            AND c.dni_cliente = :dni;
        ");
    
        // Ejecutar la consulta con el array asociativo
        $stmt->execute($dataClientes);
    
        // Retornar todos los registros encontrados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($dataReserva) {    
    
        //---------------------------------------------------Reservas---------------------------------------------------
        $stmt = $this->db->prepare("
            INSERT INTO reservaciones (id_cliente, fecha_reservacion, id_estado, numero_personas, id_mesa) 
            VALUES (:id_cliente, :fecha_reservacion, :id_estado, :num_personas, :id_mesa)
        ");
    
        // Ejecutar la consulta
        return $stmt->execute($dataReserva);
    }
    

    public function update($data) {
        $stmt = $this->db->prepare("UPDATE reservaciones SET id_cliente= :id_cliente,
        fecha_reservacion= :fecha_reservacion ,id_estado= :id_estado ,numero_personas= :numero_personas, id_mesa= :id_mesa 
        WHERE id_reservacion = :id_reservacion"
        );
        return $stmt->execute($data);
    }

    // Actualizar estado de consulta
    function updateEstadoReservaModel($id_reservacion, $id_estado_reserva){
    $stmt = $this->db->prepare(
        "UPDATE reservaciones SET id_estado= :id_estado_reserva WHERE id_reservacion = :id_reservacion"
    );
     // Vincular parámetros
     $stmt->bindParam(':id_reservacion', $id_reservacion, PDO::PARAM_INT);
     $stmt->bindParam(":id_estado_reserva", $id_estado_reserva, PDO::PARAM_INT);
 
     // Ejecutar la sentencia
     return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM reservaciones WHERE id_reservacion = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
