<?php
   
           include 'verificosesion.php';
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, shrink-to-fit=no"/>
    <title>Editar Proyecto | Expoeduca</title>
  
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>
    <script src="../js/function.js"></script>
    <script src="../js/functionPlanillaEditable.js"></script>
   
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="styles2.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/lnayizsauri3gzzl1bqg6knbre479369o4olx2xg5q683s6d/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   

    <script src="../js/functionPlanillaEditable.js"></script>
    <script>
        tinymce.init({
     
      
     selector: '#descripcionLarga_Proyecto',
     entity_encoding : "raw",
     height: 500,
     plugins: [
       'advlist autolink lists link charmap print preview anchor',
       'searchreplace visualblocks code fullscreen',
       'insertdatetime media table paste imagetools wordcount'
     ],
     toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   
     
     });
    </script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="styles2.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
    
  </head>

  <?php
  include '../Form/conexion.php'; 
  //$mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');


  //Output any connection error
  if ($mysqli->connect_error) {
      echo "error al conectar con base de datos";
      return;
  }  
   $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";   
   $result = $mysqli -> query($sql);   
   $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);   
   if(isset($ss['TipoUsuario'])){      
     if($ss['TipoUsuario']==2){       
       $aprobar = "display: none;";     
      }else {$aprobar = "";}
    }
    //cuando es alumno no muestra el boton de aprobar proyecto
   $idproyecto = $_GET['id'];
   
   $sql = "SELECT * FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
   $resultaa = $mysqli->query($sql);
   $aa =mysqli_fetch_array($resultaa, MYSQLI_ASSOC);

   $sql = "SELECT * FROM videos WHERE idProyecto ='".$idproyecto."'";
   $result = $mysqli->query($sql);
   

   $banner='';
   if(isset($aa['Banner'])){
     $banner = $aa['Banner'];
   }
   
   $titulo = $aa['Titulo'];
   $introduccion = $aa['Introduccion'];
   $descripcion = $aa['Descripcion'];
  ?>

   
