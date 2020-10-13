<?php

    include 'verificosesion.php';
    include '../Form/conexion.php';
    $nombre_proyecto = $_POST['nombre'];
    $introduccion =$_POST['dcorta'];
    $link='';
    if(isset($_POST['mlink'])){
        $link= $_POST['mlink'];
    }
    
    $descripcion= $_POST['dlarga'];
    $idp = $_POST['idp'];

    $sql= "update datosProyecto set Titulo = '$nombre_proyecto', Introduccion = '$introduccion',
     Descripcion = '".$descripcion."' WHERE idproyecto = '$idp'; ";
    
    if($mysqli->query($sql)){
        echo $sql;
    }else echo $sql;
    return;

?>