<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscar</title>
	<link rel="stylesheet" href="../Estilos/formulario.css">
	<link rel="stylesheet" href="../Estilos/estilo.css">
</head>
<body>
	<?php
	include('../DB/Conexion.php');
	?>
	<header >
		<h1 style="color: white;margin-left: 20px;">Esta wea</h1>
		<nav class="menu">
			<a href="./Principal.php">Inicio</a>
			<a href="./formularioInicio.php">Iniciar Sesión</a>
			<a href="./formularioRegistro.php">Registrar Usuario</a>			
		</nav>
	</header>
	<form class="formulario"method="POST" action="">
		<input type="text" placeholder="Titulo del la foto" name="Titulo">
		<?php
		include_once '../DB/mod.php';
			$bpais = new modelo_Fotos();
			$Paises= $bpais->obtenerPaises();
			$numPaises =mysqli_num_rows($Paises);					
			echo "<select id='Pais' name='Pais' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
			for ($i=0; $i <$numPaises ; $i++) { 
				$NomPais=mysqli_fetch_assoc($Paises);
				echo "<option value=".$NomPais['IdPais'].">".$NomPais['NomPais']."</option>";
			}				
			echo "</select>";
			?>
		<input type="submit" value="Buscar" name="Botoncito">
		<div class="Contenido" >
			<?php
			//En caso de haber pulsado el botón, se verificará si existe la foto con una cosnsulta
		if (isset($_POST['Titulo'])&& isset($_POST['Botoncito'])) {			
			$Consulta=$bpais->busquedaTituloPais();					
			$Fotos=mysqli_fetch_array($Consulta);
			if (mysqli_num_rows($Consulta)==1) {			
				$Exist=1;
			}else{
				$Exist=0;
			}
		}
		//En caso de existir, se imprimirá una caja que contiene la imagen, en caso contrario se imprimirá un mensaje de advertencia
		?>
		
		<div class="caja1" style="width: 80%;margin-left: 20%;">
		<div <?php if ($Exist==1) { echo 'style="display:none;"';} ?>>
			<p style="color: Red;">No se encotraron fotografias </h1>				
		</div>
		
		<div class="div2" <?php if ($Exist==0){ echo 'style="display:none;"';}?>>
			<div class="camara">
				<div class="thumb">
					<h2><?php echo $Fotos['Titulo'];?> </h2>
					<img src= <?php echo '"'.$Fotos['Foto'].'"';?>>
					<p> <?php echo $Fotos['Fecha'] ;?></p>
					<p> <?php echo $Fotos['NomPais']; ?></p>					
				</div>		
			</div>
		</div>
	</form>
</body>
</html>