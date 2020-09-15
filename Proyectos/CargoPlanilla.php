<?php
    include '..\Form\conexion.php';
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '1'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $column = array();
    $cont = 1;
    $content= "<h2>Imagenes:</h2>
    <hr /><a class='prev' onclick='plusSlides(-1)' style='position: absolute;'>❮</a>
  <a class='next' onclick='plusSlides(1)' style='position: absolute;'>❯</a>";

    $sqlimg = "SELECT * FROM imagenes WHERE idProyecto = '".$ss['idProyecto']."'";
    $resultimg = $mysqli -> query($sqlimg);
    while($ssimg = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){

        $content.= "
        <div class='mySlides'>
            <img src='../img/".$ssimg['url']." id ='foto".$cont."'  class='imagenPlanilla' style='width:100%'>
            <div class='numbertext'>".$cont."/".$arr_length."</div>
        </div>";
        $cont = $cont + 1;
  
    }
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '1'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);


    if(isset($ss['Titulo'],$ss['Introduccion'],$ss['Descripcion'])){
      $content.="
                <h2 id='titulo' style='word-wrap: break-word; font-weight: bolder;'>".$ss['Titulo']."</h2>
                <hr />
                  <div class='Banner'><img src=".$ss['Banner']."id='banner' style='max-height:100%; max-width:100%;'></div>
                <hr />
              </div>
              <div class='CentralPlanilla'>
                <h4 >Introducción:</h4>
                <p id='intro' style='word-wrap: break-word;'>".$ss['Introduccion']."</p>
                <br></br>
                <h4>Descripcion:</h4>
                <p id='desc' style='word-wrap: break-word;'>".$ss['Descripcion']."</p>
              </div>
              
            </div>";
            $content.=" <div class='Video' id='divideo'>
                <h2>Video:</h2>
                <hr />
         
                </div>";

    }

    if(isset($ss['Banner'])){
      echo "<script>
      document.getElementById('banner').src = '../img/".$ss['Banner']."';
      <!-- Modal Agrandar Fotos -->

          var modal = document.getElementById('myModal');

          var img = document.getElementById('banner');

          var modalImg = document.getElementById('foto');
          img.onclick = function(){
            modal.style.display = 'block';
            modalImg.src = this.src;
          }
          var span = document.getElementsByClassName('close')[0];
    
          span.onclick = function() { 
            modal.style.display = 'none';
          }

      </script>";
    }

    $sql = "SELECT * FROM videos WHERE idProyecto = '1'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(isset($ss['url'])){
      // Codigo para sacar la id del video de youtube, tuve que estudiar regex.
      // por que? no se, motivo? ni idea
      echo "<script>
      var url = '".$ss['url']."';
            var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                document.getElementById('video').src = 'https://www.youtube.com/embed/'+match[2]+'?&autoplay=1&loop=1';
            } else {
                document.getElementById('divideo').style.visibility = 'hidden';
            }
      </script>";
    }else{
      echo "<script>
      document.getElementById('divideo').style.visibility = 'hidden';
      </script>";
    }
    
    //Estuve como 3 horas para hacer esto, carga las imagenes, pero no se como.
    //NO BORRAR
    $column = array();
    $cont = 1;
    $sqlimg = "SELECT * FROM imagenes WHERE idProyecto = '".$ss['idProyecto']."'";
    $resultimg = $mysqli -> query($sqlimg);
    while($ssimg = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){
      $column[] = $ssimg['url'];
    }
    $arr_length = count($column);
    if(isset($column)){
        for ($i = 0; $i < $arr_length ; $i++) {
          echo "<script>
          document.getElementById('foto".$cont."').src = '../img/".$column[$i]."';

          <!-- Modal Agrandar Fotos -->

          var modal = document.getElementById('myModal');

          var img = document.getElementById('foto".$cont."');

          var modalImg = document.getElementById('foto');
          img.onclick = function(){
            modal.style.display = 'block';
            modalImg.src = this.src;
          }
          var span = document.getElementsByClassName('close')[0];
    
          span.onclick = function() { 
            modal.style.display = 'none';
          }

          </script>";
          
          $cont = $cont + 1;
        }
    }
    
  ?>