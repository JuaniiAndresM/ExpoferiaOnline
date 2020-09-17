$( document ).ready(function() {
    $.ajax({
        url:"ProyectosIndex.php", 
        type: "post", 
        success:function(content){
          
          $('.index-frame2').html(content);

          var id = 0;
          ocultar(id);
          
      }
    })
    });

    function ocultar(i) {
        do{
        document.getElementById('Seccion' + i).style.visibility = 'hidden';
        i--;
        }while(i > 0)
    }