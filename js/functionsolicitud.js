function aprobado(id){
    sessionStorage.setItem("aprobar", id);
    $.ajax({
        url:"Solicitud.php", 
        data: {aprobar: sessionStorage.getItem("aprobar")},
        type: "post", 
        success:function(content){
            $('.SolicitudFrame').html(content);
      }
    })
    }
    
    function noaprobado(id){
        sessionStorage.setItem("rechazado", id);
        $.ajax({
            url:"Solicitud.php", 
            data: {rechazado: sessionStorage.getItem("rechazado")},
            type: "post", 
            success:function(content){
                $('.SolicitudFrame').html(content);
          }
        })
        }

