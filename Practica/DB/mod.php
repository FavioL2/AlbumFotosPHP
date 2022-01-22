<?php 
    class modelo_Fotos{
        private $conn;
        function __construct(){
            require_once 'Conexion.php';      
            $this->conn = new conexion();
            $this->conn->conectar();
        }
        function obtenerFotos(){                    
            $cadena = "SELECT * FROM fotos INNER JOIN Paises ON Fotos.Pais = Paises.IdPais  ORDER BY FRegistro DESC LIMIT 5;";
            return $this->consultas($cadena);
        }
        function obtenerFotosUsuario(){
            if(!isset($_SESSION)) 
            { 
                try{
                    session_start();
                }catch(mysqli_sql_exception $e){
                    header("Location: formularioInicio.php");
                }
            }
            $cadena = "SELECT * FROM Albumes WHERE Albumes.Usuario ='".$_SESSION['Id']."';";            
            return $this->consultas($cadena);
        }
        function fotosPais(){
            $cadena = "SELECT * FROM Fotos INNER JOIN Paises ON Fotos.Pais = Paises.IdPais WHERE Album ='".$_GET['variable1']."';";
            return $this->consultas($cadena);
        }
        function obtenerPaises(){
            $cadena = "SELECT * FROM Paises";
            return $this->consultas($cadena);
        }
        function busquedaTituloPais(){
            $cadena ="SELECT * FROM Fotos INNER JOIN Paises ON Paises.IdPais ='".$_POST['Pais']."' WHERE Fotos.Titulo ='".$_POST['Titulo']."' && Fotos.Pais ='".$_POST['Pais']."';";
            return $this->consultas($cadena);
        }
        function insertarFoto(){
            if(!isset($_SESSION)) 
            { 
                try{
                    session_start();
                }catch(mysqli_sql_exception $e){
                    header("Location: formularioInicio.php");
                }
            }            
            $cadena ="Insert into Fotos(IdFoto,Titulo, Descripcion, Fecha, Pais, Album, Alternativo, FRegistro,Foto,IdUsuario,Estilo) VALUES ('Null','".$_POST['Titulo']."','".$_POST['Descripcion']."','".$_POST['Fecha']."','".$_POST['Pais']."','".$_POST['Album']."','".$_POST['Alternativo']."','".$_POST['FRegistro']."','".$_POST['Foto']."','".$_SESSION['Id']."','".$_POST['Estilo']."');" ;
            if($insertar = $this->conn->conexion->query($cadena)){                
                header("Location: ../HTML/Albumes.php");
            }            
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