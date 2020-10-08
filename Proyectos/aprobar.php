<?php
include "../Form/conexion.php";
if(isset($_POST['idproyecto']) && !empty($_POST['idproyecto'])) {
    echo "hola tonta".$_POST['idproyecto'];
    $sql = "UPDATE expoeduc_expoeduca.datosProyecto SET Estado = '1' WHERE idproyecto = '".$_POST['idproyecto']."' ";
    $mysqli -> query($sql);
    };
return;
?>