<?php
    include '../form/conexion.php';
    $insert_row = $mysqli->query("INSERT INTO solicitud_mensajes  (Email, Mensaje) VALUES($_POST['mail'] , $_POST['consulta'])");
    header('Location: Consultar.php');  
    
?>