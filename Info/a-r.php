<?php include_once ("aprobarProfesores.php");?>
<?php
include ("conexion.php");
if(isset($_POST['enviar'])){
    if(!empty($_POST['activo'])){
        foreach($_POST['activo'] as $selected){


                if(is_numeric($selected)){
                $seleccionar = "SELECT * FROM solicitudes_profesor WHERE idSolicitud = '$selected'";
                $resultado=mysqli_query($mysqli,$seleccionar);
                }else{
                    echo "rechazado".'<br/>';
                    $borrar="DELETE FROM `solicitudes_profesor` WHERE (`Usuario` = '$usuario')";
                    mysqli_query($mysqli,$borrar);
                }

                if($resultado){
                    while($row = $resultado->fetch_array()){
                        $id=$row['idSolicitud']; 
                        $nom=$row['Nombre']; 
                        $ape=$row['Apellido']; 
                        $usr=$row['Usuario']; 
                        $con=$row['Password']; 

                        if($selected==$id){ 
                            $insertar = "INSERT INTO `usuario` (Nombre,Apellido,Usuario,Password,TipoUsuario) VALUES ('$nom','$ape','$usr','$con','1')";
                            $borrar="DELETE FROM `proyecto`.`solicitudes_profesor` WHERE (`idSolicitud` = '$id')";
                            mysqli_query($mysqli,$insertar);
                            mysqli_query($mysqli,$borrar);
                        }
                    }

                }
            }
        }else{
            echo "No hay profesores seleccionados.";
        }
    }   
?>
<script>
window.location.href = 'aprobarProfesores.php'
</script>