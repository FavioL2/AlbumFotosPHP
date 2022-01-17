<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mis Albumes</title>
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
				<a href="Solicitud.php">Solicitar Album</a>
				<a href="../DB/CerrarSesion.php">Cerrar Sesion</a>
			</nav>
		</header>
		<div class="Contenedor">
		<section>			
				<?php
				include('../DB/Conexion.php');
				session_start();				
				$AlbumsUsuario=mysqli_query($conexion,"SELECT * FROM Albumes WHERE Albumes.Usuario ='".$_SESSION['Id']."';");				
				$Estilazo= mysqli_query($conexion,"SELECT * FROM Estilos;");				
				$NumEstilos=mysqli_num_rows($Estilazo);
				$NumAlbums=mysqli_num_rows($AlbumsUsuario);				
			 ?>
			 <form class="formulario"method="POST" action="../DB/AgregarFotosBD.php">
				<input type="text" placeholder="Título" name="Titulo">						
				<input type="text" placeholder="Ruta" name="Foto">
				<input type="text" placeholder="Alternativo" name="Alternativo">
				<label for="">Fecha (Toma): </label>
				<input type="date" name="Fecha" name="Fecha">
				<label for="">Fecha de registro (Publicación) : </label>
				<input type="date" name="FRegistro" name="FRegistro">
				<div class="combo">
				<?php
					
					echo "<select id='Pais' name='Pais' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
					for ($i=0; $i <$numPaises ; $i++) { 
						$NomPais=mysqli_fetch_assoc($Paises);
						echo "<option value=".$NomPais['IdPais'].">".$NomPais['NomPais']."</option>";
					
					}				
					echo "</select>";
				?>
				</div>
				<div class="combo">
				<?php					
					echo "<select id='Album' name='Album' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
					for ($i=0; $i <$NumAlbums ; $i++) { 
						$NomAlbum=mysqli_fetch_assoc($AlbumsUsuario);
						echo "<option value=".$NomAlbum['IdAlbum'].">".$NomAlbum['Titulo']."</option>";
					}											
					echo "</select>";
				?>
				</div>
				<div class="combo">
				<?php					
					echo "<select id='Estilos' name='Estilo' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
					for ($i=0; $i <$NumEstilos ; $i++) { 
						$NomEstilo=mysqli_fetch_assoc($Estilazo);
						echo "<option value=".$NomEstilo['IdEstilo'].">".$NomEstilo['Nombre']."</option>";
					}				
					echo "</select>";
				?>
				</div>
				<textarea placeholder="Descripción" name="Descripcion"></textarea>
				<input type="submit" value="Agregar">
			 </form>
			
		</section>
	</div>
	
	
</body>
</html>