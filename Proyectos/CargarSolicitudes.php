<?php

include '..\Form\conexion.php';

$content="";
$cont = 1;
$sql = "SELECT * FROM solicitud_usuario";
$result = $mysqli -> query($sql);


if($resutl= $mysqli -> query($sql)){

  while($sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    //esto todavia no funciona (solo muestra)
  $content.=" 

          <form method='post' action='prueba.php'>
                  <div class='listAdmin' id='Solicitud".$cont."' >
                  <div>
                      <img class='AdminIMG' src='/ExpoferiaOnline/img/AdminIMG.png'></img>
                  </div>
                  <div>
                    <hr id='LineaMobileProyecto' />
                    <a ><b><i class='fa'>&#xf007;</i> Nombre:</b> ".$sqlsolicitudes['Nombre']." </a><br>
                    <a><b><i class='fa'>&#xf007;</i> Apellido:</b> ".$sqlsolicitudes['Apellido']." </a><br>
                    <a><b><i class='fa'>&#xf0e0;</i> Email:</b> ".$sqlsolicitudes['Email']." </a><br>
                    <a><b><i class='fa'>&#xf19d;</i> Año:</b> ".$sqlsolicitudes['Year']." </a><br>
                    <a><b><i class='fa'>&#xf02d;</i> Orientacion:</b> ".$sqlsolicitudes['Orientacion']." </a><br>
                    <hr>
                    <a><b><i class='fa'>&#xf007;</i>  Usuario:</b>  ".$sqlsolicitudes['Usuario']." </a><br>
                    <a><b><i class='fa'>&#xf023;</i> Contraseña:</b> ".$sqlsolicitudes['Password']." </a><br>
                    <a><b><i class='fa'>&#xf14b;</i> Titulo de Poryecto :</b> ".$sqlsolicitudes['Titulo_Proyecto']." </a>
                  </div>
                </div>
                <div class='BotonesAdmin'>
                  <button input type='submit' name='aprobar' value ='".$sqlsolicitudes['idSoli_Usuario']."' ><i class='fa'>&#xf14a;</i>  Aprobar</button>
                  <button data-toggle='collapse' data-target='#rechazar'><i class='fa'>&#xf00d;</i>  Rechazar</button>
                  <div id='rechazar' class='collapse form-group'>
                    <label for='comment'><i class='fa'>&#xf27a;</i> Comentario:</label>
                    <textarea
                      class='form-control'
                      rows='5'
                      placeholder='Ingrese Comentario'
                      id='comment'
                    ></textarea>
                    <button input type='submit' name='rechazado' class='Enviar'  ><i class='fa'>&#xf1d8;</i> Enviar</button>
                  </div>
                </div> 
              </div>
              <hr>
              </form> ";
      $cont ++;
  }
}else{
  $content.=" <a id='TituloTablaProyectos'><b>NO HAY NUEVAS SOLICITUDES</b></a> ";
}

echo $content;

?>