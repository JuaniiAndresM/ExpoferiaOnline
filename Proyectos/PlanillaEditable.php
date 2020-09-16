<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Editar Proyecto | Expoeduca</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/functionPlanillaEditable.js"></script>
    <script src="../js/function.js"></script>
   

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/ExpoferiaOnline/css/styles.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>

  <?php
   session_start(); 
  include '..\Form\conexion.php';  
   $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";   
   $result = $mysqli -> query($sql);   
   $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);   
   if(isset($ss['TipoUsuario'])){      
     if($ss['TipoUsuario']==2){       
       $aprobar = "display: none;";     
      }     
    }
    //cuando es alumno no muestra el boton de aprobar proyecto

    $sql1 = "SELECT idProyecto FROM datosProyecto where Alumno_Responsable= (SELECT idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."')";
    $idp = $mysqli -> real_escape_string($sql1);

    $sql2 = "SELECT * FROM datosProyecto WHERE id ='". $idp."'";
    $proyecto = $mysqli -> real_escape_string($sql2);

    $sql3 = "SELECT * FROM videos WHERE idProyecto ='". $idp."'";
    $video = $mysqli -> real_escape_string($sql3);

  ?>

  
  <body onload="hfindex()">
    <div id="header"></div>

    <div class="Linea1Planilla">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Planilla">
            <div class="PlanillaFrame">
              
                <a class="BotonLogin2" href="/ExpoferiaOnline/index.html" style="<?php echo $aprobar ?>"
                  ><button style="margin-top: 5%;">
                    <i class="fa">&#xf14a;</i> Aprobar Proyecto
                  </button></a
                >
                <a class="BotonLogin2" href="/ExpoferiaOnline/index.html"
                  ><button onclick="myFunction()" style="margin-top: 5%;">
                    <i class="fa">&#xf0c7;</i> Guardar Cambios
                  </button></a
                >
                <?php
                function myFunction() {
                  $nombre_proyecto = $_POST['user'];
                  $introduccion =$_POST['descripcionCorta_Proyecto'];
                  $link= $_POST['link'];
                  $descripcion= $_POST['descripcionLarga_Proyecto'];

                $sql = " UPDATE datosproyectos SET Titulo = '$nombre_proyecto' WHERE idproyecto = '$idp' ";
                $sql = " UPDATE datosproyectos SET Introduccion = '$introduccion' WHERE idproyecto = '$idp' ";
                $sql = " UPDATE datosproyectos SET LinkVideo = '$link' WHERE idproyecto = '$idp' ";
                $sql = " UPDATE datosproyectos SET Descripcion = '$descripcion' WHERE idproyecto = '$idp' ";
                }

                ?>

              </div>
              <div class="BannerPlanillaEditable">
                <h2>Banner:</h2>
                <hr />
                <div class="BannerEditable">
                </div>
              </div>
            </div>    
            <div class="MobileView">
              <div class="ImagenesPlanillaMobile">
                <h2>Fotos:</h2>
                <hr />
                <div class="Fotos">
                  <div class="Foto">
                    asdasd
                  </div>
                  <div class="Foto">
                    asdasd
                  </div>
                  <div class="Foto">
                    asdasd
                  </div>
                </div>
              </div>
              <div class="VideoMobile">
                <iframe
                  width="560"
                  height="315"
                  src="https://www.youtube.com/embed/XYZ123"
                  frameborder="0"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer"></div>
  </body>
  <!-- <form action="uploadBanner.php" method="post" enctype="multipart/form-data">
  name="submit" type="submit"-->

  <!-- <form action="uploadIMG.php" method="post" enctype="multipart/form-data">
  name="submit" type="submit"-->
</html>