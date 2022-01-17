<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mis Datos</title>
	<link rel="stylesheet" href="../Estilos/formulario.css">
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
				<a href="../DB/CerrarSesion.php">Cerrar Sesion</a>
			</nav>
		</header>
		<div class="Contenedor">
		<section>		
				<?php
				include('../DB/Conexion.php');
				session_start();								
					$Consulta=mysqli_query($conexion,"SELECT * FROM Usuarios WHERE Usuarios.IdUsuario ='".$_SESSION['Id']."'");
					$Datos= mysqli_fetch_assoc($Consulta);					
					$Nombres=array_keys($Datos); 
					$Paises= mysqli_query($conexion,"SELECT * FROM Paises;");
					$numPaises =mysqli_num_rows($Paises);
			 ?>				
			<form class="formulario"method="POST" action="Update.php">
				<?php
					echo '<h1 style="margin-left:35%;"> ID Usuario: '.$_SESSION["Id"].'</h1>';
					if ($_SESSION["Error"]==1) {
						echo '<hp style="margin-left:35%;color:Red;"> Error al registrarse</h1>';
					}
				 ?>
		<label class="fechas">Nombre Usuario:</label>
		<input type="text" placeholder="Nombre" name="Nombre" <?php echo 'value = "'.$Datos['NomUsuario'].'""'?>>
		<label class="fechas">Clave:</label>
		<input type="password" placeholder="Clave" name="Clave" <?php echo 'value = "'.$Datos['Clave'].'""'?>>
		<label class="fechas">Email:</label>
		<input type="email" placeholder="E-mail" name="Email" <?php echo 'value = "'.$Datos['Email'].'""'?>>
		<label class="fechas">Sexo</label>
		<div class="con">
			<label>
        	<input name="Sexo" type="radio" value="1"<?php if ($Datos['Sexo']==1){echo "checked";} ?>/>
        	M
      		</label>    
      		<label>
        	<input name="Sexo" type="radio" value="2" <?php if ($Datos['Sexo']==2){echo "checked";} ?> />
        	F
      		</label>
      	</div>
      	<label class="fechas">Fecha de Nacimiento:</label>
		<input type="date" name="FNaciemiento" <?php echo 'value = "'.$Datos['FNaciemiento'].'""'?> >
		<label class="fechas">Ciudad:</label>
		<input type="text" placeholder="Ciudad" name="Ciudad" <?php echo 'value = "'.$Datos['Ciudad'].'""'?> >
		<label class="fechas">País:</label>
		<div class="combo">
			<?php
				$Paises= mysqli_query($conexion,"SELECT * FROM Paises;");
				$numPaises =mysqli_num_rows($Paises);
				echo "<select id='Pais' name='Pais' style='width: 100%;padding: 20px;margin-bottom: 20px;border-radius: 3px;border:1px solid #226fc1;font-family: Arial;'>";
				for ($i=0; $i <$numPaises ; $i++) { 
					$NomPais=mysqli_fetch_assoc($Paises);
					if ($NomPais['IdPais']==$Datos['Pais']) {
						echo "<option value=".$NomPais['IdPais']." selected>".$NomPais['NomPais']."</option>";
					}else{
					echo "<option value=".$NomPais['IdPais'].">".$NomPais['NomPais']."</option>";
					}
				}				
				echo "</select>";
			?>
		</div>
		<label class="fechas" >Fecha Registro: </label>
		<input type="date" name="FRegistro" name="FRegistro" <?php echo 'value = "'.$Datos['FRegistro'].'""'?>>		
		<input type="submit" value="Actualizar">
	</form>			

		</section>
	</div>
</body>
</html>