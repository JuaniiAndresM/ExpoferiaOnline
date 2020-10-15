<?php
    include 'verificosesion.php';
    include '../Form/conexion.php';
    $idproyecto = $_POST['idp'];
    $video =$_POST['video'];
    $sql= "INSERT INTO videos (url, idProyecto) VALUES ($video, $idProyecto)";
    
    if($mysqli->query($sql)){
        echo $sql;
    }else echo $sql;
    return;

?>