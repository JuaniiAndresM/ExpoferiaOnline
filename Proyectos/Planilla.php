<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Planilla | Expoferia Online</title>

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

  <?php
    include '..\Form\conexion.php';
    $sql = "SELECT * FROM datosproyecto WHERE idproyecto = '1'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset ($ss['Titulo'])){
      echo "<script> document.getElementById(titulo).innerHTML = $ss['Titulo'] </script>" 
    }

  ?>
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
                <h2 id="titulo">Nombre del Proyecto:</h2>
                <hr />
                <h4>Introduccion</h4>
                <a
                  >Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Optio voluptates aut quam ullam vel. Ratione est quisquam
                  veniam voluptatum nemo laudantium quo numquam ut? Modi neque
                  quia sunt mollitia saepe hic odit temporibus possimus nisi,
                  magnam obcaecati voluptatibus iste qui tempore reprehenderit
                  quo eligendi? Provident doloremque accusantium id ipsa error
                  deleniti debitis odio possimus quam temporibus ipsum culpa
                  assumenda.

                  </a
                >
                <br></br>
                <h4>Descripcion:</h4>
                <a
                  >Admin qui fugit eligendi blanditiis labore adipisci
                  quaerat cupiditate nemo. Dolorem aliquid tempore repellendus
                  cumque libero eum inventore porro neque quisquam, deleniti
                  modi esse harum necessitatibus veritatis adipisci excepturi
                  cum et suscipit iste ipsum magnam optio, quam exercitationem.
                  Vero consequatur repellat optio! Lorem ipsum dolor sit, amet
                  consectetur adipisicing elit. Doloremque natus placeat iure
                  blanditiis quisquam repellendus! Itaque in quas quisquam culpa
                  inventore! Nostrum velit soluta mollitia cupiditate quam
                  aliquam exercitationem enim voluptatibus fuga est nulla eos,
                  doloribus non corrupti pariatur reprehenderit, tempora
                  quisquam, laboriosam fugiat minima? Explicabo, quia saepe
                  libero corporis quibusdam, sint rerum placeat sequi repellat
                  ducimus et deserunt odit, quos minus nobis modi voluptates
                  officiis earum nisi ab amet. Facilis magnam eveniet, harum
                  quidem assumenda delectus consequuntur necessitatibus. Natus
                  consectetur cupiditate laboriosam incidunt, facere dicta ut
                  officia iusto corrupti, omnis quae nesciunt nulla obcaecati?
                  Fuga officia fugit ad incidunt!</a
                >
                <div class="Video">
                  <h2>Video:</h2>
                  <hr />
                  <div>
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