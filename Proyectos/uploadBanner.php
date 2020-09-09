<?php
include '..\Form\conexion.php';
session_start();
  $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
  $result = $mysqli -> query($sql);
//$target_dir = "../";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifica el formato
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  alert ("Solo se aceptan imagenes JPG, PNG y JPEG.");
  $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 3000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

?>