<?php

include '../Form/conexion.php';

$content="";
$cont = 1;
$sql = "SELECT * FROM solicitud_usuario";
$result = $mysqli -> query($sql);

if(mysqli_num_rows($result) !== 0){
  $content.="
  <div>
    <a style='text-align: center; font-size: 200%;'>Alumnos:</a>
  </div>";
  while($sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $sql = "SELECT * FROM orientaciones where idOrientacion = ".$sqlsolicitudes['Orientacion']."";
    $result1 = $mysqli -> query($sql);
    $sqlorientacion = mysqli_fetch_array($result1, MYSQLI_ASSOC);

    if($sqlsolicitudes['Year'] == 1){
      $Year = "Primero";
    }elseif($sqlsolicitudes['Year'] == 2){
      $Year = "Segundo";
    }elseif($sqlsolicitudes['Year'] == 3){
      $Year = "Tercero";
    }elseif($sqlsolicitudes['Year'] == 4){
      $Year = "Cuarto";
    }elseif($sqlsolicitudes['Year'] == 5){
      $Year = "Quinto";
    }elseif($sqlsolicitudes['Year'] == 6){
      $Year = "Sexto";
    }else{
      $Year = "Institucional";
    }
  $content.="            
  <div class='listAdmin' id='Solicitud".$cont."' >
  <div>
      <img class='AdminIMG' src='../img/AdminIMG.png'></img>
  </div>
  <div>
    <hr id='LineaMobileProyecto' />
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Nombre:</b> ".$sqlsolicitudes['Nombre']." </a><br>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Apellido:</b> ".$sqlsolicitudes['Apellido']." </a><br>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf0e0;</i> Email:</b> ".$sqlsolicitudes['Email']." </a><br>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf19d;</i> Año:</b> ".$Year." </a><br>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf02d;</i> Orientacion:</b> ".$sqlorientacion['Nombre']." </a><br>
    <hr>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i>  Usuario:</b>  ".$sqlsolicitudes['Usuario']." </a><br>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf023;</i> Contraseña:</b> ".$sqlsolicitudes['Password']." </a><br>
    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf14b;</i> Titulo de Proyecto :</b> ".$sqlsolicitudes['Titulo_Proyecto']." </a>
  </div>
</div>
<div class='BotonesAdmin'>
      <button onclick='aprobado(".$sqlsolicitudes['idSoli_Usuario'].")'><i class='fa'>&#xf14a;</i>  Aprobar</button>
      <button data-toggle='collapse' data-target='#rechazar'><i class='fa'>&#xf00d;</i>  Rechazar</button>                     
    </div>
    <div id='rechazar' class='collapse form-group'>
      <label for='comment'><i class='fa'>&#xf27a;</i> Comentario:</label>
      <textarea
        input type='text' name='comentario'
        class='form-control'
        rows='5'
        placeholder='Ingrese Comentario'
        id='comment'
      ></textarea>
      
      <button class='Enviar' onclick='noaprobado(".$sqlsolicitudes['idSoli_Usuario'].")'><i class='fa'>&#xf1d8;</i> Enviar</button>
    </div>
  </div>
  <hr>
  ";
      $cont ++;
  }
}else { 
  $content.= " 
  <div style='margin-top: 5%; margin-bottom: 5%;'>
  <br><br>
  <a style='word-wrap: break-word;'>No hay ninguna solicitud de alumnos.</a>
  <br><br>
  </div>
  <hr>";
  
  }

  $sql = "SELECT * FROM solicitud_profesor";
  $result = $mysqli -> query($sql);
  
  
