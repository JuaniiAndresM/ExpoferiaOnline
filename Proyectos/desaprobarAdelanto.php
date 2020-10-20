<?php
include "../Form/conexion.php";
if(isset($_POST['idproyecto']) && !empty($_POST['idproyecto'])) {
    $sql = "UPDATE expoeduc_expoeduca.datosProyecto SET EstadoAdelanto = '0' WHERE idproyecto = '".$_POST['idproyecto']."' ";
    $mysqli -> query($sql);
    };
return;
?>