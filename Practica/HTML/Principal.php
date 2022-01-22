<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>	
	<link rel="stylesheet" href="../Estilos/estilo.css">
</head>
<body>	
	<div class="contenedor">		
	
	<header >
		<h1 style="color: white;margin-left: 20px;">Esta wea</h1>
		<nav class="menu">
			<a href="./formularioInicio.php">Iniciar Sesión</a>
			<a href="./formularioRegistro.php">Registrar Usuario</a>
			<a href="./formularioBuscar.php">Buscar Foto</a>
		</nav>
	</header>
				<?php
				include('../DB/mod.php');
					$fotos = new modelo_fotos();			
					$registros= $fotos->obtenerFotos();
					$numero=mysqli_num_rows($registros);
					$Count=0;
					//Se verificarán si hay el número suficiente de fotos para mostrar, en caso contrario no se mostrarán las cajas. Se usa un contador bajo la idea de que puede haber más de 1 pero menos de 5.
					//No  se utilizó una estructura repetitiva para generar las cajas por conflictos con las hojas de estilo, dado que las cajas se generarían después.
					?>				
		<div class="Contenido" <?php if ($numero <1){echo 'style="display:none;"';}?>>
			<div class="caja1">	
				<?php
				if ($Count< $numero) {
				echo "<h1>".$reg['Titulo']."</h1>";
				echo '<img src="'.$reg['Foto'].'">';
				echo "<p>".$reg['NomPais']."</p>"; $Count=$Count+1;
			}
				?>
			</div>
			<div class="caja1 caja2" <?php if ($Count>= $numero) {echo 'style="display:none;"';} ?>>
			<?php
			if ($Count< $numero) {
				$reg = mysqli_fetch_array($registros);
				echo "<h1>".$reg['Titulo']."</h1>";
				echo '<img src="'.$reg['Foto'].'">';
				echo "<p>".$reg['NomPais']."</p>";
				$Count=$Count+1;
			}
			 ?>	
			</div>
			<div class="caja1" <?php if ($Count>= $numero) {echo 'style="display:none;"';} ?>>
				<?php
				if ($Count< $numero) {					
				$reg = mysqli_fetch_array($registros);
				echo "<h1>".$reg['Titulo']."</h1>";
				echo '<img src="'.$reg['Foto'].'">';
				echo "<p>".$reg['NomPais']."</p>";$Count=$Count+1;
				}
			 ?>	
			</div>			
		</div>
		<div class="Contenido">
			<div class="caja1 caja2" <?php if ($Count>= $numero) {echo 'style="display:none;"';} ?>>		
				<?php
				if ($Count< $numero) {	
					$reg = mysqli_fetch_array($registros);
					echo "<h1>".$reg['Titulo']."</h1>";
					echo '<img src="'.$reg['Foto'].'">';
					echo "<p>".$reg['NomPais']."</p>";
					$Count=$Count+1;
				}
			 ?>			
			</div>
			<div class="caja1 caja2" <?php if ($Count>= $numero) {echo 'style="display:none;"';} ?>>	
				<?php
				if ($Count<= $numero) {	
					$reg = mysqli_fetch_array($registros);
					echo "<h1>".$reg['Titulo']."</h1>";
					echo '<img src="'.$reg['Foto'].'">';
					echo "<p>".$reg['NomPais']."</p>";
				}
			 ?>	
			</div>		
		</div>	
	</div>
</body>
</html>