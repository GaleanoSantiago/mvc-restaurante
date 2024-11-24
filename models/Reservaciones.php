<?php
require_once "./../../config/bd.php";

class Reservacion {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    } 

    //Llama a todo los datos reservacion
    public function getAll() {
        $stmt = $this->db->prepare("SELECT r.id_reservacion, r.fecha_reservacion, r.numero_personas, c.nombre_cliente, c.apellido_cliente, c.id_cliente, m.n_mesa, m.capacidad_mesa, e.estado_reservacion 
        FROM reservaciones r 
        INNER JOIN clientes c on c.id_cliente = r.id_cliente
        INNER JOIN mesas m on m.id_mesa = r.id_mesa
        INNER JOIN estados_reservacion e ON e.id_estado = r.id_estado"
    );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT r.id_reservacion, r.fecha_reservacion, r.numero_personas, c.nombre_cliente, c.apellido_cliente, c.id_cliente, m.n_mesa, m.capacidad_mesa, e.estado_reservacion 
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

    public function create($dataReserva) {    
    
        //---------------------------------------------------Reservas---------------------------------------------------
        $stmt = $this->db->prepare("
            INSERT INTO reservaciones (id_cliente, fecha_reservacion, id_estado, numero_personas, id_mesa) 
            VALUES (:id_cliente, :fecha_reservacion, :id_estado, :num_personas, :id_mesa)
        ");
    
        // Ejecutar la consulta
        return $stmt->execute($dataReserva);
    }
    

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, telefono = :telefono, usuario = :usuario, contrasena = :contrasena, id_rol = :id_rol WHERE id_usuario = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM reservaciones WHERE id_reservacion = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
