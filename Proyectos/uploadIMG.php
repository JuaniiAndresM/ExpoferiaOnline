<?php
include 'verificosesion.php';
include '..\Form\conexion.php';

$sql = "SELECT idProyecto FROM datosproyecto where Alumno= (SELECT idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."')";
$idproyecto = $mysqli->query($sql);

$cont = 1;

$ruta = '../img/PROYECT' .$idproyecto; 

if(!is_dir($ruta)){ 
  @mkdir($ruta, 0700); 
}

$target_dir = $ruta;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
  echo '<script language="javascript"> alert("La imagen ya existe.")</script>';
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
  echo '<script language="javascript"> alert("La imagen supera el peso maximo (3MB).")</script>';
  $uploadOk = 0;
}
$name = "foto".$cont;
if ($uploadOk == 0) {
  echo '<script language="javascript"> alert("La imagen no se pudo guardar". )</script>';
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"][$name]). " has been uploaded.";

    $sql = "INSERT INTO imagenes (url, idProyecto) VALUES ('".$target_dir."','".$idproyecto."')";
    $resultaa = $mysqli->query($sql);

    $cont = $cont + 1;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>  
