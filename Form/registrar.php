<?php
include './conexion.php';
if(isset($_POST['user']) && $_POST['contra']){

    $sql = "SELECT * FROM solicitud_profesor WHERE Usuario = '".$_POST['user']."'";
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
        
        $insert_row = $mysqli->query("INSERT INTO solicitud_profesor  (Usuario, Password, Nombre, Apellido, Email, Telefono) VALUES($usuario, $contra, $nombre, $apellido, $email, $telefono)");
        }
        if($insert_row==true){
            print 'Ok, todo grabado : ' .$mysqli->insert_id .'<br />'; 
            header('Location: ../index.html');
        }else{
           
        }
    }
    
    $mysqli -> close();



?>