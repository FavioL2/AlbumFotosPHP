<?php
    class album{
        private $conexion;
        function __construct()
        {
            include_once 'Conexion.php';
            $this->conn= new conexion();
            $this->conn->conectar();
        }
        function obtenerAlbumes(){
            if(!isset($_SESSION)) 
            { 
                try{
                    session_start();
                }catch(mysqli_sql_exception $e){
                    header("Location: formularioInicio.php");
                }
            }               
            $cadena = "SELECT * FROM Albumes WHERE Usuario ='".$_SESSION['Id']."'";
			return $this->consultas($cadena);
        }
        function insertarAlbum(){
            if(!isset($_SESSION)) 
            { 
                try{
                    session_start();
                }catch(mysqli_sql_exception $e){
                    header("Location: formularioInicio.php");
                }
            }  
            $cadena = "INSERT INTO Albumes(IdAlbum,Titulo,Descripcion,Usuario) VALUES('NULL','".$_POST['Titulo']."','".$_POST['Descripcion']."','".$_SESSION['Id']."'); ";
			return $this->consultas($cadena);     
        }
        function consultas($cadena){
            try{
                if($consulta = $this->conn->conexion->query($cadena)){
                    return $consulta;           
                }
            }catch(mysqli_sql_exception $e){                    
                throw $e;
            }
        }
    }


?>