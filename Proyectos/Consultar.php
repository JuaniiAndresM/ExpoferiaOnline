<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Consultas | Expoeduca</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/function.js"></script>
    <script src="../js/registerAlumnos.js"></script>
    <script src="../js/funcionConsulta.js"></script>

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
              <h2>Consultas:</h2>
              <hr />
              <br><p>Bienvenido: recuerda que no hay una respuesta automatica asi que va a tener que esperar</p>
              <br>
                <div class="form-group">
                  <label for="con">Usuario:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="user"
                    placeholder="Ingrese su usuario"
                    name="user"
                    required
                  />
                  <label for="con">Nombre:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nom"
                    placeholder="Ingrese su nombre"
                    name="nom"
                    required
                  />
                  <label for="con">Apellido:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="apellido"
                    placeholder="Ingrese su apellido"
                    name="apellido"
                    required
                  />
                  <label for="con">Nombre del proyecto:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nompro"
                    placeholder="Ingrese el nombre de su proyecto"
                    name="nompro"
                    required
                  />
                  <div class="form-group">
                    <label for="mil">Mail:</label>
                    <input
                      type="email"
                      class="form-control"
                      id="mail"
                      placeholder="Ingrese mail"
                      name="mail"
                      required
                    />
                  <label for="con">Consulta:</label>
                  <textarea
                    input type='text'
                    name='consulta'
                    class='form-control'
                    rows='5'
                    placeholder='Ingrese consulta'
                    id='consulta'
                  ></textarea>
                </div>
                <a class="buttonLogin"
                  ><button onclick='EnviarConsulta()'>Enviar consulta</button></a>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>