<?php
    if(isset($_POST['id'])){
    include '..\Form\conexion.php';
    session_start();
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '".$_POST['id']."'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $cont = 1;
    
    $content= "";
    // DEL PROFESOR. 
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '".$_POST['id']."'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset($ss['Titulo'],$ss['Introduccion'],$ss['Descripcion'])){
      $content.="
              <div class='BannerPlanilla'>
                <h2 id='titulo' style='word-wrap: break-word; font-weight: bolder;'>".$ss['Titulo']."</h2>
                <hr />
                  <div class='Banner'><img src='../img/".$ss['Banner']."' id='banner' style='max-height:100%; max-width:100%;'></div>
                <br></br>
              </div>
              <div class='CentralPlanilla'>
                <div class='Descripcion'>
                <h4 >Introducción:</h4>
                <p id='intro' style='word-wrap: break-word;'>".$ss['Introduccion']."</p>
                  
                </div>
                ";
        

              
            $content.="
            <div class = 'imagenesSlide'>
            <h2>Imagenes:</h2>";
    }
    $sqlimg = "SELECT * FROM expoeduc_expoeduca.imagenes WHERE idProyecto = '".$ss['idProyecto']."'";
    $resultimg = $mysqli -> query($sqlimg);
    while($ssimg = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){

      $content.= "
      <div class='mySlides'>
          <img src='../img/".$ssimg['url']."' id ='foto".$cont."' onclick='agrando(".$cont.")'  class='imagenPlanilla' style='width:100%'>
          
          <div class='numbertext'>".$cont."/".mysqli_num_rows($resultimg)."</div>
      </div>";

      $cont = $cont + 1;    
    }  
          
    $content.="<a class='prev' onclick='plusSlides(-1)' style='position: absolute;'>❮</a>
    <a class='next' onclick='plusSlides(1)' style='position: absolute;'>❯</a>
    </div> 
    <div id='myModal' class='modal' >
      <span class='close' onclick='cerrarModal()'>&times;</span>	              
      <img class='modal-content' id='foto'>	            
      <div id='caption'></div>	             
    </div>
    <script>
    slides()
    </script>
    </div>	";

    $content.="
    <div class='BannerPlanilla'>
    <hr />
    <h4>Descripcion:</h4>
      <p id='desc' style='word-wrap: break-word;'>".$ss['Descripcion']."</p>
    <hr />
    </div>";

    $sql = "SELECT url FROM expoeduc_expoeduca.videos WHERE idProyecto = '".$ss['idProyecto']."'";
    $resultvid = $mysqli -> query($sql);
    $rows = mysqli_num_rows($resultvid);
    $cont = 1;
    if($rows > 0){
      $content.= "<div class='VideoPlanilla'>
                  <h2>Video:</h2>
                  <hr />";
        while( $ssvid = mysqli_fetch_array($resultvid, MYSQLI_ASSOC)){
          $content.= " 
            <div class='VideoSlides' >
                  <iframe
                    id = 'video".$cont."'
                    width='560'
                    height='315'
                    src='https://www.youtube.com/embed/'
                    frameborder='0'
                    allowfullscreen></iframe>
                    <div class='numbertextVid'>".$cont."/".mysqli_num_rows($resultvid)."</div>
              </div>
            <script>
              getVideo('".$ssvid['url']."', ".$cont.")
            </script>";
            $cont = $cont + 1;
            $rows = $rows - 1;
        }
      $content.="
      <a class='prev' onclick='plusSlidesVid(-1)'>❮</a>
      <a class='next' onclick='plusSlidesVid(1)'>❯</a>
      <script>slidesVid()</script>
      </div>";
    }
    
    echo $content;
    }
  ?>