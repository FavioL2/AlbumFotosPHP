<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mis Albumes</title>
	<link rel="stylesheet" href="../Estilos/Usuario.css">
</head>
<body>
	<header>
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
			<div class="Contenido">
				<?php
				include('../DB/Conexion.php');
				session_start();				
				$Consulta=mysqli_query($conexion,"SELECT * FROM Albumes WHERE Usuario ='".$_SESSION['Id']."'");
				
				echo "<h1>".$_SESSION['usuario']."</h1>";
				
				$Albums=mysqli_fetch_array($Consulta);
			 ?>		
			 <div class="Opciones">
			 	<?php 			 	
			 	if (mysqli_num_rows($Consulta)<1) {
			 		echo '<h1 style="margin-left:20%;margin-right:20%;">No cuentas con Albumes registrados</h1>';	
			  	}else{
				 	for ($i=0; $i <mysqli_num_rows($Consulta); $i++)		
				 	{ 
				 		echo '<div class="camara">';
					 		echo '<div class="thumb">';
								echo '<h2>'.$Albums['Titulo'].'</h2>';
								echo '<p>'.$Albums['Descripcion'].'</p>';
								echo '<a href="Fotos.php?variable1='.$Albums['IdAlbum'].'&variable2='.$Albums['Titulo'].'">Ver Album </a>';
							echo '</div>';
					 	echo'</div>';
					 	$Albums=mysqli_fetch_array($Consulta);
				 	}	
				 }
			 	?>
			 	
			 </div>	
			
			</div>
			
			 
		</section>

	</div>
	
	
</body>
</html>