<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Proyectos | Expoeduca</title>

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

  <?php
  include '../Form/conexion.php';
  $sql = "SELECT * FROM datosproyectos";
  $orientacion = $mysqli->query($sql);

  ?>
  <body onload="hfindex()">
    <div id="header"></div>
    <div class="ProyectoLista">
      <h2 id="TituloProyectos">Proyectos:</h2>

      <div class="gridProyectosLista">
        <div class="Linea1ProyectosLista">
          <div class="Linea2">
            <div class="Linea3">
              <div class="Proyecto">
                <div class="Tabla">
                  <div class="SelectoresGrid">
                  
                  <form method ="post">
                  
                  <div class="Selectores">
<!-- crear tablas de orientacion -->
                      <select name="BachilleratoSelect" class="custom-select">
                        <option value="">Local</option>
                        <option value="">Bachillerato Diversificado</option>
                        <option value="">Bachillerato Tecnologico</option>
                        <option value="">Ciclo Basico</option>
                      </select>

                      <select name="GradoSelect" class="custom-select">
                      <option value="">Grado</option>
                        <option value="">1º</option>
                        <option value="">2º</option>
                        <option value="">3º</option>
                      </select>

                      <select name="OrientacionSelect" class="custom-select">
                        <option value="">Orientacion</option>
                        <?
                          while($row = $orientacion->fetch_assoc()) {
                            echo "<option>".$row["Orientacion"]."</option>"
                          }
                          
                        ?>
                      </select>
                      
                      <button name="Filtro" typo="submit">Filtrar</button>
                      </div>
                      </form>
                      <script src="../js/functionfiltros.js"></script>
                  </div>
                  <hr />
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>
