<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Album</title>
	<link rel="stylesheet" href="../Estilos/formulario.css">
	<link rel="stylesheet" href="../Estilos/Usuario.css">
</head>
<body>
	<header>
		<!--Esta página muestra las fotos del album seleccionado con opción de logo heh-->
			<div class="logo">
				<img src="../img/logo.png" alt="">
			</div>
			<nav class="menu">
				<a href="Principal.php">Inicio</a>
				<a href="MenuUsuario.php">Atrás</a>
				<a href="Solicitud.php">Solicitar Album</a>
				<a href="../DB/CerrarSesion.php">Cerrar Sesion</a>
			</nav>
		</header>
	<form class="formulario"method="POST" action="">
		<input type="text" placeholder="Titulo del album" name="Titulo">
		<textarea name="Descripcion" placeholder="Descripción del album"></textarea>
		<input type="submit" value="Agregar" name="Botoncito">
		<?php
		if (isset($_POST['Botoncito'])) {
			include('../DB/Conexion.php');
			session_start();
			$Insertar=mysqli_query($conexion,"INSERT INTO Albumes(IdAlbum,Titulo,Descripcion,Usuario) VALUES('NULL','".$_POST['Titulo']."','".$_POST['Descripcion']."','".$_SESSION['Id']."'); ");
			if ($Insertar) {
				header("Location: ../HTML/Albumes.php");
			}
		}
		
		?>
	</form>
</body>
</html>