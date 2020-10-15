<?php
    include 'verificosesion.php';
    include '../Form/conexion.php';
    
    $idproyecto = $_POST['idp'];
    $sql = "DELETE FROM videos WHERE idProyecto='".$_POST['idp']."';";
    
    if($mysqli->query($sql)){
        echo "todo bien con ". $sql;
    }else echo "todo mal con este ".$sql;
    return;

?>