if(mysqli_num_rows($result) !== 0){
  $content.="
  <div>
    <a style='text-align: center; font-size: 200%;'>Profesores:</a>
  </div>";
  while($sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC)){

  $content.=" 
                
                  <div class='listAdmin' id='Solicitud".$cont."' >
                  <div>
                      <img class='AdminIMG' src='../img/AdminIMG.png'></img>
                  </div>
                  <div>
                    <hr id='LineaMobileProyecto' />
                    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf19d;</i> PROFESOR </b></a><br>
                    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Nombre:</b> ".$sqlsolicitudes['Nombre']." </a><br>
                    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Apellido:</b> ".$sqlsolicitudes['Apellido']." </a><br>
                    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf0e0;</i> Email:</b> ".$sqlsolicitudes['Email']." </a><br>
                    <hr>
                    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i>  Usuario:</b>  ".$sqlsolicitudes['Usuario']." </a><br>
                    <a style='word-wrap: break-word;'><b><i class='fa'>&#xf023;</i> Contraseña:</b> ".$sqlsolicitudes['Password']." </a><br>
                  </div>
                </div>
                <div class='BotonesAdmin'>
                      <button onclick='aprobadoPROF(".$sqlsolicitudes['idSoliProf'].")'><i class='fa'>&#xf14a;</i>  Aprobar</button>
                      <button data-toggle='collapse' data-target='#rechazar'><i class='fa'>&#xf00d;</i>  Rechazar</button> 
                    </div>
                    <div id='rechazar' class='collapse form-group'>
                      <label for='comment'><i class='fa'>&#xf27a;</i> Comentario:</label>
                      <textarea
                        input type='text' name='comentario'
                        class='form-control'
                        rows='5'
                        placeholder='Ingrese Comentario'
                        id='commentPROF'
                      ></textarea>
                      <button class='Enviar' onclick='noaprobadoPROF(".$sqlsolicitudes['idSoliProf'].")' ><i class='fa'>&#xf1d8;</i> Enviar</button>
                    </div>
              </div>
              <hr>
              ";
      $cont ++;
  }
}else { 
  $content.= " 
  <div style='margin-top: 5%; margin-bottom: 5%;'>
  <br><br>
  <a style='word-wrap: break-word;'>No hay ninguna solicitud de profesores.</a>
  <br><br>
  </div>
  <hr>
  ";
  
  }
  
  $content.="
  <div>
    <a id='TituloTablaProyectos'>Consultas:</a>
  </div>
  <hr>";
$sql = "SELECT * FROM solicitud_mensajes";
$result = $mysqli -> query($sql);

if(mysqli_num_rows($result) !== 0){
  
  while($sqlsolicitudes = mysqli_fetch_array($result, MYSQLI_ASSOC)){

  $content.=" 
    
      <div class='listAdmin' id='Solicitud".$cont."' >
      <div>
          <img class='AdminIMG' src='../img/AdminIMG.png'></img>
      </div>
      <div>
        <hr id='LineaMobileProyecto' />
        <a style='word-wrap: break-word;'><b><i class='fa'>&#xf0e0;</i> Usuario:</b> ".$sqlsolicitudes['Usuario']." </a><br>
        <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Nombre:</b> ".$sqlsolicitudes['Nombre']." </a><br>
        <a style='word-wrap: break-word;'><b><i class='fa'>&#xf0e0;</i> Apellido:</b> ".$sqlsolicitudes['Apellido']." </a><br>
        <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Nombre Proyecto:</b> ".$sqlsolicitudes['NombreProy']." </a><br>
        <a style='word-wrap: break-word;'><b><i class='fa'>&#xf0e0;</i> Email:</b> ".$sqlsolicitudes['Email']." </a><br>
        <a style='word-wrap: break-word;'><b><i class='fa'>&#xf007;</i> Mensaje:</b> ".$sqlsolicitudes['Mensaje']." </a><br>
      </div>
    </div>
    <div class='BotonesAdmin'>                     
        </div>
        <button data-toggle='collapse' data-target='#rechazar'>Responder</button> 
        <div id='rechazar' class='collapse form-group'>
          <label for='com'><i class='fa'>&#xf27a;</i> Comentario:</label>
          <textarea
            input type='text'
            name='comentario'
            class='form-control'
            rows='5'
            placeholder='Ingrese Comentario'
            id='comentarioConsulta'
          ></textarea>
          <button class='Enviar' onclick='responderConsulta(".$sqlsolicitudes['idMensajes'].")'><i class='fa'>&#xf1d8;</i> Enviar</button>
        </div> 
    </div>
    <hr>
    ";
      $cont ++;
  }
}else { 
  $content.= " 
  <div style='margin-top: 5%; margin-bottom: 5%;'>
  <br><br>
  <a style='word-wrap: break-word;'>No hay ninguna consulta.</a>
  <br><br>
  </div>
  <hr>
  ";
  
  }
  

echo $content;

?>