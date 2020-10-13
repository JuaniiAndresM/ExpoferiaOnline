<?php 
include_once("contacto.php")
?>
<?php 
    $error = false;
    include "../Form/conexion.php";
    if(isset($_POST['usuario']) && $_POST['password']){
    $sql = "SELECT * FROM solicitud_usuario WHERE Usuario = '".$_POST['usuario']."'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (isset($ss['Usuario'])){ 
        $error = true; 
    }else{
        $sql = "SELECT * FROM usuario WHERE Usuario = '".$_POST['usuario']."'";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
        if (isset($ss['Usuario'])){
            $error = true;      
        }else{
            $sql = "SELECT * FROM solicitud_profesor WHERE Usuario = '".$_POST['usuario']."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if (isset($ss['Usuario'])){
                $error = true;  
            }else{
                        $usuario = '"'.$mysqli->real_escape_string($_POST['usuario']).'"';
                        $contra = '"'.$mysqli->real_escape_string($_POST['password']).'"';
                        $email = '"'.$mysqli->real_escape_string($_POST['email']).'"';
                        $nombre = '"'.$mysqli->real_escape_string($_POST['nombre']).'"';
                        $apellido = '"'.$mysqli->real_escape_string($_POST['apellido']).'"';
                        $titu = '"'.$mysqli->real_escape_string($_POST['nomproy']).'"';                                                                      
                        $year = '"'.$mysqli->real_escape_string($_POST['year']).'"';
                        $orientacion = '"'.$mysqli->real_escape_string($_POST['orient']).'"';
                        $insert_row = $mysqli->query("INSERT INTO solicitud_usuario  (Usuario, Password, Email, Nombre, Apellido, Titulo_Proyecto, Year, Orientacion) VALUES($usuario, $contra, $email, $nombre, $apellido, $titu, $year, $orientacion)");
                            
                    }
                    if($insert_row==true){
                        ?>
                         echo'<script type="text/javascript">
                        alert("Todo se grabo correctamente, presiona aceptar para terminar");
                        window.location.href="../index.html";
                         </script>';
                        <?php 
                    }else{
                        
                    }
                 }
            }
        }  
        if($error=true){
            ?>
            echo'<script type="text/javascript">
           alert("El Nombre ya exsiste, presiona aceptar para volver a la pagina");
            </script>';
           <?php   
        }
?>