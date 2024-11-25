<?php
require_once "./../../config/bd.php";

Class Cliente{
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un único registro coincidente
        // var_dump($cliente);
        // die();
        return $cliente;
    }
    public function getByClave($clave) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE clave_acceso_cliente = :clave");
        $stmt->bindParam(':clave', $clave, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un único registro coincidente
        // var_dump($cliente);
        // die();
        return $cliente;
    }
    

    public function create($dataCliente) {

        //---------------------------------------------------Clientes---------------------------------------------------
        $stmt = $this->db->prepare("
            INSERT INTO clientes (nombre_cliente, apellido_cliente, dni_cliente, clave_acceso_cliente)
            VALUES (:nombre, :apellido, :dni, :clave_acceso)
        ");
        $stmt->execute($dataCliente);
    
        // Obtener el último id insertado
        $id_cliente = $this->db->lastInsertId();
    
        return $id_cliente;
    }


    public function update($dataCliente) {

        $stmt = $this->db->prepare("UPDATE clientes SET nombre_cliente= :nombre, apellido_cliente= :apellido 
        WHERE id_cliente = :id_cliente
        ");
    
        return  $stmt->execute($dataCliente);
    }

    
}