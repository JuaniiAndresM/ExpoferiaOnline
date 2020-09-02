<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Editar Proyectos | Expoferia Online</title>

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
    <div class="Linea1EditarProyecto">
      <div class="Linea2">
        <div class="Linea3">
          <div class="EditarProyecto">
            <div class="EditarProyectoFrame">
              <div class="ProyectoLista">
                <div class="PanelProyecto"></div>
                <br />
                <p>Nombre de Proyecto</p>
                <hr />
                <ul class="panelList">
                  <li>
                  <?php
            include '..\Form\conexion.php';
            session_start();
            $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";
            $result = $mysqli -> query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(isset($ss['TipoUsuario'])){ 
              if($ss['TipoUsuario']==2){
                $gest1 = "display: none;";
                $gest2 = "display: none;";
              }
              }
              //cuando es alumno no muestra el boton de aprobar proyecto
            ?>
                    <a href="PlanillaEditable.php" 
                      ><button class="botonPanel">
                        <i class="fa">&#xf044;</i> Editar Proyecto
                      </button></a
                    >
                  </li>
                  <li>
                    <a href="PlanillaEditable.php" style="<?php echo $gest1 ?>"
                      ><button class="botonPanel">
                        <i class="fa">&#xf013;</i> Gestionar Proyecto
                      </button></a
                    >
                  </li>
                </ul>
              </div>
              <div class="ProyectoLista">
                <div class="PanelProyecto"></div>
                <br />
                <p>Nombre de Proyecto</p>
                <hr />
                <ul class="panelList">
                  <li>
                    <a href="PlanillaEditable.php"
                      ><button class="botonPanel">
                        <i class="fa">&#xf044;</i> Editar Proyecto
                      </button></a
                    >
                  </li>
                  <li>
                    <a href="PlanillaEditable.php" style="<?php echo $gest2 ?>"
                      ><button class="botonPanel">
                        <i class="fa">&#xf013;</i> Gestionar Proyecto
                      </button></a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer"></div>
  </body>
</html>
