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
    <title>Usuario | Expoeduca</title>

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
            $sql=  "SELECT * FROM usuario where Usuario='". $_SESSION['Usuario']."'"; 
            $result = $mysqli->query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $UsuarioA = $_SESSION['Usuario'];
            $ContraA = $ss['Password'];
            $EmailA = $ss['Email'];
            $NombreA = $ss['Nombre'];
            $ApellidoA = $ss['Apellido'];
            if(isset($ss['TipoUsuario'])){ 
              if($ss['TipoUsuario']==0){
                echo "<script>
                document.getElementById('fotousr').src = '../img/admin.png';
              </script>";
              $prof = "display: none;";
 

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
            ?>
              <form action="Cambiar.php" method="POST">
                <div class="form-group">
                  <label for="uname">Usuario:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="user"
                    placeholder = "Usuario"
                    name="user"
                    value="<?php echo $UsuarioA ?>"
                    require
                    />
                </div>
                <div class="form-group">
                  <label for="pwd">Contraseña:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="contra"
                    placeholder= "Contraseña"
                    name="contra"
                    value="<?php echo $ContraA ?>"
                    require
                    />
                </div>
                <div class="form-group">
                  <label for="mail">Email:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="mail"
                    placeholder="Email"
                    name="mail"
                    value="<?php echo $EmailA ?>"
                    require
                    />
                </div>
                <div class="form-group">
                  <label for="nom">Nombre:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    placeholder="Nombre"
                    name="nombre"
                    value="<?php echo $NombreA ?>"
                    require
                    />
                </div>
                <div class="form-group">
                  <label for="apl">Apellido:</label>
                  <input
                    type="apellido"
                    class="form-control"
                    id="apellido"
                    placeholder="Apellido"
                    name="apellido"
                    value="<?php echo $ApellidoA ?>"
                    require
                    />
                </div>
                <?php
                  if(isset($_GET['eP'])){
                      echo "<script>
                      document.getElementById('errorPwd').style.display = 'block'; </script>";
                  }
                ?>
                <a class="buttonLogin" type="submit"
                  ><button>Cambiar</button></a
                >
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>