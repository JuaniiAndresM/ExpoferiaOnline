<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Planilla | Expoferia Online</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/ExpoferiaOnline/js/function.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/ExpoferiaOnline/css/styles.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>
  <body onload="hfindex()">

  
    <div id="header"></div>

    <div class="Linea1Planilla">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Planilla">
            <div class="PlanillaFrame">
            <div class="BannerPlanilla">
                <h2>Banner:</h2>
                <hr />
                <div class="Banner"><img id='banner' style='max-height:100%; max-width:100%;'></div>
              </div>
              <div class="CentralPlanilla">
                <h2 id="titulo" style="word-wrap: break-word;"></h2>
                <hr />
                <h4 >Introduccion:</h4>
                <a id="intro" style="word-wrap: break-word;"></a>
                <br></br>
                <h4>Descripcion:</h4>
                <a id="desc" style="word-wrap: break-word;"></a>
                <div class="Video" id="divideo">
                  <h2>Video:</h2>
                  <hr />
                  <div>
                    <iframe
                      id = "video"
                      width="560"
                      height="315"
                      src="https://www.youtube.com/embed/"
                      frameborder="0"
                      allowfullscreen
                    ></iframe>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="Foto" >
            <img id='foto1' style='max-height:30%; max-width:30%; '>
            <img id='foto2' style='max-height:30%; max-width:30%; '>
            <img id='foto3' style='max-height:30%; max-width:30%; '>
            </div>
                <script>
                  
                  function addElement () { 
                    // crea un nuevo div 
                    // y añade contenido 
                    var newDiv = document.createElement("BUTTON"); 
                    var newContent = document.createTextNode("+ imagenes"); 
                    newDiv.appendChild(newContent); //añade texto al div creado. 

                    // añade el elemento creado y su contenido al DOM 
                    var currentDiv = document.getElementById("foto3");
                    var currentDiv1 = document.getElementById("ImagenesPlanilla"); 
                    currentDiv1.insertBefore(newDiv, currentDiv.nextSibling); 
                  }

                </script>
            <div class="MobileView">
              <div class="ImagenesPlanillaMobile">
                <h2>Fotos:</h2>
                <hr />
                <div class="Fotos">
                  <div class="Foto">
                    asdasd
                  </div>
                  <div class="Foto">
                    asdasd
                  </div>
                  <div class="Foto">
                    asdasd
                  </div>
                </div>
              </div>
              <div class="VideoMobile" id="divideo">
                <iframe
                  id="video"
                  width="560"
                  height="315"
                  src="https://www.youtube.com/embed/"
                  frameborder="0"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include '..\Form\conexion.php';
    $sql = "SELECT * FROM datosproyecto WHERE idproyecto = '1'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset($ss['Titulo'],$ss['Introduccion'],$ss['Descripcion'])){
      echo "<script> 
      document.getElementById('titulo').innerHTML = '".$ss['Titulo']."';
      document.getElementById('intro').innerHTML = '".$ss['Introduccion']."';
      document.getElementById('desc').innerHTML = '".$ss['Descripcion']."';
      </script>";
    }
    if(isset($ss['LinkVideo'])){
      // Codigo para sacar la id del video de youtube, tuve que estudiar regex.
      // por que? no se, motivo? ni idea
      echo "<script>
      var url = '".$ss['LinkVideo']."';
      var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
      var match = url.match(regExp);
      if (match && match[2].length == 11) {
        document.getElementById('video').src = 'https://www.youtube.com/embed/'+match[2]+'?&autoplay=1';
      } else {
        document.getElementById('divideo').style.visibility = 'hidden';
      }
      </script>";
    }else{
      echo "<script>
      document.getElementById('divideo').style.visibility = 'hidden';
      </script>";
    }
    if(isset($ss['Banner'])){
      echo "<script>
      document.getElementById('banner').src = '../img/".$ss['Banner']."';
      </script>";
    }
    //Estuve como 3 horas para hacer esto, carga las imagenes, pero no se como.
    //NO BORRAR
    $column = array();
    $cont = 1;
    $sqlimg = "SELECT * FROM imagenes WHERE idproyecto = '".$ss['idProyecto']."'";
    $resultimg = $mysqli -> query($sqlimg);
    while($ssimg = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){
      $column[] = $ssimg['url'];
    }
    $arr_length = count($column);
    if(isset($column)){
      if($arr_length < 4){
        for ($i = 0; $i < $arr_length ; $i++) {
          echo "<script>
          document.getElementById('foto".$cont."').src = '../img/".$column[$i]."';
          </script>";
          $cont = $cont + 1;
        }
    }else{
      for ($i = 0; $i < 2 ; $i++) {
        echo "<script>
        document.getElementById('foto".$cont."').src = '../img/".$column[$i]."';
        </script>";
        $cont = $cont + 1;
      }
      echo "<script>
      addElement();
      document.getElementById('divputo').style.visibility = 'hidden';
    
       </script>";

      }
      
    }
    

   
  ?>
    <div id="footer"></div>
  </body>
</html>