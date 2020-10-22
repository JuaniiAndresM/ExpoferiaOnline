<?php
include 'verificosesion.php';
include '../Form/conexion.php';

$sql = "SELECT * FROM usuario WHERE Usuario = '" . $_SESSION['Usuario'] . "'";
$result = $mysqli->query($sql);
$ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (isset($ss['Usuario'])) {
    echo 1;
} else {
    $sql = "SELECT * FROM solicitud_usuario WHERE Usuario = '" . $_SESSION['Usuario'] . "'";
    $result = $mysqli->query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (isset($ss['Usuario'])) {
        echo 1;
    } else {
        $sql = "SELECT * FROM solicitud_profesor WHERE Usuario = '" . $_SESSION['Usuario'] . "'";
        $result = $mysqli->query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (isset($ss['Usuario'])) {
            echo 1;
        } else {
            "UPDATE usuario SET Usuario = '" .$_POST['user']."' WHERE usuario ='". $_SESSION['Usuario']."'";
        }
    }
}                 
    
"UPDATE usuario SET Password = '" .$_POST['contra']."' WHERE usuario ='". $_SESSION['Usuario']."'";

"UPDATE usuario SET Email = '" .$_POST['mail']."' WHERE usuario ='". $_SESSION['Usuario']."'";
  
"UPDATE usuario SET Nombre ='" .$_POST['nombre']."' WHERE usuario ='".$_SESSION['Usuario']."'";
  
"UPDATE usuario SET Apellido = '" .$_POST['apellido']."' WHERE usuario ='".$_SESSION['Usuario']."'";

header('Location: ModificarUsuario.php');

?>