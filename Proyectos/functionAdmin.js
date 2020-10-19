$( document ).ready(function() {
    $.ajax({
        url:"CargarSolicitudes.php", 
        type: "post", 
        success:function(content){
          
          $('.SolicitudFrame').html(content);

           
      }
    })
    });
