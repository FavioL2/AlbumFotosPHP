<?php
	include('Conexion.php');
			session_start();
			$Insertar=mysqli_query($conexion,"INSERT INTO Albumes(IdAlbum,Titulo,Descripcion,Usuario) VALUES('NULL','".$_POST['Titulo']."','".$_POST['Descripcion']."','".$_SESSION['Id']."'); ");	
			echo "INSERT INTO Albumes(IdAlbum,Titulo,Descripcion,Usuario) VALUES('NULL','".$_POST['Titulo']."','".$_POST['Descripcion']."','".$_SESSION['Id']."'; " ;
?>