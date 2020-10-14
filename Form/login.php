<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Login | Expoeduc</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/function.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
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
              <h2>Login:</h2>
              <hr />
             
              <form action="logearse.php" method="POST">
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
                  <p style="color: red; display: none;" id="errorPwd">*El usuario o la contraseña son incorrectos</p>
                </div>
                <?php
                //Muestra el tag <p> de arriba si el usuario o la contraseña están mal (perdon agus)
                  if(isset($_GET['eP'])){
                      echo "<script>
                      document.getElementById('errorPwd').style.display = 'block'; </script>";
                  }
                ?>
                <a class="buttonLogin" type="submit"
                  ><button>Iniciar Sesión</button></a
                >
              </form>
              <p style='background-color:#e4fca7'>
                Solo deben crear cuenta: <br>- Un alumno por proyecto.<br>- Todos los profesores lideres de proyecto.
                <br>Si aún no tienes cuenta, solícitala mediante los enlaces de abajo.
                <br></p>
                <a class='btnlogin'
                  href="../Info/contacto.php"
                >
                  Alumno</a
                >
                <br><br><br>
                <a class='btnlogin'
                  href="../Form/register.php"
                >
                  Profesor</a
                >
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>
