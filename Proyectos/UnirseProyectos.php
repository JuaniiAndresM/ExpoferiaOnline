<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Unirse a Proyecto | Expoeduca</title>

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
    <div class="ProyectoLista">
      <h2 id="TituloProyectos">Unirse a Proyectos:</h2>

      <div class="gridProyectosLista">
        <div class="Linea1ProyectosLista">
          <div class="Linea2">
            <div class="Linea3">
              <div class="Proyecto">
                <div class="Tabla">
                  <form action="UnirseProyecto.php" method="POST">
                    <div class="sel-unirProy">
                      <select name="proyectos[]" id="proyectos" class="form-control" multiple required>
                      <?php

                        require "../Form/conexion.php ";
                        session_start();

                        $sql = "SELECT * from usuario where Usuario = '".$_SESSION['Usuario']."'";
                        $result = $mysqli -> query($sql);
                        $row = mysqli_fetch_array($result);
                        $idUsuario = $row['idUsuario'];  

                        $sql2 = "SELECT * from datosProyecto";
                        $result2 = $mysqli -> query($sql2);
                        while($row2 = mysqli_fetch_array($result2))
                       {
                        $id = $row2['idProyecto']; 
                        $Nombre = $row2['Titulo']; 
                        $sql3 = "SELECT * from proyectoProfesor where idProyecto = 'id' AND idProfesor = 'idUsuario'";
                        $result3 = $mysqli -> query($sql3);
                        $row3 = mysqli_fetch_array($result3);
                        if (row3==true){
                          ?>
                          <option value="<?php echo $Nombre;?>"><?php echo $Nombre;?></option>       
                  <?php
                        }
        
                    }
                  
                    ?>
                      </select>
                      <p class="guide">Ctrl + click para seleccionar más de una opción</p>
                    </div>
                    <button type="submit">
                      <i class="fa">&#xf055;</i> Unirse
                    </button>
                    <div class="form-group">
                  <p style="color: red; display: none;" id="errorPwd">*Intentaste unirte a un proyecto al cual ya estas agregado*</p>
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
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>
