<?php

include 'verificosesion.php';
session_start();
include '../Form/conexion.php';

$idproyecto = $_POST['id'];
$tipo=$_POST['tipo'];
$ruta = '../img/PROYECT' .$idproyecto; 
$ruta2= 'http://expoeduca.liceoiep.edu.uy/iep/img/PROYECT'.$idproyecto;

if (!file_exists($ruta)) {
  mkdir($ruta, 0777);
  
}

$file = basename($_FILES["file"]["name"]);
$target_dir = $ruta;
$target_file = $target_dir ."/". basename($_FILES["file"]["name"]);
$target_file2 = $ruta2 ."/". basename($_FILES["file"]["name"]);
$uploadOk = 1;



// Check if file already exists
if (file_exists($target_file)) {
  echo '<script language="javascript"> alert("La imagen ya existe.")</script>';
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 1000000) {
  echo '<script language="javascript"> alert("La imagen supera el peso maximo (1MB).")</script>';
  $uploadOk = 0;
}


  $allowed_mimetypes = array( 'jpeg', 'png', 'jpg');
// Get image file extension
$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
  if (!in_array($file_extension, $allowed_mimetypes)){
      echo 'la extension es '.$file_extension; 
      return;
  }
  $maximum = array(
    'width' => '1200',
    'height' => '200'
  );
  $image = @getimagesize($_FILES["file"]["tmp_name"]);
  $too_large = "Las dimensiones de la imagen no están permitidas. El tamaño máximo es: {$maximum['width']} por {$maximum['height']} pixeles. La imagen que subió es de: $image_width por $image_height pixeles.";


    if($tipo == 2){
      $uploadOk = 0;
      //banner
      $maximum = array(
        'width' => '1200',
        'height' => '200'
      );
      $image_width = $image[0];
      $image_height = $image[1];

      $proporcion = $image_width / $image_height;

      if($proporcion == 6){
        $uploadOk = 1;
      }else{
        echo '5';
      
      };

    }else{
      $uploadOk = 0;
      //img
      $maximum = array(
        'width' => '700',
        'height' => '400'
    );

    $image_width = $image[0];
    $image_height = $image[1];

    $proporcion = $image_width / $image_height;

    if($proporcion == 1.75){
      $uploadOk = 1;
    }else{
      echo '4 --  la proporcion es '.$proporcion.'y w '.$image[0].' y h '.$image[1].'<br>';
     
    };
    }



if ($uploadOk == 0) {
  echo '3';
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
    echo '1';
  } else {
    echo '2';
  }
}
