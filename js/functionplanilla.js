$( document ).ready(function() {
    $.ajax({
        url:"CargoPlanilla.php", 
        type: "post", 
        success:function(content){
          
          $('.Planilla').html(content);
          
         
       
        
      }
    });
    // MODAL que carga imagenes
    //-- Modal Agrandar Fotos -->
    
});
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