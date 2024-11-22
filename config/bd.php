<?php
    class Database {
        private const HOST = "localhost";
        private const DBNAME = "restaurante";
        private const USER = "root";
        private const PASSWORD = "";
    
        private static $instance = null;
    
        private function __construct() {
            // Evitar instancias directas
        }
    
        public static function getConnection() {
            if (self::$instance === null) {
                try {
                    self::$instance = new PDO(
                        "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                        self::USER,
                        self::PASSWORD
                    );
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    // Registra el error o muestra un mensaje genérico
                    error_log($e->getMessage());
                    die("Error al conectar a la base de datos. Contacta al administrador.");
                }
            }
            return self::$instance;
        }
    }
?>