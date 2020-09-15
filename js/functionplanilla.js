$( document ).ready(function() {
    $.ajax({
        url:"CargoPlanilla.php", 
        type: "post", 
        success:function(content){
          $('.PlanillaFrame').html(content);
      }
    });
    // MODAL que carga imagenes
    //-- Modal Agrandar Fotos -->
});