<?php 
	include('Conexion.php');
	session_start();	
	$insertar=mysqli_query($conexion,"Insert into Fotos(IdFoto,Titulo, Descripcion, Fecha, Pais, Album, Alternativo, FRegistro,Foto,IdUsuario,Estilo) VALUES ('Null','".$_POST['Titulo']."','".$_POST['Descripcion']."','".$_POST['Fecha']."','".$_POST['Pais']."','".$_POST['Album']."','".$_POST['Alternativo']."','".$_POST['FRegistro']."','".$_POST['Foto']."','".$_SESSION['Id']."','".$_POST['Estilo']."');");
header("Location: ../HTML/Albumes.php");
?>