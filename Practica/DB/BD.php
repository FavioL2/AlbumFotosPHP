<?php 

include('Conexion.php');
echo "".$_POST['Nombre'];
$insertar=mysqli_query($conexion,"Insert into Usuarios(IdUsuario, NomUsuario, Clave, Email, Sexo, FNaciemiento, Ciudad, Pais, FRegistro) VALUES ('NULL','".$_POST['Nombre']."','".$_POST['Clave']."','".$_POST['Email']."','".$_POST['Sexo']."','".$_POST['FNaciemiento']."','".$_POST['Ciudad']."','".$_POST['Pais']."','".$_POST['FRegistro']."');");

echo "Registro Exitoso";
sleep(3);
header("Location: formularioInicio.php");
?>
