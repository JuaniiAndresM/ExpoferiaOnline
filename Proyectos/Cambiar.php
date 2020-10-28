<?php
include 'verificosesion.php';
include '../Form/conexion.php';

$sql = "UPDATE usuario SET Password = '" .$_POST['contra']."', Email = '" .$_POST['mail']."', Nombre ='" .$_POST['nombre']."',Apellido = '" .$_POST['apellido']."' WHERE usuario ='". $_SESSION['Usuario']."'";
$result =  $mysqli->query($sql);

$sql = "SELECT * FROM usuario WHERE Usuario = '" . $_POST['user'] . "'";
$result = $mysqli->query($sql);
$ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (isset($ss['Usuario'])) {

} else {
    $sql = "SELECT * FROM solicitud_usuario WHERE Usuario = '" . $_POST['user'] . "'";
    $result = $mysqli->query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (isset($ss['Usuario'])) {

    } else {
        $sql = "SELECT * FROM solicitud_profesor WHERE Usuario = '" . $_POST['user'] . "'";
        $result = $mysqli->query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (isset($ss['Usuario'])) {

        } else {
            $sql = "UPDATE usuario SET Usuario = '" .$_POST['user']."' WHERE usuario ='". $_SESSION['Usuario']."'";
            $resultado = $mysqli->query($sql);
            echo "#funciona";
        }
    }
}                 
include '../Form/CerrarSesion.php';
header('Location: ../Form/login.php');

?>