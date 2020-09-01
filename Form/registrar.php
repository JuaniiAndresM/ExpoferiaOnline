<?php
include './conexion.php';
session_start();
if(isset($_POST['user']) && $_POST['contra']){
    // aquí pongo lo de mysql para verificar que no exista usuario y para guardar el nuevo usuario.
    
    $sql = "SELECT Usuario FROM usuario WHERE usuario = ".$_POST['user'];
    $result = $mysqli -> query($sql);
    if ($result) {
      // es error, el profesor existe.
      echo 'lo lamento... ya existe usuario';
      $result -> free_result();
    }else{
        // aquí grabamos el nuevo profesor.
        $usuario = '"'.$mysqli->real_escape_string($_POST['user']).'"';
        $contra = '"'.$mysqli->real_escape_string($_POST['contra']).'"';
        $telefono = '"'.$mysqli->real_escape_string($_POST['tel']).'"';
        $email = '"'.$mysqli->real_escape_string($_POST['mail']).'"';
        $nombre = '"'.$mysqli->real_escape_string($_POST['nombre']).'"';
        $apellido = '"'.$mysqli->real_escape_string($_POST['apellido']).'"';

        //MySqli Insert Query
        $insert_row = $mysqli->query("INSERT INTO solicitudes_profesor  (Usuario, Password, Nombre, Apellido, Email, Telefono) VALUES($usuario, $contra, $nombre, $apellido, $email, $telefono)");

        if($insert_row){
            print 'Ok, todo grabado : ' .$mysqli->insert_id .'<br />'; 
            header('Location: ../index.html');
        }else{
            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
        }
    }
    
    $mysqli -> close();

   
    
}


?>