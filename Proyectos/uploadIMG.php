<?php

session_start();
include '../Form/conexion.php';

$idproyecto = $_POST['id'];
$tipo=$_POST['tipo'];
$cont = 1;
$ruta = '../img/PROYECT' .$idproyecto; 
$ruta2= 'http://expoeduca.liceoiep.edu.uy/iep/img/PROYECT'.$idproyecto;

if (!file_exists($ruta)) {
  mkdir($ruta, 0777);
  
}

$target_dir = $ruta;
$target_file = $target_dir ."/". basename($_FILES["file"]["name"]);
$target_file2 = $ruta2 ."/". basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
  echo '<script language="javascript"> alert("La imagen ya existe.")</script>';
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 3000000) {
  echo '<script language="javascript"> alert("La imagen supera el peso maximo (3MB).")</script>';
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo '<script language="javascript"> alert("La imagen no se pudo guardar". )</script>';
} else {
  $tmp_name = $_FILES["file"]["tmp_name"];
        // basename() puede evitar ataques de denegación de sistema de ficheros;
        // podría ser apropiada más validación/saneamiento del nombre del fichero
  $name = basename($_FILES["file"]["name"]);
  
  if (move_uploaded_file($tmp_name, "$target_dir/$name")) {
    chmod("$target_dir/$name", 0777);
    if($tipo==1){// imagen principal
      $sql = "UPDATE datosProyecto set ImagenPrincipal = '".$target_file2."' where idProyecto = '".$idproyecto."';";
    }else{
      if($tipo==2) {// banner
      $sql = "UPDATE datosProyecto set Banner = '".$target_file2."' where idProyecto = '".$idproyecto."';";
      }
      else{// todas las demás
        $sql = "INSERT INTO imagenes (url, idProyecto) VALUES ('".$target_file2."','".$idproyecto."')";
      }
       
    }
   
    $resultaa = $mysqli->query($sql);
    
  } else {
    echo "Lo siento, ocurrió un error y no se pudo cargar la imagen.";
  }
}

?>  
