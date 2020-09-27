<?php
    session_start();
    include "../Form/conexion.php";
    $proyectos=$_POST["proyectos"]; 
    for ($i=0;$i<count($proyectos);$i++) 
    { 
        $sql = "SELECT * FROM datosProyecto WHERE Titulo = '$proyectos[$i]'";
        $result = $mysqli -> query($sql);
        $row = mysqli_fetch_array($result);
        $id = $row['idProyecto'];  
        $sql = "SELECT * FROM usuario WHERE Usuario = '".$_SESSION['Usuario']."'";
        $result = $mysqli -> query($sql);
        $row = mysqli_fetch_array($result);
        $idProfesor = $row['idUsuario'];  
        $sql = "SELECT * FROM proyectoProfesor WHERE idProfesor = '$idProfesor' AND idProyecto= '$id'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (isset($ss['idProfesor'])){
            header('Location: ../Proyectos/UnirseProyectos.php?eP');
        
        }else{
            
        }
    } 


            
    $mysqli -> close();
?>