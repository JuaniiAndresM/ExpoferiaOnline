$( document ).ready(function() {


        $.ajax({
          url:"ProyectosBE.php", 
          type: "post", 
          success:function(content){
            $('.gridProyectos').html(content);
            $(".BotonProyecto").click(function(){
              $.redirect("/ExpoferiaOnline/Proyectos/Planilla.php", {idpproyecto: $idp}, "POST"); 
             });
        }
           });
         
});