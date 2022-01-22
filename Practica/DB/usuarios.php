<?php
    class usuario{
        private $conn;
        private $datosUsuario;
        function __construct()
        {
            include_once 'Conexion.php';
            $this->conn=new conexion();
            $this->conn->conectar();
        }
        function entradaDatos($entrada){
            $this->datosUsuario=$entrada;
        }
        function iniciar(){
            $cadena ="SELECT * from usuarios WHERE Usuarios.NomUsuario='".$_POST['Nombre']."'AND usuarios.Clave ='".$_POST['Clave']."'";
            $registros= $this->conn->conexion->query($cadena);
	        session_start();
	        $Id=mysqli_fetch_array($registros);
	        if(mysqli_num_rows($registros) > 0){
		        $_SESSION["usuario"]=$_POST["Nombre"];
		        $_SESSION["contrasena"]=$_POST["Clave"];
                $_SESSION['Id']=$Id["IdUsuario"];
                $_SESSION['Error']=0;
                header("location: ../HTML/MenuUsuario.php");
            }else{
                $_SESSION["Error"]=1;
                header("location: ../HTML/formularioInicio.php");
            }
        }
        function cerrarSesion(){
            session_start();
	        session_unset();
	        header("location:../HTML/Principal.php");
        }
        function updateUsuario(){
            session_start();
        	try{
                $cadena = "UPDATE Usuarios SET NomUsuario='".$_POST['Nombre']."', Clave ='".$_POST['Clave']."', Email ='".$_POST['Email']."', Sexo='".$_POST['Sexo']."', FNaciemiento='".$_POST['FNaciemiento']."', Ciudad='".$_POST['Ciudad']."', Pais='".$_POST['Pais']."', FRegistro='".$_POST['FRegistro']."' WHERE Usuarios.IdUsuario = ".$_SESSION["Id"].";";
		        if($Update= $this->conn->conexion->query($cadena)){
                    header("location: MenuUsuario.php");
                }
	        }catch(mysqli_sql_exception $e){
                $_SESSION["Error"]=1;
		        throw $e;
		        header("location: DatosUsuario.php");
	        }
        }
        function buscarUsuario(){
            $cadena = "SELECT * FROM Usuarios WHERE Usuarios.IdUsuario ='".$_SESSION['Id']."'";
            try{
                if($consulta = $this->conn->conexion->query($cadena)){
                    return $consulta;           
                }
            }catch(mysqli_sql_exception $e){                    
                throw $e;
            }
        }
        function registrarUsuario(){
            $cadena = "Insert into Usuarios(IdUsuario, NomUsuario, Clave, Email, Sexo, FNaciemiento, Ciudad, Pais, FRegistro) VALUES ('NULL','".$this->datosUsuario['Nombre']."','".$this->datosUsuario['Clave']."','".$this->datosUsuario['Email']."','".$this->datosUsuario['Sexo']."','".$this->datosUsuario['FNaciemiento']."','".$this->datosUsuario['Ciudad']."','".$this->datosUsuario['Pais']."','".$this->datosUsuario['FRegistro']."');";
            try{
                if($resultado = $this->conn->conexion->query($cadena)){
                    echo "Registro Exitoso";
                    sleep(3);
                    header("Location: formularioInicio.php");
                }
            }catch(mysqli_sql_exception $e){                    
                throw $e;
            }
        }
    }
?>