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
				include '../DB/mod.php';
				include '../DB/estilos.php';
				$fotosUsuario= new modelo_Fotos();
				$estilos = new estilos();
				$AlbumsUsuario= $fotosUsuario->obtenerFotosUsuario();//llamamos a la función que retornará las fotos de usuario
				$Estilazo= $estilos->buscar();				
				$NumEstilos=mysqli_num_rows($Estilazo);
				$Paises=$fotosUsuario->obtenerPaises();
				$numPaises=mysqli_num_rows($Paises);	
				$NumAlbums=mysqli_num_rows($AlbumsUsuario);	
			 ?>
			 <form class="formulario"method="POST" action="">
				<input type="text" placeholder="Título" name="Titulo" required>						
				<input type="text" placeholder="Ruta" name="Foto" required>
				<input type="text" placeholder="Alternativo" name="Alternativo">
				<label for="">Fecha (Toma): </label>
				<input type="date" name="Fecha" name="Fecha"required>
				<label for="">Fecha de registro (Publicación) : </label>
				<input type="date" name="FRegistro" name="FRegistro" required>
				<div class="combo">
				<?php
					
					echo "<select id='Pais' name='Pais' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;' required>";
					for ($i=0; $i <$numPaises ; $i++) { 
						$NomPais=mysqli_fetch_assoc($Paises);
						echo "<option value=".$NomPais['IdPais'].">".$NomPais['NomPais']."</option>";
					
					}				
					echo "</select>";
				?>
				</div>
				<div class="combo">
				<?php					
					echo "<select id='Album' name='Album' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;' required>";
					for ($i=0; $i <$NumAlbums ; $i++) { 
						$NomAlbum=mysqli_fetch_assoc($AlbumsUsuario);
						echo "<option value=".$NomAlbum['IdAlbum'].">".$NomAlbum['Titulo']."</option>";
					}											
					echo "</select>";
				?>
				</div>
				<div class="combo">
				<?php					
					echo "<select id='Estilos' name='Estilo' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;' required>";
					for ($i=0; $i <$NumEstilos ; $i++) { 
						$NomEstilo=mysqli_fetch_assoc($Estilazo);
						echo "<option value=".$NomEstilo['IdEstilo'].">".$NomEstilo['Nombre']."</option>";
					}				
					echo "</select>";
				?>
				</div>
				<textarea placeholder="Descripción" name="Descripcion" required></textarea>
				<input type="submit" value="Agregar" name="agregar">
			 </form>
			 <?php 
				if(isset($_POST['agregar']))
				{
					$insr = $fotosUsuario->insertarFoto();
					if($insr){
						header("Location: ../HTML/Albumes.php");
					}
				} 
			 ?>
			
		</section>
	</div>
	
	
</body>
</html>