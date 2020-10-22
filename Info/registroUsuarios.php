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
<div class="Linea1Aprob">
    <div class="Linea2">
        <div class="Linea3">
            <div class="blancCntnt">
            <div class="filtroTabla">
              <h3>Registro de Usuarios:</h3>
              <label><i class="fa">&#xf002;</i> Buscar:</label>
              <input type='text' id='elInput' onkeyup='myFunction()'/>
            </div>
                <div class="aprobTable">
                    <table class="table-alumnos">
                    <thead>
                      <tr class="table-head">
                        <th>ID</th>
                        <th>Rango</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                        <th>Usuario</th>
                        <th>Título</th>
                      </tr>
                    </thead> 
                    <?php
                        include "../Form/conexion.php";

                        $sql = "SELECT * FROM expoeduc_expoeduca.usuario left join datosProyecto on  Alumno_Responsable=idUsuario;";
                        $resultado = mysqli_query($mysqli,$sql);

                        if($resultado){
                            while($row = $resultado->fetch_array()){

                            $tipoUsuario=$row['TipoUsuario'];
                            $id=$row['idUsuario'];
                            $nombre=$row['Nombre'];
                            $apellido=$row['Apellido'];
                            $mail=$row['Email'];
                            $telefono=$row['Telefono'];
                            $usuario=$row['Usuario'];
                             $titulo=$row['Titulo'];

                        if($tipoUsuario=='0'){
                          $tipoUsuario='Admin';
                        }elseif($tipoUsuario=='1'){
                          $tipoUsuario='Profesor';
                        }else{
                          $tipoUsuario='Alumno';
                        }
            
                        echo "
                        <tbody id='elTablon'>
                        <tr>
                          <td>$id</td>
                            <td>$tipoUsuario</td>
                            <td>$nombre</td>
                            <td>$apellido</td>
                            <td>$mail</td>
                            <td>$telefono</td>
                            <td>$usuario</td>   
                            <td>$titulo</td>    
                        </tr>
                        </tbody>"; 
                    } 
                }           
                ?>
                </table>
               
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer"></div>


             <script>
$(document).ready(function(){
  $("#elInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#elTablon tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  </body>
</html>