<?php
	$conexion=mysqli_connect(getenv('IP'), "root",getenv('pass'),"pibd")or die("Problemas con la conexión");
	$Paises= mysqli_query($conexion,"SELECT * FROM Paises;");
	$numPaises =mysqli_num_rows($Paises);
?>
