$( document ).ready(function() {
    cargosolicitudes();
    });
 function cargosolicitudes(){
  $.ajax({
    url:"CargarSolicitudes.php", 
    type: "post", 
    success:function(content){
      
      $('.SolicitudFrame').html(content);

       
  }
})
 }   
    function aprobado(id){
      sessionStorage.setItem("aprobar", id);
      $.ajax({
          url:"Solicitud.php", 
          data: {aprobar: sessionStorage.getItem("aprobar")},
          type: "post", 
          success:function(data){
            alert(data);
              cargosolicitudes();
        } 
      })
      }
      
      function noaprobado(id){
          sessionStorage.setItem("rechazado", id);
          var comentario1 = document.getElementById("comment").value;
  
          sessionStorage.setItem("comentario", comentario1);
          $.ajax({
              url:"Solicitud.php", 
              data: {rechazado: sessionStorage.getItem("rechazado"),comentario: comentario1},
              type: "post", 
              success:function(data){
                alert(data);
                cargosolicitudes();
            }
          })
          }
  
          function aprobadoPROF(id){
              sessionStorage.setItem("aprobadoPROF", id);
              $.ajax({
                  url:"Solicitud.php", 
                  data: {aprobadoPROF: sessionStorage.getItem("aprobadoPROF")},
                  type: "post", 
                  success:function(data){
                    alert(data);
                    cargosolicitudes();
                }
              })
              }
              
              function noaprobadoPROF(id){
                  sessionStorage.setItem("noaprobadoPROF", id);
                  var comentarioPROF = document.getElementById("commentPROF").value;
                      sessionStorage.setItem("comentarioPROF", comentarioPROF);
                  $.ajax({
                      url:"Solicitud.php", 
                      data: {noaprobadoPROF: sessionStorage.getItem("noaprobadoPROF"), comentarioPROF: comentarioPROF},
                      type: "post", 
                      success:function(data){
                        alert(data);
                        cargosolicitudes();
                    }
                  })
                  }
          
                  