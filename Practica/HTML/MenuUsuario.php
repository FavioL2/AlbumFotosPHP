<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="../Estilos/Usuario.css">
</head>
<body>
	<header>
			<div class="logo">
				<img src="imagenes/logo.png" alt="">
			</div>
			<nav class="menu">
				<a href="Principal.php">Inicio</a>
				<a href="DatosUsuario.php">Mis Datos</a>
				<a href="Solicitud.php">Solicitar Album</a>				
				<a href="../DB/CerrarSesion.php">Cerrar Sesion</a>
			</nav>
		</header>
		<?php 			
			if(!isset($_SESSION)) 
			{ 
				session_start();
			}
			include_once '../DB/album.php';
			$album = new album();						
			$AlbumsUsuario=$album->obtenerAlbumes();
			$NumAlbums=mysqli_num_rows($AlbumsUsuario);			
		?>
	<div class="Contenedor">
		<section>
			<div class="Contenido">
				<?php				
				echo "<h1>".$_SESSION['usuario']."</h1>";
				?>		
			 <div class="Opciones">
			 	<div class="camara">
			 		<div class="thumb">
						<a href=<?php if ($NumAlbums<1){echo '"AgregarAlbum.php"';}else{
							echo '"AgregarFoto.php"';
						} ?>>
							<img src="../img/camara.png" alt="Lorem Ipsum"><p>Agragar fotos</p><?php if ($NumAlbums<1) {echo'<p>No tienes albumes registrados </p>';} ?>
						</a>
						
						</div>
				 					 	
			 	</div>
			 	<div class="camara">
			 		<div class="thumb">
				 		<a href="Albumes.php" type="file"><img src="../img/gallery.png" alt=""><p>Mis Albumes</p></a>
				 		
				 	</div>
				</div>
				<div class="camara">
			 		<div class="thumb">
				 		
				 		<input type="file" id="upload" name="upload" style="visibility: hidden; width: 1px; height: 1px" multiple />
						<a href="./AgregarAlbum.php">
							<img src="../img/galleryPlus.png" alt="">
							<p>Agregar Album</p>
						</a>
				 	</div>
				</div>
			 </div>	
			
			</div>
			
			 
		</section>

	</div>
	
</body>
</html>