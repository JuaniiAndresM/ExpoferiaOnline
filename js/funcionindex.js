$( document ).ready(function() {
    $.ajax({
        url:"ProyectosIndex.php", 
        type: "post", 
        success:function(content){
          var x=1;
          $('.index-frame2').html(content);

           
      }
    })
    });
