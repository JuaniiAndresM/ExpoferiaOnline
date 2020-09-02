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
                    placeholder="Nombre del Proyecto"
                    name="nombre_proyecto"
                  />
                </div>
                <hr />
                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Descripción corta del Proyecto"
                    id="descripcionCorta_Proyecto"
                  ></textarea>
                </div>
                <div class="Video">
                  <div class="custom-control custom-checkbox mb-3">
                    <input
                      type="checkbox"
                      class="custom-control-input"
                      id="customCheck"
                      name="example1"
                    />
                    <label class="custom-control-label" for="customCheck"
                      >Importar Video</label
                    >
                  </div>

                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="user"
                      placeholder="URL del Video [YouTube]"
                      name="nombre_proyecto"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Descripción del Proyecto"
                    id="descripcionLarga_Proyecto"
                  ></textarea>
                </div>
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
            ?>
                <a class="BotonLogin2" href="/ExpoferiaOnline/index.html" style="<?php echo $aprobar ?>"
                  ><button style="margin-top: 5%;">
                    <i class="fa">&#xf14a;</i> Aprobar Proyecto
                  </button></a
                >
                <a class="BotonLogin2" href="/ExpoferiaOnline/index.html"
                  ><button style="margin-top: 5%;">
                    <i class="fa">&#xf0c7;</i> Guardar Cambios
                  </button></a
                >
              </div>
              <div class="BannerPlanilla">
                <h2>Banner:</h2>
                <hr />
                <div class="Banner"></div>
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
</html>
