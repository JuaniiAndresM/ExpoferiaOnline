<?php
include '..\Form\conexion.php';
session_start();

$sql = "SELECT idProyecto FROM datosproyecto where Alumno= (SELECT idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."')";
$idproyecto = $mysqli->query($sql);

$ruta = 'proyecto' .$idproyecto; 

$nombre = "IMGP";
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

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo '<script language="javascript"> alert("La imagen no se pudo guardar". )</script>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
header("Location: PlanillaEditable.php ");
?>