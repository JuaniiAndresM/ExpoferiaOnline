<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Register | Expoeduca</title>

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

    <div class="Linea1Login">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Login">
            <div class="LoginFrame">
              <h2>Register:</h2>
              <hr />
              <form action="registrar.php" method="POST">
                <div class="form-group">
                  <label for="uname">Usuario:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="user"
                    placeholder="Ingrese Usuario"
                    name="user"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="pwd">Contraseña:</label>
                  <input
                    type="password"
                    class="form-control"
                    id="contra"
                    placeholder="Ingrese Contraseña"
                    name="contra"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="nom">Nombre:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    placeholder="Ingrese nombre"
                    name="nombre"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="ape">Apellido:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="apellido"
                    placeholder="Ingrese apellido"
                    name="apellido"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="tlf">Telefono:</label>
                  <input
                    type="number"
                    class="form-control"
                    id="tel"
                    placeholder="Ingrese numero de telefono"
                    name="tel"
                    required
                  />
                  <div class="form-group">
                    <label for="mil">Mail:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="mail"
                      placeholder="Ingrese mail"
                      name="mail"
                      required
                    />
                  </div>
                  <div class="form-group">
                  <p style="color: red; display: none;" id="errorPwd">*El usuario ya exsiste</p>
                </div>
                <?php
                  if(isset($_GET['eP'])){
                      echo "<script>
                      document.getElementById('errorPwd').style.display = 'block'; </script>";
                  }
                ?>
                </div>
                <a class="buttonLogin" type="submit"
                  ><button>Registrarse</button></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>