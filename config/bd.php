<?php
    class db{
        private $host="localhost";
        private $dbname="centro_salud";
        private $user="root";
        private $password="";

        public function conexion(){
            try{
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
                return $PDO;
            }catch(PDOEXception $e){
                return $e->getMessage();
            }
        }
    }
    function getConnection() {
        $con = new db();
        return $con->conexion();
    }
?>