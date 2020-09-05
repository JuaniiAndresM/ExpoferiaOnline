<?php
include './conexion.php';
session_start();
if(isset($_POST['user']) && $_POST['contra']){

    $sql = "SELECT * FROM solicitudes_profesor WHERE usuario = '".$_POST['user']."'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (isset($ss['Usuario'])){
        header('Location: ../Form/register.php?eP');
    }else{
        $sql = "SELECT * FROM usuario WHERE Usuario = '".$_POST['user']."'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        if (isset($ss['Usuario'])){
            header('Location: ../Form/register.php?eP');
        }else{
        $usuario = '"'.$mysqli->real_escape_string($_POST['user']).'"';
        $contra = '"'.$mysqli->real_escape_string($_POST['contra']).'"';
        $telefono = '"'.$mysqli->real_escape_string($_POST['tel']).'"';
        $email = '"'.$mysqli->real_escape_string($_POST['mail']).'"';
        $nombre = '"'.$mysqli->real_escape_string($_POST['nombre']).'"';
        $apellido = '"'.$mysqli->real_escape_string($_POST['apellido']).'"';
        $insert_row = $mysqli->query("INSERT INTO solicitudes_profesor  (Usuario, Password, Nombre, Apellido, Email, Telefono) VALUES($usuario, $contra, $nombre, $apellido, $email, $telefono)");
        }
        if($insert_row==true){
            print 'Ok, todo grabado : ' .$mysqli->insert_id .'<br />'; 
            header('Location: ../index.php');
        }else{
           
        }
    }
    
    $mysqli -> close();



?>