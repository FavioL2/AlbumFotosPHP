<?php
    class estilos{
        private $conn;
        function __construct(){
            include_once 'Conexion.php';
            $this->conn = new conexion();
            $this->conn->conectar();
        }
        function buscar(){
            $cadena = "SELECT * FROM Estilos ;";
            if($consulta = $this->conn->conexion->query($cadena)){
                return $consulta;
            }
        }
    }
?>