<body onload="hfindex()">
    
  <div id="header"></div>
    <div class="Linea1Planilla">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Planilla">
            <div class="PlanillaFrame">

            <div class="BannerPlanillaEditable">
                <h2>Banner:</h2>
                <hr />
                <div class="BannerEditable">
                <?php
                echo "<div class='Banner'><img src='".$banner."' id='banner' style='max-height:100%; max-width:100%;'></div>";
                ?>
                </div>

                <br>
                <h2>Nuevo Proyecto:</h2>
                <hr />
              
                <div class="form-group">
                  <h4>Título del proyecto</h4>
                <input
                    type="text"
                    class="form-control"
                    id="user"
                    data-idp="<?php echo $idproyecto ?>"
                    placeholder= "Nombre de Proyecto"
                    name="nombre_proyecto"
                    value="<?php echo $titulo ?>">
                  </div>
                
                <hr />

              
                <div class="form-group" >
                  <h4>Descripción corta</h4>
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Introduccion"
                    
                    id="descripcionCorta_Proyecto"><?php echo $introduccion; ?>
                  </textarea>
                </div>
                
                    <div id = 'misurls' class='form-group'><h4>Pega la url del video de youtube</h4> 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda3">
                    Ayuda videos
                    </button><br><br>
                    <p>En youtube, busca el botón compartir, y copia el enlace o url del video. Lo pegas aquí debajo</p>
                    <p>Puedes agregar más url apretando el botón +, que aparece abajo.</p>
                 <?php
                 $videos = "";
                 $cont = 1;
                 if($result->num_rows>0){
                  while($row = $result->fetch_array()){
                    $videos.= "
                   <input type='text' class='form-control' data-cont='".$cont."' id='".'video'.$cont."' placeholder='URL del Video [YouTube]' name='nombre_proyecto' value=". $row['url'].">";
                   
                    $cont++;
                      
                  }
                   
                  }else{
                   $videos.= "
                   <input type='text' class='form-control' data-cont='1' id='video1' placeholder='URL del Video [YouTube]' name='nombre_proyecto'>";
                  }
                  
                  echo $videos;
                  ?>
                  </div>
                   <button onclick="NuevoVideo()" style="margin-top: 5%; color: white">
                    <i class="fa"></i>+</button>
                    <br><br>
                <h3>Descripción larga:</h3>
                <br> Utiliza negritas, títulos centrados y otras técnicas de edición para que tu trabajo se luzca más.<br>
                <div>
                  <textarea
                    class="form-control"
                    placeholder="Descripcion"
                    id="descripcionLarga_Proyecto"><?php echo $descripcion; ?>
                  </textarea>
                </div>
          
                <div class="ImagenesPlanilla">
                <h2>Subimos Fotos:</h2>
                <hr />
                <h3>Foto Principal (solo 1):</h3>
                <hr />
                <br><br>El formato de la foto debe ser 16:9 
                <br>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda1">
                Ayuda imagen
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda2">
                Ayuda diseño
                </button>
                <div class="Foto">
                <div id="drop_file_zone" ondrop="upload_file(event,1)" ondragover="return false">
                      <div id="drag_upload_file">
                          <p>Arrastra y suelta el archivo aquí</p>
                          <!-- <p>o</p> -->
                        <!--   <p><input type="button" id="selectfile1" value="Select File" onclick="file_explorer();"></p> -->
                          
                      </div>
                  </div>
                  <div class="Foto" id="fprincipal">
                    
                  </div>
                </div>
                <hr />
                <h3>Fotos secundarias:</h3>
                <hr />
                <br><br>La medida en pixeles base es 700 ancho x 400 alto (proporcionales a estas medidas)
                <br>
                <div class="Foto">
               
                  <div id="drop_file_zone" ondrop="upload_file(event,3)" ondragover="return false">
                      <div id="drag_upload_file">
                          <p>Arrastra y suelta los archivos aquí</p>
                          <!-- <p>o</p> -->
                          <!--  <p><input type="button" id="selectfile3" value="Select File" onclick="file_explorer();"></p> -->
                          
                      </div>
                  </div>
                  <div id="fsecundarias">
                      
                     
                  </div>
                 
                </div>
                <hr />
                <h3>Banner:</h3>
                <hr />
                <br><br>La medida en pixeles base es 1200 px de ancho x 200 px de alto (o proporcionales a estas medidas)
                <br>
                <div class="Foto">
                <div id="drop_file_zone" ondrop="upload_file(event,2)" ondragover="return false">
                      <div id="drag_upload_file">
                          <p>Arrastra y suelta el Banner aquí</p>
                         <!--  <p>o</p>-->
                          <!-- <p><input type="button" id="selectfile2"  value="Select File" onclick="file_explorer();"></p> -->
                         
                      </div>
                  </div>
                  <div class="Foto" id="fbanner">
                    
                  </div>
                </div>
                <a class='BotonLogin2'>
                   <button type="button" style= "margin-left: 5px;" class="btn btn-primary" data-toggle="modal" data-target="#ayuda4">
                    Vista previa
                    </button>
                    </a> <br>
                <?php
                $sql = "SELECT Estado FROM expoeduc_expoeduca.datosProyecto where idProyecto='".$idproyecto."';";
                $result = $mysqli -> query($sql);
                $aprobado = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($aprobado["Estado"]==0){
                echo "<a class='BotonLogin2'  style='".$aprobar."'
                  ><button style='margin-top: 5%;' onclick='aprobar(".$idproyecto.")'>
                    <i class='fa'>&#xf14a;</i> Aprobar Proyecto
                  </button></a
                >";
                }else{
                  echo "<a class='BotonLogin2'  style='".$aprobar."'
                  ><button style='margin-top: 5%;' onclick='desaprobar(".$idproyecto.")'>
                    <i class='fa'>&#xf14a;</i> Desaprobar Proyecto
                  </button></a
                >";
                }

                $sql = "SELECT EstadoAdelanto FROM expoeduc_expoeduca.datosProyecto where idProyecto='".$idproyecto."';";
                $result = $mysqli -> query($sql);
                $aprobado = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($aprobado["EstadoAdelanto"]==0){
                echo "<a class='BotonLogin2'  style='".$aprobar."'
                  ><button style='margin-top: 5%;margin-left: 1%;' onclick='aprobarAdelanto(".$idproyecto.")'>
                    <i class='fa'>&#xf14a;</i> Aprobar adelanto
                  </button></a
                >";
                }else{
                  echo "<a class='BotonLogin2'  style='".$aprobar."'
                  ><button style='margin-top: 5%;margin-left: 1%;' onclick='desaprobarAdelanto(".$idproyecto.")'>
                    <i class='fa'>&#xf14a;</i> Desaprobar adelanto
                  </button></a
                >";
                }
                ?>

                <button onclick="ActualizoPlanilla()" style="margin-top: 5%; color: white">
                    <i class="fa">&#xf0c7;</i> Guardar Cambios
                  </button>
                  <div id="myModal" class="modal">
                  <div class="modal-content">
                  <span class="close" style="color: red;">&times;</span>
                    <br>
                    <p style="padding: 20px">¡Los cambios se han guardado correctamente!</p>
                    <br>
                  </div>
                  </div>
                  <script>
                    var modal = document.getElementById("myModal");
                    var span = document.getElementsByClassName("close")[0];
                    window.onclick = function(event) {
                    if (event.target == modal) {
                    modal.style.display = "none";
                    location.reload();
                   }
                  }
                  span.onclick = function() {
                    modal.style.display = "none";
                    location.reload();
                  }
                  </script>

                  
              </div>
                

              </div>
            
                </div>
              </div>
            </div>    
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
              <div class="VideoMobile">
                <iframe
                  width="560"
                  height="315"
                  src="https://www.youtube.com/embed/XYZ123"
                  frameborder="0"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p id="msg"></p>
    
    <!-- Modales  -->
