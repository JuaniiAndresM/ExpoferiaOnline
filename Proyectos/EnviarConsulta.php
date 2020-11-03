<?php
    include '../form/conexion.php';

    $email = '"' . $mysqli->real_escape_string($_POST['Email']) . '"';
    $consulta = '"' . $mysqli->real_escape_string($_POST['Consultas']) . '"';
    $insert_row = $mysqli->query("INSERT INTO solicitud_mensajes  (Email, Mensaje) VALUES($email, $consulta)");
    header('Location: Consultar.php');  
    
?>