<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Editar Proyecto | Expoferia Online</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/ExpoferiaOnline/js/function.js"></script>

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
  include '..\Form\conexion.php';
  session_start();
  $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
  $result = $mysqli -> query($sql);
  $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if(isset($ss['TipoUsuario'])){ 
    if($ss['TipoUsuario']==2){
      $aprobar = "display: none;";
    }
    }
    //cuando es alumno no muestra el boton de aprobar proyecto

    $sql1 = "SELECT idProyecto FROM datosproyectos WHERE Alumno='".$_SESSION['idUsuario']."'";
    $idp = $mysqli->query($sql1);

    $sql2 = "SELECT Titulo FROM datosproyecto WHERE id = $idp ";
    $nombre_proyecto = $mysqli->query($sql2);

    $sql3 = "SELECT Introduccion FROM datosproyecto WHERE id = $idp ";
    $introduccion = $mysqli->query($sql3);

    $sql4 = "SELECT Descripcion FROM datosproyecto WHERE id = $idp ";
    $descripcion = $mysqli->query($sql4);

    $sql5 = "SELECT LinkVideo FROM datosproyecto WHERE id = $idp ";
    $link = $mysqli->query($sql5);
  ?>

  
  <body onload="hfindex()">
    <div id="header"></div>

    <div class="Linea1Planilla">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Planilla">
            <div class="PlanillaFrame">
              <div class="ImagenesPlanilla">
                <h2>Fotos:</h2>
                <hr />
                <div class="Foto"></div>
                <div class="Foto"></div>
                <div class="Foto"></div>
              </div>
              <div class="CentralPlanilla">
                <h2>Nuevo Proyecto:</h2>
                <hr />

                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="user"
                    placeholder= "Nombre de Proyecto"
                    name="nombre_proyecto"
                    value= "<?php echo $nombre_proyecto;?>"
                  />
                </div>
                <hr />


                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Introduccion"
                    id="descripcionCorta_Proyecto"
                    value= "<?php echo $introduccion;?>"
                  ></textarea>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox"class="custom-control-input" data-toggle="collapse" data-target="#demo" id="customCheck" name="example1"/>
                    <label class="custom-control-label" for="customCheck" >Importar Video</label >
                  </div>
                  <div id="demo" class="collapse">
                  <div class="form-group">
                    <input type="text" class="form-control" id="user" placeholder="URL del Video [YouTube]" name="nombre_proyecto" value= "<?php echo $link;?>" />
                  </div>
                  
                </div>
                
                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Descripcion"
                    id="descripcionLarga_Proyecto"
                    value= "<?php echo $descripcion;?>"
                  ></textarea>
                </div>
                
                <form action="/ExpoferiaOnline/index.html" >
                <a class="BotonLogin2" href="/ExpoferiaOnline/index.html" style="<?php echo $aprobar ?>"
                  ><button style="margin-top: 5%;">
                    <i class="fa">&#xf14a;</i> Aprobar Proyecto
                  </button></a
                >
                <a class="BotonLogin2" href="/ExpoferiaOnline/index.html"
                  ><button style="margin-top: 5%;" name="submit" type="submit">
                    <i class="fa">&#xf0c7;</i> Guardar Cambios
                  </button></a
                >
              </div>
              <div class="BannerPlanillaEditable">
                <h2>Banner:</h2>
                <hr />
                <div class="BannerEditable">
 
                <label for="file-upload" class="BotonSubir"><i class="fa">&#xf03e;</i> Subir Imagen</label>
                  <input type="file" id="file-upload" />
                </div>
              </div>
  </form>
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
</html>