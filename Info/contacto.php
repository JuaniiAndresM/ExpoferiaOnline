<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Expoeduca | IEP</title>

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

    <div class="Linea1">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Contacto">
            <div class="ContactoFrame">
              <h2>Contacto:</h2>
              <hr />
              <a
                >Si eres alumno o profesor y quieres tener tu proyecto en
                nuestra pagina, tan solo completa el siguiente formulario con
                los datos requeridos, y te enviaremos los datos de la cuenta.</a
              >
              <hr />
              <form action="registrarAlumno.php" method="POST">
                <div class="form-group">
                  <label for="uname">Nombre:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    placeholder="Ingrese Nombre"
                    name="nombre"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="uname">Apellido:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="apellido"
                    placeholder="Ingrese Apellido"
                    name="apellido"
                    required
                  />
                <div class="form-group">
                  <label for="uname">Email:</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Ingrese Email"
                    name="email"
                    required
                  />
                </div>
                <div class="form-group" style="display: flex; padding-top:1rem">
                  <label for="year">Año:</label>
                  <div class="radio-opt">
                    <label class="rad-opt-child" for="prim">
                      <input type="radio" id="prim" name="year" value="Primero"  required />
                      <span class="radicon"></span>
                      Primer Año
                    </label>
                    <label class="rad-opt-child" for="seg">
                      <input type="radio" id="seg" name="year" value="Segundo"  required />
                      <span class="radicon"></span>
                      Segundo Año
                    </label>
                    <label class="rad-opt-child" for="terce">
                      <input type="radio" id="terce" name="year" value="Tercero" required />
                      <span class="radicon"></span>
                      Tercer Año
                    </label>
                  </div>
                  <div class="select-opt" style="width: 65%">
                    <div style="text-align: center">
                      <label for="orient">Orientación:</label>
                    </div>
                    <div style="margin: 0 auto">
                      <select name="orient" id="orient" class="form-control" required>
                        <option value="" disabled selected hidden>Seleccione Orientación</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Artistico">Artístico</option>
                        <option value="Biologico">Biológico</option>
                        <option value="Cientifico">Científico</option>
                        <option value="Ciclo Básico">Ciclo Básico</option>
                        <option value="Deportivo">Deportivo</option>
                        <option value="Expresion">Expresión</option>
                        <option value="Humanistico">Humanístico</option>
                        <option value="Informático">Informático</option>
                        <option value="Ingles">Inglés</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="select-opt" style="padding: 1%">
                      <label for="nomproy">Nombre del proyecto:</label>
                    <div style="margin: 0 auto">
                      <input type="text"
                      class="form-control"
                      id="nomproy"
                      placeholder="Nombre del Proyecto"
                      name="nomproy"
                      required>
                    </div>
                  </div>
                  <div class="select-opt" style="padding: 1%">
                      <label for="profacargo">Profesor a Cargo:</label>
                    <div style="margin: 0 auto">
                      <select name="profacargo" id="profacargo" class="form-control" required>
                        <option value="" disabled selected hidden>Seleccione Profesor a Cargo</option>
                        <?php

                                require "../Form/conexion.php";
                                $sql = "SELECT * from usuario where TipoUsuario = 1";
                                $result = $mysqli -> query($sql);
                                while($row = mysqli_fetch_array($result))
                                      {
                                     $Nombre = $row['Nombre'];  
                          ?>
                                      <option value="<?php echo $Nombre;?>"><?php echo $Nombre;?></option>
                          <?php
                                      }
                               
                          ?>
                      </select>
                    </div>
                  </div>
                </div>
                <hr />
                <a
                  >Ingrese el nombre de usuario y la contraseña que desea para
                  su cuenta.</a
                >
                <hr />
                <div class="form-group">
                  <label for="uname">Usuario:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="usuario"
                    placeholder="Ingrese Usuario"
                    name="usuario"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="uname">Contraseña:</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Ingrese Contraseña"
                    name="password"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="comment">Comentario:</label>
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Ingrese Comentario"
                    id="comment"
                  ></textarea>
                </div>
                <a class="buttonEnviar" type="submit"
                  ><button>Enviar</button></a
                >
                <div class="form-group">
                  <p style="color: red; display: none;" id="errorPwd">*El usuario ya exsiste*</p>
                </div>
                <?php
                  if(isset($_GET['eP'])){
                      echo "<script>
                      document.getElementById('errorPwd').style.display = 'block'; </script>";
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer"></div>
  </body>
</html>
