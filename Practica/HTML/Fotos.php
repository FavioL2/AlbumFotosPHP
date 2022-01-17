<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mis Albumes</title>
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
			<div class="Contenido">
				<?php
				include('../DB/Conexion.php');
				session_start();				
				$Consulta=mysqli_query($conexion,"SELECT * FROM Fotos INNER JOIN Paises ON Fotos.Pais = Paises.IdPais WHERE Album ='".$_GET['variable1']."';");
				$Foto=mysqli_fetch_array($Consulta);				
				$Paises= mysqli_query($conexion,"SELECT * FROM Paises;");
				echo "<h1>".$_GET['variable2']."</h1>";

			 ?>	

				 <div class="Opciones">			 	
				 	<?php 
				 	$rows=mysqli_num_rows($Consulta);
				 	if ($rows <1) {
				 		echo "<h1> Este album no cuenta con fotografías </h1>";
				 	}
				 	for ($i=0; $i <mysqli_num_rows($Consulta); $i++)		
				 	{ 				 	
				 		echo '<div class="camara">';
					 		echo '<div class="thumb">';
								echo '<h2>'.$Foto['Titulo'].'</h2>';							
								echo '<img src="'.$Foto['Foto'].'" alt="'.$Foto['Alternativo'].'">';
								echo "<h3> Autor: ".$_SESSION['usuario']."</h1>";
								echo '<p> Descripcion: '.$Foto['Descripcion'].'</p>';
								echo '<p> Fecha: '.$Foto['Fecha'].'</p>';
								echo '<p> Pais: '.$Foto['NomPais'].'</p>';
							echo '</div>';
					 	echo'</div>';
					 	$Foto=mysqli_fetch_array($Consulta);	
				 	}
				 	?>	 	
				 </div>					 		
			</div>
		</section>
	</div>
	
	
</body>
</html>