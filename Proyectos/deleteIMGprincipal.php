<?php

session_start();
//include '..\Form\conexion.php';
$mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');


//Output any connection error
if ($mysqli->connect_error) {
    echo "error al conectar con base de datos";
    return;
}

$file = $_POST['url'];
$idp= $_POST['idp'];
$ruta = '../img/PROYECT' .$idp; 
$ruta2='http://expoeduca.liceoiep.edu.uy/iep/img/PROYECT' .$idp.'/'.$file; 
$sql = "update datosProyecto set ImagenPrincipal = '' where idProyecto=".$idp.";";
$resultaa = $mysqli->query($sql);

$url = $ruta.'/'.$file;

unlink($url) or die("ERROR, NO SE PUDO ELIMINAR LA FOTO: ".$url);
echo "se borró el archivo ".$file." con el sql ".$sql;


?>  
