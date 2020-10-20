<?php
include "../Form/conexion.php";
if(isset($_POST['idproyecto']) && !empty($_POST['idproyecto'])) {
    $sql = "SELECT * FROM expoeduc_expoeduca.datosProyecto where idproyecto = '".$_POST['idproyecto']."';";
    $result = $mysqli -> query($sql);
    $aprobado = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($aprobado["Descripcion"] !== null && $aprobado["ImagenPrincipal"] !== null){
            $sql = "UPDATE expoeduc_expoeduca.datosProyecto SET EstadoAdelanto = '1' WHERE idproyecto = '".$_POST['idproyecto']."' ";
            $mysqli -> query($sql);
            echo"Aprobado el adelanto!";
        } else{
            echo "Debe ingresar descripcion e imagen principal obligatoriamente para el adelanto.";
            }
    };
return;
?>