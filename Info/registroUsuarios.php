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
            <input type='text' id='elInput' onkeyup='myFunction()'/>
                <div class="aprobTable">
                    <table id="profTabl">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rango</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                        <th>Usuario</th>
                        </tr>
                    </thead> 
                    <?php
                        include "../Form/conexion.php";

                        $sql = "SELECT * FROM usuario";
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
                        </tr>
                        </tbody>"; 
                    } 
                }           
                ?>
                </table>
                <table>
                <tr>
                        <th>ID</th>
                        <th>Alumno Responsable</th>
                        <th>Titulo</th>
                    </tr> 
                    <?php
                        $alumno = "SELECT * FROM datosProyecto";
                        $resultado = mysqli_query($mysqli,$alumno);


                        if($resultado){
                            while($row = $resultado->fetch_array()){

                            $idp=$row['idProyecto'];
                            $idusuario=$row['Alumno_Responsable'];
                            $titulo=$row['Titulo'];
            
                        echo "<tr>
                            <td>$idp</td>
                            <td>$idusuario</td>
                            <td>$titulo</td>    
                        </tr>"; 
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