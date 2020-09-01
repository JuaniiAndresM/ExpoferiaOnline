<?php


include '../conexion.php';
session_start();
if(isset($_POST['user']) && $_POST['contra']){
    // aquí pongo lo de mysql para verificar que no exista usuario y para guardar el nuevo usuario.
    
    $sql = "SELECT usuario FROM usuarios WHERE usuario = ".$_POST['usuer'];
    $result = $mysqli -> query($sql);
    if ($result) {
      // es error, el profesor existe.
      echo 'lo lamento... ya existe usuario';
      $result -> free_result();
    }else{
        // aquí grabamos el nuevo profesor.
        $usuario = '"'.$mysqli->real_escape_string($_POST['user']).'"';
        $contra = '"'.$mysqli->real_escape_string($_POST['contra']).'"';

        //MySqli Insert Query
        $insert_row = $mysqli->query("INSERT INTO usuarios (usuario, contra) VALUES($user, $contra)");

        if($insert_row){
            print 'Ok, todo grabado : ' .$mysqli->insert_id .'<br />'; 
            $_SESSION['usuario']=$_POST['usuario'];
            header('Location: ../index.html');
        }else{
            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
        }
    }
    
    $mysqli -> close();

   
    
}


?>