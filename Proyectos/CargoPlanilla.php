<?php
    include '..\Form\conexion.php';
    $sql = "SELECT * FROM datosProyecto WHERE idProyecto = '1'";
    $result = $mysqli -> query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $cont = 1;
    $content= "";
      $content.="
              <div class='BannerPlanilla'>
                <h2 id='titulo' style='word-wrap: break-word; font-weight: bolder;'>".$ss['Titulo']."</h2>
                <hr />
                  <div class='Banner'><img src='../img/".$ss['Banner']."' id='banner' style='max-height:100%; max-width:100%;'></div>
                <hr />
                <h4 >Introducción:</h4>
                <p id='intro' style='word-wrap: break-word;'>".$ss['Introduccion']."</p>
                <hr />
                <br></br>
              </div>
              <div class='CentralPlanilla'>
                <div class='Descripcion'>
                  <h4>Descripcion:</h4>
                  <p id='desc' style='word-wrap: break-word;'>".$ss['Descripcion']."</p>
                </div>
              ";
            $content.="
            <div class = 'imagenesSlide'>
            <h2>Imagenes:</h2>";
    $sqlimg = "SELECT * FROM imagenes WHERE idProyecto = '".$ss['idProyecto']."'";
    $resultimg = $mysqli -> query($sqlimg);
    while($ssimg = mysqli_fetch_array($resultimg, MYSQLI_ASSOC)){

        $content.= "
        <div class='mySlides'>
            <img src='../img/".$ssimg['url']."' id ='foto".$cont."'  class='imagenPlanilla' style='width:100%'>
            <div class='numbertext'>".$cont."/".count($ssimg)."</div>
        </div>";
        $cont = $cont + 1;
  
    }
        $content.= "<a class='prev' onclick='plusSlides(-1)' style='position: absolute;'>❮</a>
        <a class='next' onclick='plusSlides(1)' style='position: absolute;'>❯</a>
        </div>
        </div>";
        
    if(isset($ss['Banner'])){
      $content.= "<script>
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

    $sql = "SELECT * FROM videos WHERE idProyecto = '".$ss['idProyecto']."'";
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
    $content.= "
    <script>
    var slideIndex = 0;
    carousel();
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName('mySlides');
    var dots = document.getElementsByClassName('demo');
    var captionText = document.getElementById('caption');
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
    }
    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(' active', '');
    }
    slides[slideIndex-1].style.display = 'block';

    }

    function carousel() {
      var i;
      var x = document.getElementsByClassName('mySlides');
      for (i = 0; i < x.length; i++) {
      x[i].style.display = 'none';
      }
      slideIndex++;
      if (slideIndex > x.length) {slideIndex = 1}
      x[slideIndex-1].style.display = 'block';
      setTimeout(carousel, 8000); // Cambia la imagen cada 8 segundos
    }</script>";
    echo $content;
  ?>