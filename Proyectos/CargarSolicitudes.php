<?php

include '..\Form\conexion.php';

$content="";
$cont = 1;
$sql = "SELECT * FROM solicitud_usuario";
$result = $mysqli -> query($sql);
if($result){

  while($sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    //esto todavia no funciona (solo muestra)
  $content.=" 
                
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
                    <form method='post' action='prueba.php'>
                      <button input type='submit' name='aprobar' value ='".$sqlsolicitudes['idSoli_Usuario']."'><i class='fa'>&#xf14a;</i>  Aprobar</button>
                    </form> 
                    <div>
                      <button data-toggle='collapse' data-target='#rechazar'><i class='fa'>&#xf00d;</i>  Rechazar</button>
                    </div> 
                  </div>
                  <form method='post' action='prueba.php'>
                    <div id='rechazar' class='collapse form-group'>
                      <label for='comment'><i class='fa'>&#xf27a;</i> Comentario:</label>
                      <textarea
                        input type='text' name='comentario'
                        class='form-control'
                        rows='5'
                        placeholder='Ingrese Comentario'
                        id='comment'
                      ></textarea>
                      <button class='Enviar' input type='submit' name='rechazado' value ='".$sqlsolicitudes['idSoli_Usuario']."' class='Enviar'  ><i class='fa'>&#xf1d8;</i> Enviar</button>
                    </div>
                  </form>  
              </div>
              <hr>
              ";
      $cont ++;
  }

}else{
  $content.="<a><b>NO HAY NUEVAS SOLICITUDES</b></a>";
}

echo $content;

?>