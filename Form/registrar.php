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
                                                              
                                                            if (isset($ss['Usuario'])){
                                                                header('Location: ../Form/register.php?eP');
                                                                              }else{
                                                                                $sql = "SELECT * FROM solicitud_usuario WHERE Usuario = '".$_POST['user']."'";
                                                                                $result = $mysqli -> query($sql);
                                                                                $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
            echo'<script type="text/javascript">
            alert("Todo se grabo correctamente, presiona aceptar para poder volver a la pagina");
            window.location.href="../Form/register.php";
            </script>';
        }else{
            echo'<script type="text/javascript">
            alert("Hubo un error, intente nuevamente");
            window.location.href="../Form/register.php";
            </script>'; 
             }
         }
    } 
}
  $mysqli -> close();



?>