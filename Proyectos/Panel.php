<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Panel | Expoeduca</title>

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
  <?php
  include 'verificosesion.php';
  ?>
    <div id="header"></div>

    <div class="Linea1Panel">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Panel">
            <div class="PanelFrame">
              <div class="PanelPerfil">
              <img id='fotousr' style='max-height:100%; max-width:100%; border-radius: 50px'>
              </div>

            <?php
            include '../Form/conexion.php';
            $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(isset($ss['TipoUsuario'])){ 
              if($ss['TipoUsuario']==0){
                echo "<script>
                document.getElementById('fotousr').src = '../img/admin.png';
              </script>";
              }elseif($ss['TipoUsuario']==1){
                echo "<script>
                document.getElementById('fotousr').src = '../img/prof.png';
              </script>";
              $admin = "display: none;";
              }elseif($ss['TipoUsuario']==2){
                echo "<script>
                document.getElementById('fotousr').src = '../img/user.png';
              </script>";
              $prof = "display: none;";
              $admin = "display: none;";
              }else{
                echo "<script>
                document.getElementById('fotousr').src = '../img/AdminIMG .png';
              </script>";
              }
            }
              
              echo "<p style='margin-top:7px; margin-bottom:5px;' >
              ". $_SESSION['Usuario']." 
              </p>";
            ?>
              <hr style="margin: 10px 0px" />
              <ul class="panelList">
                <li>
                  <a href="EditarProyectos.php" 
                    ><button class="botonPanel">
                      <i class="fa">&#xf044;</i> Editar Proyectos
                    </button></a
                  >
                </li>
                <li>
                  <a href="UnirseProyectos.php" style="<?php echo $prof ?>"
                    ><button class="botonPanel">
                      <i class="fa">&#xf055;</i> Unirse a Proyectos
                    </button></a
                  >
                </li>
                <li>
                  <a href="Admin.php" style="<?php echo $admin ?>"
                    ><button class="botonPanel">
                      <i class="fa">&#xf0c0;</i> Administrar Usuarios
                    </button></a
                  >
                </li>
                <li>
                  <a href="../Form/CerrarSesion.php"
                    ><button class="botonPanel">
                      <i class="fa">&#xf08b;</i> Cerrar Sesión
                    </button></a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>