<?php
    include 'verificosesion.php';
    include '..\Form\conexion.php';
    $nombre_proyecto = $_POST['nombre'];
    $introduccion =$_POST['dcorta'];
    $link= $_POST['mlink'];
    $descripcion= $_POST['dlarga'];
    $idp = $_POST['idp'];
    $sql= "update datosproyectos set Titulo = '$nombre_proyecto', Introduccion = '$introduccion',
    LinkVideo = '$link', Descripcion2 = '$descripcion' WHERE idproyecto = '$idp' ";
    echo $sql;
    return;
    if($mysqli->query($sql)){
        echo "0";
    }else echo "1";
    return;

?>