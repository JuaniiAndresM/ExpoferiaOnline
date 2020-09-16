$( document ).ready(function() {
    $.ajax({
        url:"CargoPlanilla.php", 
        type: "post", 
        success:function(content){
          $('.Planilla').html(content);
         
        function agrando(foto){
          alert(foto);
        }
        var modal = document.getElementById('myModal');

        var img = document.getElementById('foto".$cont."');

        var modalImg = document.getElementById('foto');
        img.onclick = function(){
          modal.style.display = 'block';
          modalImg.src = this.src;
        }
        var span = document.getElementsByClassName('close')[0];
  
        </script>";

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
});