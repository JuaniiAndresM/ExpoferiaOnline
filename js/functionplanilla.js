$( document ).ready(function() {
    $.ajax({
        url:"CargoPlanilla.php", 
        type: "post", 
        success:function(content){
          
          $('.Planilla').html(content);
          
         
       
        
      }
    });
});
var slideIndex = 0;
var slideIndexVid = 0;

function agrando(foto){
  var modal = document.getElementById('myModal');
  var img = document.getElementById('foto'+foto);
  var modalImg = document.getElementById('foto');
  img.onclick = function(){
    modal.style.display = 'block';
    modalImg.src = this.src;
  }
  var span = document.getElementsByClassName('close')[0];
}

function cerrarModal() { 
  document.getElementById('myModal').style.display = 'none';
}

function getVideo(url,id){
  var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  var match = url.match(regExp);
  if (match && match[2].length == 11) {
      document.getElementById('video'+id).src = 'https://www.youtube.com/embed/'+match[2];
  } else {
      document.getElementById('divideo').style.visibility = 'hidden';
  }
  
}
//Slides para las Imagenes
function slides(){
  carousel();
  showSlides(slideIndex);
}


function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
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

//Slides para los videos

function slidesVid(){
  showSlidesVid(slideIndexVid);
}


function plusSlidesVid(n) {
  showSlidesVid(slideIndexVid += n);
}

function currentSlideVid(n) {
  showSlidesVid(slideIndexVid = n);
}

function showSlidesVid(n) {
  var i;
  var slides = document.getElementsByClassName("VideoSlides");
  if (n > slides.length) {slideIndexVid = 1}
  if (n < 1) {slideIndexVid = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndexVid-1].style.display = "block";
  
}



