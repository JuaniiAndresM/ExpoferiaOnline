$( document ).ready(function() {
    $.ajax({
        url:"CargoPlanilla.php", 
        type: "post", 
        success:function(content){
          $('.Planilla').html(content);
          var url = $().data('');'".$ss['LinkVideo']."';
            var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                document.getElementById('video').src = 'https://www.youtube.com/embed/'+match[2]+'?&autoplay=1&loop=1';
            } else {
                document.getElementById('divideo').style.visibility = 'hidden';
            }
      }
    });
    // MODAL que carga imagenes
    //-- Modal Agrandar Fotos -->

    var modal = document.getElementById('myModal');

    var img = document.getElementById('foto".$cont."');

    var modalImg = document.getElementById('foto');
    img.onclick = function(){
    modal.style.display = 'block';
    modalImg.src = this.src;
    }
    var span = document.getElementsByClassName('close')[0];

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
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";

    }

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > x.length) {slideIndex = 1}
      x[slideIndex-1].style.display = "block";
      setTimeout(carousel, 8000); // Cambia la imagen cada 8 segundos
    }


});