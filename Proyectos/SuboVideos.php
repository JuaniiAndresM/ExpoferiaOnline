<?php
    include 'verificosesion.php';
    include '../Form/conexion.php';
    
    $video =$_POST['video'];
    $idproyecto = $_POST['idp'];
    $sql= "INSERT INTO videos (url, idProyecto) VALUES ('".$video."', ".$_POST['idp'].");";
   
    
    if($mysqli->query($sql)){
        echo "todo bien con ". $sql;
    }else echo "todo mal con este ".$sql;
    
    if($video == ""){
      $sql="DELETE FROM videos WHERE idProyecto='".$_POST['idp']."'";
      $result = $mysqli -> query($sql);
    }
    return;

?>