<?php
	include('Conexion.php');
	session_start();
	try{

		$Update=mysqli_query($conexion,"UPDATE Usuarios SET NomUsuario='".$_POST['Nombre']."', Clave ='".$_POST['Clave']."', Email ='".$_POST['Email']."', Sexo='".$_POST['Sexo']."', FNaciemiento='".$_POST['FNaciemiento']."', Ciudad='".$_POST['Ciudad']."', Pais='".$_POST['Pais']."', FRegistro='".$_POST['FRegistro']."' WHERE Usuarios.IdUsuario = ".$_SESSION["Id"].";");
			header("location: MenuUsuario.php");
	}catch(mysqli_sql_exception $e)){
		throw $e;
		$_SESSION["Error"]=1;
		header("location: DatosUsuario.php");
	}

?>