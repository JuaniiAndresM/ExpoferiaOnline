<?php
        include "../Form/conexion.php";
        if(isset($_POST['usuario']) && $_POST['password']){
        
        $sql = "SELECT * FROM solicitud_usuario WHERE Usuario = '".$_POST['usuario']."'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (isset($ss['Usuario'])){
            
            header('Location: ../Form/register.php?eP');
        
        }else{

                $sql = "SELECT * FROM usuario WHERE Usuario = '".$_POST['usuario']."'";
                $result = $mysqli -> query($sql);
                $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }  
        if (isset($ss['Usuario'])){
            header('Location: ../Info/contacto.php?eP');
        }else{
          
            $usuario = '"'.$mysqli->real_escape_string($_POST['usuario']).'"';
            $contra = '"'.$mysqli->real_escape_string($_POST['password']).'"';
            $email = '"'.$mysqli->real_escape_string($_POST['email']).'"';
            $nombre = '"'.$mysqli->real_escape_string($_POST['nombre']).'"';
            $apellido = '"'.$mysqli->real_escape_string($_POST['apellido']).'"';
            $titu = '"'.$mysqli->real_escape_string($_POST['nomproy']).'"';
            $prof = '"'.$mysqli->real_escape_string($_POST['profacargo']).'"';
            $year = '"'.$mysqli->real_escape_string($_POST['year']).'"';
            $orientacion = '"'.$mysqli->real_escape_string($_POST['orient']).'"';
        
            $insert_row = $mysqli->query("INSERT INTO solicitud_usuario  (Usuario, Password, Email, Nombre, Apellido, Titulo_Proyecto, Profesor, Year, Orientacion) VALUES($usuario, $contra, $email, $nombre, $apellido, $titu, $prof, $year, $orientacion)");
        
        }
        if($insert_row==true){
          
            header('Location: ../index.html');
        }else{
           
        }
    }
    
    $mysqli -> close();
?>