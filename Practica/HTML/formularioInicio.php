<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrarse</title>
	<link rel="stylesheet" href="../Estilos/formulario.css">
</head>
<body>
	<header>
		<h1 style="color:white;margin-left: 2%;opacity: .9;font-family: ">Esta wea</h1>
		<nav>
			<a href="./Principal.php">Inicio</a>
			<a href="./formularioRegistro.php">Registrar Usuario</a>
			<a href="./formularioBuscar.php">Buscar Foto</a>
		</nav>
	</header>
	<form class="formulario" method="POST" action="../DB/IniciarSesion.php">
		<?php
			session_start();
			if (array_key_exists("Error", $_SESSION)) {
				if ($_SESSION["Error"] == 1) {
					//en caso de haber fallado el intento, el archivo IniciarSesion regresará a esta pantalla e imprimiremos el siguiete mensaje
				echo '<p style="color:Red;font-family:Arial;">Combinación de nombre y controsaeña incorrectas</p>';
			}
			}else{
				$_SESSION["Error"]=0;
			}			
		?>
		<input type="text" placeholder="Nombre" name="Nombre">
		<input type="password" placeholder="Contraseña"name="Clave">		
		<input type="submit" value="Iniciar Sesion" name="login">
		<a href="./formularioRegistro.php">Registrarse</a>
	</form>
	
</body>
</html>