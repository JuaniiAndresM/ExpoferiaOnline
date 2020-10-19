<?php

include '../Form/conexion.php';

$sql = "SELECT * FROM usuario where Email = '".$_POST['mail']."'";
$result = $mysqli -> query($sql);
$sqlcontra = mysqli_fetch_array($result, MYSQLI_ASSOC);

$address = 'tomassosa1303@gmail.com';
$subject = "Contraseña";
if(isset($sqlcontra['Email'])){
    $body = $sqlcontra['Password']; 
    include 'EnviarEmail.php';
    header('Location: ../Form/login.php');
}else{
    echo "Este mail no esta registrado";
    header('Location: ../Form/login.php'); 
} 
?>

