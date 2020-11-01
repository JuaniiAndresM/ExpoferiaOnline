<?php
include '../form/conexion.php';
$email = '"' . $mysqli->real_escape_string($_POST['mail']) . '"';
$consulta = '"' . $mysqli->real_escape_string($_POST['consulta']) . '"';
$insert_row = $mysqli->query("INSERT INTO solicitud_mensajes  (Email, Mensaje) VALUES($email, $consulta)");
header('Location: Consultar.php');  
?>