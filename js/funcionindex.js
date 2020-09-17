$( document ).ready(function() {
    $.ajax({
        url:"ProyectosIndex.php", 
        type: "post", 
        success:function(content){
          
          $('.index-frame2').html(content);

          
      }
    })
    });
