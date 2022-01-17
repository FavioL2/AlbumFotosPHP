<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="../Estilos/formulario.css">
</head>
<body>
	<header>
		<h1 style="color:white;margin-left: 2%;opacity: .9;font-family: ">Esta wea</h1>
		<nav>
			<a href="principal.php">Inicio</a>
			<a href="formularioInicio.php">Iniciar Sesion</a>
		</nav>
	</header>
	<?php
		include('../DB/Conexion.php');												
	?>
	<form class="formulario"method="POST" action="../DB/BD.php">
		<input type="text" placeholder="Nombre" name="Nombre">
		<input type="password" placeholder="Clave" name="Clave">
		<input type="email" placeholder="E-mail" name="Email">
		<div class="con">
			<label>
        	<input name="Sexo" type="radio" checked value="1" />
        	M
      		</label>    
      		<label>
        	<input name="Sexo" type="radio" value="2" />
        	F
      		</label>
      	</div>
      	<label class="fechas">Fecha de Nacimiento:</label>
		<input type="date" name="FNaciemiento" >
		<input type="text" placeholder="Ciudad" name="Ciudad">
		<div class="combo">
			<?php
				//Aquí se rellena un select con opciones basadas en los paises existentes en la base de datos, el valor será el identificador del pais para el momento de la insercción
				echo "<select id='Pais' name='Pais' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
				for ($i=0; $i <$numPaises ; $i++) { 
					$NomPais=mysqli_fetch_assoc($Paises);
					echo "<option value=".$NomPais['IdPais'].">".$NomPais['NomPais']."</option>";
				
				}				
				echo "</select>";
			?>
		</div>
		<label class="fechas">Fecha Registro: </label>
		<input type="date" name="FRegistro" name="FRegistro">		
		<input type="submit" value="Enviar">
	</form>
</body>
</html>