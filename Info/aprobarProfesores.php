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

                <style>
                table,td,th {
                    border: 1px solid black;
                }
                table {
                    padding-bottom: 5%;
                }
                </style>
<div class="Linea1Aprob">
    <div class="Linea2">
        <div class="Linea3">
            <div class="blancCntnt">
                <div class="aprobTable">
                    <table id="profTabl">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>A/R</th>
                    </tr> 
                    <?php
                        include "../Form/conexion.php";

                        $sql = "SELECT * FROM solicitud_profesor";
                        $resultado = mysqli_query($mysqli,$sql);

                        if($resultado){
                            while($row = $resultado->fetch_array()){
                            $idsolicitud=$row['idSoliProf'];
                            $nombre=$row['Nombre'];
                            $apellido=$row['Apellido'];
                            $mail=$row['Email'];
                            $telefono=$row['Telefono'];
                            $usuario=$row['Usuario'];
                            $contra=$row['Password'];
            
                        echo "<tr>
                            <td>$idsolicitud</td>
                            <td>$nombre</td>
                            <td>$apellido</td>
                            <td>$mail</td>
                            <td>$telefono</td>
                            <td>$usuario</td>
                            <td>$contra</td>
                            <td>
                            <form action='#' method='post'>
                            <input type='checkbox' name='activo[]' value='$idsolicitud'></input>
                            <input type='checkbox' name='activo[]' value='$usuario'></input>
                            </td>
                        </tr>"; 
                    } 
                }           
                ?>
                <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                </tr>
                </table>

                <?php
                    if(isset($_POST['enviar'])){
                        if(!empty($_POST['activo'])){
                            foreach($_POST['activo'] as $selected){

                                if(is_numeric($selected)){
                                $seleccionar = "SELECT * FROM solicitud_profesor WHERE idSoliProf = '$selected'";
                                $resultado=mysqli_query($mysqli,$seleccionar);
                                }else{
                                $borrar="DELETE FROM `solicitud_profesor` WHERE (`Usuario` = '$selected')";
                                mysqli_query($mysqli,$borrar);
                                ?>
                                <script>
                                window.location = 'aprobarProfesores.php';
                                </script>
                    <?php
                }

                if($resultado){
                    while($row = $resultado->fetch_array()){

                        $id=$row['idSoliProf']; 
                        $nom=$row['Nombre']; 
                        $ape=$row['Apellido']; 
                        $usr=$row['Usuario']; 
                        $con=$row['Password'];
                        $email=$row['Email'];

                                    if($selected==$id){ 
                                        $insertar = "INSERT INTO `usuario` (TipoUsuario,Usuario,Password,Nombre,Apellido,Email) VALUES ('1','$usr','$con','$nom','$ape','$email')";
                                        $borrar="DELETE FROM `solicitud_profesor` WHERE (`idSoliProf` = '$id')";
                                        mysqli_query($mysqli,$insertar);
                                        mysqli_query($mysqli,$borrar);
                                        ?>
                                        <script>
                                        window.location = 'aprobarProfesores.php';
                                        </script>
                                        <?php
                                    }
                                }
                            }
                        }
                    }else{
                            echo "No hay profesores seleccionados.";
                        }
                    }   
                    ?>
                    </div>
                    <sctipt></script>
                    <?php
                        echo "
                        <div class='submitBtn'>                
                            <input type='submit' name='enviar' value='Enviar'></input>
                        </div>
                        </form>";
                    ?>
            </div>
        </div>
    </div>
</div>

<div id="footer"></div>
  </body>
</html>