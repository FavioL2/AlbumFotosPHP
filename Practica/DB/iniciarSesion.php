<?php
	include('Conexion.php');
	$registros= mysqli_query($conexion, "SELECT * from usuarios WHERE Usuarios.NomUsuario='".$_POST['Nombre']."'AND usuarios.Clave ='".$_POST['Clave']."'");
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
?>