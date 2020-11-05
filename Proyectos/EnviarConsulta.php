<?php
    //include '../form/conexion.php';
    $mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');


//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
    $sql="INSERT INTO solicitud_mensajes (Email, Mensaje, Usuario, Nombre, Apellido, NombreProy) VALUES('".$_POST['Email']."','" .$_POST['Consultas']."','" .$_POST['Usuario']."','" .$_POST['Nombre']."','" .$_POST['Apellido']."','" .$_POST['Proyecto']."');";
    $resultado= $mysqli->query($sql);
    if($resultado==true){
        echo "La consulta ha sido enviada, responderemos en breve.";
    }else{
        echo "Hubo un problema al intentar enviar la consulta, inténtalo luego de unos minutos. Disculpa!";
    }
?>