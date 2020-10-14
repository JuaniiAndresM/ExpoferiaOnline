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
    <script src="../js/function.js"></script>
    <script src="../js/registerAlumnos.js"></script>

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

    <div class="Linea1">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Contacto">
            <div class="ContactoFrame">
              <h2>Registro de alumno:</h2>
              <hr />
              <a
                >Hola, recuerda que deben crear un único usuario por proyecto. Debes completar estos
                datos y te contestaremos en breve. Una vez aprobado el registro, podrán ingresar toda
                la info del proyecto. Gracias.</a
              >
              <hr />
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
                </div>
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
                <div class="form-group" style="display: flex; padding-top:1rem; justify-content: center">
                  <label for="year">Año:</label>
                  <div class="radio-opt">
                    <label class="rad-opt-child" for="prim">
                      <input type="radio" id="prim" name="year" value="1"  required />
                      <span class="radicon"></span>
                      Primer Año
                    </label>
                    <label class="rad-opt-child" for="seg">
                      <input type="radio" id="seg" name="year" value="2"  required />
                      <span class="radicon"></span>
                      Segundo Año
                    </label>
                    <label class="rad-opt-child" for="terce">
                      <input type="radio" id="terce" name="year" value="3" required />
                      <span class="radicon"></span>
                      Tercer Año
                    </label>
                  </div>
                  <div class="radio-opt">
                    <label class="rad-opt-child" for="cuart">
                      <input type="radio" id="cuart" name="year" value="4"  required />
                      <span class="radicon"></span>
                      Cuarto Año
                    </label>
                    <label class="rad-opt-child" for="quint">
                      <input type="radio" id="quint" name="year" value="5"  required />
                      <span class="radicon"></span>
                      Quinto Año
                    </label>
                    <label class="rad-opt-child" for="hexa">
                      <input type="radio" id="hexa" name="year" value="6" required />
                      <span class="radicon"></span>
                      Sexto Año
                    </label>
                  </div>
                </div>
                <div class="select-opt" style="padding: 1%">
                  <label for="orient">Orientación:</label>
                  <div style="margin: 0 auto">
                    <select name="orient" id="orient" class="form-control" required>
                      <option value="" disabled selected hidden>Seleccione Orientación</option>
                      <option value="0">Informático</option>
                      <option value="1">Administración</option>
                      <option value="2">Deporte</option>
                      <option value="3">Científico</option>
                      <option value="4">Biológico</option>
                      <option value="5">Humanístico</option>
                      <option value="6">Artistico</option>
                      <option value="7">Ingeniera</option>
                      <option value="8">Arquitectura</option>
                      <option value="9">Medicina</option>
                      <option value="10">Agronomía</option>
                      <option value="11">Economía</option>
                      <option value="12">Derecho</option>
                      <option value="13">Ciclo Basico</option>
                      <option value="14">Cuarto Año</option>
                    </select>
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
                <a class="buttonEnviar" onclick="hola();"
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer"></div>
  </body>
</html>
