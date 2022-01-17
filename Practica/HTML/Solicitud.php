<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitar Album</title>
	<link rel="stylesheet" href="../Estilos/formulario.css">
	<link rel="stylesheet" href="../Estilos/Usuario.css">
</head>
<body>
	<header>
		<!--Esta página muestra las fotos del album seleccionado -->
			<div class="logo">
				<img src="imagenes/logo.png" alt="">
			</div>
			<nav class="menu">
				<a href="Principal.php">Inicio</a>
				<a href="MenuUsuario.php">Atrás</a>
				<a href="../DB/CerrarSesion.php">Cerrar Sesion</a>
			</nav>
		</header>
		<div class="Contenedor">
		<section>			
				<?php
				include('../DB/Conexion.php');
				session_start();				
				$AlbumsUsuario=mysqli_query($conexion,"SELECT * FROM Albumes WHERE Albumes.Usuario ='".$_SESSION['Id']."';");
				$NumAlbums=mysqli_num_rows($AlbumsUsuario);				
			 ?>
			 <form class="formulario"method="POST" action="">
				<input type="text" placeholder="Nombre" name="Nombre">
				<input type="text" placeholder="Dirección" name="Direccion">
				<input type="text" placeholder="Número de copias " name="Copias">
				<input type="email" placeholder="E-mail" name="Email">
				<input type="text" placeholder="Color" name="Color">				
				<input type="text" placeholder="Resolucion (px)" name="Resolucion">
				<input type="text" placeholder="Coste (DDLS)" name="Coste" >
				<?php					
					echo "<select id='Album' name='Album' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
					for ($i=0; $i <$NumAlbums ; $i++) { 
						$NomAlbum=mysqli_fetch_assoc($AlbumsUsuario);
						echo '<option value="'.$NomAlbum['IdAlbum'].' | '.$NomAlbum['Titulo'].'">'.$NomAlbum['Titulo'].'</option>';
					}											
					echo "</select>";
				?>
				<label for="">Fecha (Toma): </label>
				<input type="date" name="Fecha" name="Fecha">
				<label for="">Fecha de registro (Publicación) : </label>
				<input type="date" name="FRegistro" name="FRegistro">							
				<textarea placeholder="Descripción" name="Descripcion"></textarea>
				<input type="submit" value="Agregar" name="Botoncito">
				<?php

				if (isset($_POST['Botoncito'])) {
					$arr = explode('|',$_POST['Album']);					
					$Insertar =mysqli_query($conexion,"INSERT INTO solicitudes(`Album`, `Nombre`, `Titulo`, `Descripcion`, `Email`, `Direccion`, `Color`, `Copias`, `Resolucion`, `Fecha`, `FRegistro`, `Coste`) VALUES ('".$arr[0]."','".$_POST['Nombre']."','".$arr[1]."','".$_POST['Descripcion']."','".$_POST['Email']."','".$_POST['Direccion']."','".$_POST['Color']."','".$_POST['Copias']."','".$_POST['Resolucion']."','".$_POST['Fecha']."','".$_POST['FRegistro']."','".$_POST['Coste']."');");					
					if ($Insertar ) {
						echo '<div style="text-align:center;Color:green;font-family:Arial;" ><h2>Solicitud realizada con éxito </h1></div>';
					}else{
						echo '<div style="text-align:center;Color:Red;font-family:Arial;" ><h2>Error al cargar la Solicitud</h1></div>';
					}
				}					
				?>
			 </form>
			
		</section>
	</div>
	
</body>
</html>