<div id="ayuda1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div><h4 class="modal-title">Ayuda para subir imagen.</h4>
        <div class="modal-body">
            La imagen puede ser del tamaño que prefieras pero siempre respetando una proporción de 700 px de ancho por 400 alto. Por ejemplo, puedes tener una imagen de 1400 por 800, 
            sería correcto, porque está en proporción.
            <br>
            Cómo modificar tu imagen a la proporción?<br>
            Para ello debes valerte de un programa de edición gráfica, uno sencillo de manejar es el paint de windows.<br>
            Abres tu imagen con Paint, allí puedes usar la herramienta "Seleccionar" para seleccionar un area que tenga un tamaño de 700x400 o proporcional (a medida que
            vas seleccionando un área, en la parte inferior te indica el tamaño en pixeles). Una vez que tienes el área seleccionado, copias con ctrl-c, y abres un nuevo 
            documento indicando 700x400, y pegas lo que copiaste.<br>
            También hay una opción de cambiar tamaño, y destildas la opción de mantener proporción. Escribes 700 en el ancho y 400 en el alto. El problema es que si hay mucha diferencia,
            tu imagen quedará deforme (porque le cambiaste su proporción entre ancho y alto). Esto lo puedes usar solo cuando el cambio no es muy grande.
         
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

    <!-- Modal content-->
    
 <div id="ayuda2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div><h4 class="modal-title">Manual de diseño gráfico.</h4>
        <div class="modal-body">
            <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="../Info/disenio.pdf"></object>
         
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal content-->
    
 <div id="ayuda3" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div><h4 class="modal-title">Instrucciones para crear videos.</h4>
        <div class="modal-body">
            <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="../Info/ayuda_videos.pdf"></object>
         
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
    
       <!-- Modal content-->
    
 <div id="ayuda4" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
        <div class="modal-body">
        <?php
    include '../Form/conexion.php';
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '$idproyecto'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $cont = 1;
    
    $content= "";
    // DEL PROFESOR. 
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '$idproyecto'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset($ss['Titulo'],$ss['Introduccion'],$ss['Descripcion'])){
      $content.="
              <div class='BannerPlanilla'>
                <h2 id='titulo' style='word-wrap: break-word; font-weight: bolder;'>".$ss['Titulo']."</h2>
                <hr />
                  <div class='Banner'><img src='".$ss['Banner']."' id='banner' style='max-height:100%; max-width:100%;'></div>
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
    $sqlimg = "SELECT * FROM expoeduc_expoeduca.imagenes WHERE idProyecto = '$idproyecto'";
    $resultimg = $mysqli -> query($sqlimg);
    while($ssimg = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){

      $content.= "
      <div class='mySlides'>
          <img src='".$ssimg['url']."' id ='foto".$cont."' onclick='agrando(".$cont.")'  class='imagenPlanilla' style='width:100%'>
          
          <div class='numbertext'>".$cont."/".mysqli_num_rows($resultimg)."</div>
      </div>";

      $cont = $cont + 1;    
    }  
          
    $content.="<a class='prev' onclick='plusSlides(-1)' style='position: absolute;'>❮</a>
    <a class='next' onclick='plusSlides(1)' style='position: absolute;'>❯</a>
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

    $sql = "SELECT url FROM expoeduc_expoeduca.videos WHERE idProyecto = '$idproyecto'";
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
  ?>
         
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

    
    <div id="footer"></div>
  </body>
</html>