<?php
	$conexion=mysqli_connect("localhost", "root","asdasdF17","pibd")or die("Problemas con la conexión");
	$Paises= mysqli_query($conexion,"SELECT * FROM Paises;");
	$numPaises =mysqli_num_rows($Paises);
?>