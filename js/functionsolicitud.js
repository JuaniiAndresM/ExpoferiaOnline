function aprobado(id){
    sessionStorage.setItem("aprobar", id);
    $.ajax({
        url:"Solicitud.php", 
        data: {aprobar: sessionStorage.getItem("aprobar")},
        type: "post", 
        success:function(){
            location.reload();
      }
    })
    }
    
    function noaprobado(id){
        sessionStorage.setItem("rechazado", id);
        $.ajax({
            url:"Solicitud.php", 
            data: {rechazado: sessionStorage.getItem("rechazado")},
            type: "post", 
            success:function(){
                location.reload();
          }
        })
        }

        function aprobadoPROF(id){
            sessionStorage.setItem("aprobadoPROF", id);
            $.ajax({
                url:"Solicitud.php", 
                data: {aprobadoPROF: sessionStorage.getItem("aprobadoPROF")},
                type: "post", 
                success:function(){
                    location.reload();
              }
            })
            }
            
            function noaprobadoPROF(id){
                sessionStorage.setItem("noaprobadoPROF", id);
                $.ajax({
                    url:"Solicitud.php", 
                    data: {noaprobadoPROF: sessionStorage.getItem("noaprobadoPROF")},
                    type: "post", 
                    success:function(){
                        location.reload();
                  }
                })
                }
        

