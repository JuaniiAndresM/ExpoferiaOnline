<?php
  include 'verificosesion.php';
    include "../Form/conexion.php";
    $proyectos=$_POST["proyectos"]; 
    $usuario=$_SESSION['Usuario'];
    $sql = "SELECT * FROM usuario WHERE Usuario = '".$_SESSION['Usuario']."'";
    $result = $mysqli -> query($sql);
    $row = mysqli_fetch_array($result);
    $idProfesor = $row['idUsuario'];  

    for ($i=0;$i<count($proyectos);$i++) 
    { 
            $idProyecto = $proyectos[$i];
            $insert_row = $mysqli->query("INSERT INTO proyectoProfesor (idProyecto, idProfesor,Responsable) VALUES($idProyecto, $idProfesor,true)");

    } 
    header('Location: ../Proyectos/UnirseProyectos.php?eP');

            
    $mysqli -> close();
?>