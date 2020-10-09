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
  include 'verificosesion.php';
  //include '../Form/conexion.php'; 
  $mysqli = new mysqli('localhost','expoeduc_informatica2','LiceoIep_2020_2do_Inf','expoeduc_expoeduca');


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
      }     
    }
    //cuando es alumno no muestra el boton de aprobar proyecto

   $idproyecto = $_POST['id'];

    $sql = "SELECT * FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
    $resultaa = $mysqli->query($sql);
    $aa =mysqli_fetch_array($resultaa, MYSQLI_ASSOC);

    $sql = "SELECT * FROM videos WHERE idProyecto ='".$idproyecto."'";
    $result = $mysqli->query($sql);
    $vv = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $banner='';
    if(isset($aa['Banner'])){
      $banner = $aa['Banner'];
    }
    
    $titulo = $aa['Titulo'];
    $introduccion = $aa['Introduccion'];
    $descripcion = $aa['Descripcion'];
    $video = $vv['url'];
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
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Introduccion"
                    
                    id="descripcionCorta_Proyecto"><?php echo $introduccion; ?>
                  </textarea>
                </div>
                  <?php
                  while($row = $result->fetch_array()){
                   echo "<div class='form-group'>
                   <input type='text' class='form-control' id='link' placeholder='URL del Video [YouTube]' name='nombre_proyecto' value= '".$video."' /></div>";
                  }
                  ?>
 
                
                <div>
                  <textarea
                    class="form-control"
                    placeholder="Descripcion"
                    id="descripcionLarga_Proyecto"><?php echo $descripcion; ?>
                  </textarea>
                </div>
                
                <a class="BotonLogin2"  style="<?php echo $aprobar ?>"
                  ><button style="margin-top: 5%;" onclick="aprobar(4)">
                    <i class="fa">&#xf14a;</i> Aprobar Proyecto
                  </button></a
                >
                <button onclick="ActualizoPlanilla()" style="margin-top: 5%; color: white">
                    <i class="fa">&#xf0c7;</i> Guardar Cambios
                  </button>

                <div class="ImagenesPlanilla">
                <h2>Subimos Fotos:</h2>
                <hr />
                <h3>Foto Principal (solo 1):</h3>
                <hr />
                <div class="Foto">
                <div id="drop_file_zone" ondrop="upload_file(event,1)" ondragover="return false">
                      <div id="drag_upload_file">
                          <p>Arrastra y suelta el archivo aquí</p>
                          <p>o</p>
                          <p><input type="button" value="Select File" onclick="file_explorer();"></p>
                          <input type="file" id="selectfile">
                      </div>
                  </div>
                  <div class="Foto" id="fprincipal">
                    
                  </div>
                </div>
                <hr />
                <h3>Fotos secundarias:</h3>
                <hr />
                <div class="Foto">
               
                  <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                      <div id="drag_upload_file">
                          <p>Arrastra y suelta los archivos aquí</p>
                          <p>or</p>
                          <p><input type="button" value="Select File" onclick="file_explorer();"></p>
                          <input type="file" id="selectfile">
                      </div>
                  </div>
                  
                </div>
                <hr />
                <h3>Banner:</h3>
                <hr />
                <div class="Foto">
                <div id="drop_file_zone" ondrop="upload_file(event,2)" ondragover="return false">
                      <div id="drag_upload_file">
                          <p>Arrastra y suelta el Banner aquí</p>
                          <p>or</p>
                          <p><input type="button" value="Select File" onclick="file_explorer();"></p>
                          <input type="file" id="selectfile">
                      </div>
                  </div>
                  <div class="Foto" id="fbanner">
                    
                  </div>
                </div>
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
    <div id="footer"></div>
  </body>
</html>