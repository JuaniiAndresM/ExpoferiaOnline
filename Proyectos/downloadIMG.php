<?php

session_start();
//include '..\Form\conexion.php';
$mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');


//Output any connection error
if ($mysqli->connect_error) {
    echo "error al conectar con base de datos";
    return;
}

$idproyecto = $_POST['idp'];
$tipo=$_POST['tipo'];

if($tipo==1){
  $sql = "SELECT ImagenPrincipal FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
  $result = $mysqli->query($sql);
  $rr = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $url=$rr['ImagenPrincipal'];
  echo "<img src='".$url."' width='350' height='196'>";
}else{
  if($tipo==2){
    $sql = "SELECT Banner FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
    $result = $mysqli->query($sql);
    $rr = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $url=$rr['Banner'];
    echo "<img src='".$url."' width='600' height='100'>";
  }
  else{
    $sql = "SELECT * FROM imagenes WHERE idProyecto ='".$idproyecto."';";
    $result = $mysqli->query($sql);
    
    while($row = $result->fetch_array()){
      $url=$row['url'];
      $pos = strrpos($url, "/");
      $url2='';
      if ($pos !== false) { 
          $url2= substr($url, $pos+1);
      }
      echo '<div class="img-wrap" ><span class="close" onclick="borramos(\''.$url2.'\')">&times;</span>';
      echo "<img src='".$url."' width='350' height='196' data-id='".$url2."'></div>";
     }
  }
}


?>  
