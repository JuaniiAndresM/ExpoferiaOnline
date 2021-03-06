<?php
  include 'verificosesion.php';
  ?>
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
    <script src="../js/function.js"></script>
    <script src="../js/functionUnirse.js"></script>
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
    <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <p>Unirse a proyectos:</p>
  <p>Todo funciono correctamente y te uniste a los proyectos seleccioandos.</p>
  <span class="close" style="color: red;" onclick="cerrar();">&times;</span>
</div>
</div>
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
                      <select name="proyectos[]" id="proyectos" class="form-control" multiple size="7" required>
                      <?php
                  $mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');

                    if ($mysqli->connect_error) {
                   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                                              }


                        $usuario=$_SESSION['Usuario'];

                        $sql = "SELECT * from usuario where Usuario = '$usuario'";
                        $result = $mysqli -> query($sql);
                        $row = mysqli_fetch_array($result);
                        $idUsuario = $row['idUsuario'];

                        $sql2 = "SELECT * from datosProyecto";
                        $result2 = $mysqli -> query($sql2);
                        while($row2 = mysqli_fetch_array($result2))
                       {
                        $id = $row2['idProyecto']; 
                        $Nombre = $row2['Titulo']; 
                        $sql3 = "SELECT * from proyectoProfesor where idProyecto = '$id' AND idProfesor = '$idUsuario'";
                        $result3 = $mysqli -> query($sql3);
                        $ss = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                        if (!isset($ss['idProfesor'])){
                          ?>
                          <option value="<?php echo $id;?>"><?php echo $Nombre;?></option>       
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
                      document.getElementById('myModal').style.display = 'block'; </script>";
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
