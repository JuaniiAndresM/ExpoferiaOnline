<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Admin Panel | Expoeduca</title>

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
    <div>
    </div>
      <div class="Linea1Admin">
        <div class="Linea2">
          <div class="Linea3">
            <div class="Admin">
                <a id="TituloTablaProyectos">Nuevas Solicitudes:</a>
                <hr />

                <div class="Solicitudes">
                <div class="SolicitudFrame">
                <div class="listAdmin">
                <div>
                    <img class="AdminIMG" src="/ExpoferiaOnline/img/AdminIMG.png"></img>
                </div>
                <div>
                  <hr id="LineaMobileProyecto" />
                  <a><b><i class="fa">&#xf007;</i> Nombre:</b> Lorem Ipsum.</a><br>
                  <a><b><i class="fa">&#xf0e0;</i> Email:</b> Lorem Ipsum@gmail.com</a><br>
                  <hr>
                  <a><b><i class="fa">&#xf007;</i>  Usuario:</b> Lorem</a><br>
                  <a><b><i class="fa">&#xf023;</i> Contraseña:</b> Ipsum</a><br>
                  <a><b><i class="fa">&#xf27a;</i> Comentario:</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, recusandae.</a>
                </div>
              </div>
              <div class="BotonesAdmin">
                <button><i class="fa">&#xf14a;</i>  Aprobar</button>

                <button data-toggle="collapse" data-target="#rechazar"><i class="fa">&#xf00d;</i>  Rechazar</button>
                <div id="rechazar" class="collapse form-group">
                  <label for="comment"><i class="fa">&#xf27a;</i> Comentario:</label>
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Ingrese Comentario"
                    id="comment"
                  ></textarea>
                  <button class="Enviar"><i class="fa">&#xf1d8;</i> Enviar</button>
                </div>
              </div>
            </div>
            <hr>
            <div class="listAdmin">
                <div>
                    <img class="AdminIMG" src="/ExpoferiaOnline/img/AdminIMG.png"></img>
                </div>
                <div>
                  <hr id="LineaMobileProyecto" />
                  <a><b><i class="fa">&#xf007;</i> Nombre:</b> Lorem Ipsum.</a><br>
                  <a><b><i class="fa">&#xf0e0;</i> Email:</b> Lorem Ipsum@gmail.com</a><br>
                  <hr>
                  <a><b><i class="fa">&#xf007;</i>  Usuario:</b> Lorem</a><br>
                  <a><b><i class="fa">&#xf023;</i> Contraseña:</b> Ipsum</a><br>
                  <a><b><i class="fa">&#xf27a;</i> Comentario:</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, recusandae.</a>
                </div>
              </div>
              <div class="BotonesAdmin">
                <button><i class="fa">&#xf14a;</i>  Aprobar</button>

                <button data-toggle="collapse" data-target="#rechazar"><i class="fa">&#xf00d;</i>  Rechazar</button>
                <div id="rechazar" class="collapse form-group">
                  <label for="comment"><i class="fa">&#xf27a;</i> Comentario:</label>
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Ingrese Comentario"
                    id="comment"
                  ></textarea>
                  <button class="Enviar"><i class="fa">&#xf1d8;</i> Enviar</button>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    <div id="footer"></div>
  </body>
</html>