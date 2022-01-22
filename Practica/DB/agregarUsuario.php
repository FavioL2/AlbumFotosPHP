<?php
    echo "<p>sa</p>";
    if (isset($_POST['Enviar'])){
        include_once 'usuarios.php';
        $usr= new usuario();
        // $usr->entradaDatos($_POST['usuario']);
        // $usr->registrarUsuario();
        echo $_POST['usuario']['FRegistro'];
    }
?>