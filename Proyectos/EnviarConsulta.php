<?php
    include '../Form/conexion.php';
    echo $_POST['mail'];
    return;
    $insert_row = $mysqli->query("INSERT INTO solicitud_mensajes  (Email, Mensaje) VALUES ($_POST['mail'] , $_POST['consulta'])");

    if($insert_row){
    header('Location: Consultar.php');  
    }
?>