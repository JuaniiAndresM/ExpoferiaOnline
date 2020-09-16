<?php
    session_start(); 
    include '..\Form\conexion.php';
    $sql1 = "SELECT idProyecto FROM datosProyecto where Alumno_Responsable= (SELECT idUsuario FROM usuario where usuario='". $_SESSION['Usuario']."')";
    $idp = $mysqli -> real_escape_string($sql1);

    $sql = "SELECT * FROM datosProyecto WHERE idProyecto ='".$idp."'";
    $result = $mysqli->query($sql);
    $aa = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $sql = "SELECT * FROM videos WHERE idProyecto ='".$idp."'";
    $result = $mysqli->query($sql);
    $vv = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $content='';
    $cont = 1;

    if(isset($aa['Titulo'],$aa['Introduccion'],$aa['Descripcion'],$aa['url'])){
      $content.="
              <div class='BannerPlanilla'>
              <div class ='CentrarPlanilla'>
              <h2>Nuevo Proyecto:</h2>
              <hr/>
                <div class='form-group'>
                    <input type='text' class='form-control' id='user' placeholder= 'Nombre de Proyecto' name='nombre_proyecto' value=".$aa['Titulo']." />
                </div>
                <hr />
                  <div class='Banner'><img src='../img/".$aa['Banner']."' id='banner' style='max-height:100%; max-width:100%;'></div>
                <hr />
                <div class='form-group'>
              <textarea class='form-control' rows='5' placeholder='Introduccion' id='descripcionCorta_Proyecto' value= ".$aa['Introduccion']."></textarea>
              </div>
                <hr />
                <br></br>

                <div class='custom-control custom-checkbox mb-3'>
                <input type='checkbox' class='custom-control-input' data-toggle='collapse' data-target='#demo' id='customCheck' name='example1'/>
                <label class='custom-control-label' form='customCheck' >Importar Video</label>
                 </div>
                 <div id='demo' class='collapse'>
                 <div class='form-group'>
                <input type='text' class='form-control' id='link' placeholder='URL del Video [YouTube]' name='nombre_proyecto' value=".$vv['url']."/>
                </div>
            
                <div class='form-group'>
                <textarea class='form-control' rows='5' placeholder='Descripcion' id='descripcionLarga_Proyecto' value=".$aa['Descripcion']."></textarea>
                </div>
                </div>
                </div>";
            
                $content.="
                <div class = 'imagenesSlide'>
                <h2>Imagenes:</h2>";
    }

    $sqlimg = "SELECT * FROM imagenes WHERE idProyecto = '".$aa['idProyecto']."'";
    $resultimg = $mysqli -> query($sqlimg);
    while($img = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){

      $content.= "
      <div class='mySlides'>
          <img src='../img/".$img['url']."' id ='foto".$cont."' onclick='agrando(".$cont.")'  class='imagenPlanilla' style='width:100%'>
          
      </div>";

      $cont = $cont + 1;    
    }  
          
    $content.="<a class='prev' onclick='plusSlides(-1)' style='position: absolute;'>❮</a>
    <a class='next' onclick='plusSlides(1)' style='position: absolute;'>❯</a>
    </div> 

    <div id='myModal' class='modal'>
      <span class='close'>&times;</span>	              
      <img class='modal-content' id='foto'>	            
      <div id='caption'></div>	             
    </div>	";

    $sql = "SELECT * FROM videos WHERE idProyecto = '".$aa['idProyecto']."'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(isset($ss['url'])){
      $content.= " 
      <div class='Video' id='divideo'>
        <h2>Video:</h2>
        <hr />
          <div>
            <iframe
              id = 'video'
              width='560'
              height='315'
              src='https://www.youtube.com/embed/'
              frameborder='0'
              allowfullscreen></iframe>
          </div>
        </div>";
      // Codigo para sacar la id del video de youtube, tuve que estudiar regex.
      // por que? no se, motivo? ni idea
      $content.= "<script>
      var url = '".$ss['url']."';
            var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                document.getElementById('video').src = 'https://www.youtube.com/embed/'+match[2];
            } else {
                document.getElementById('divideo').style.visibility = 'hidden';
            }
      </script>";
    }else{
      $content.= "<script>
      document.getElementById('divideo').style.visibility = 'hidden';
      </script>";
    }
    
    echo $content;
  ?>