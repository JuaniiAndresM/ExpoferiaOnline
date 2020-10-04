$( document ).ready(function() {
        $.ajax({
          url:"ProyectosBE.php", 
          type: "post", 
          success:function(content){
            $('.gridProyectos').html(content);

            $(".BotonProyecto").click(function(){
              var proyectoid =document.getElementById("1").dataset.idp
              $.redirect("../Proyectos/Planilla.html", {proyectoid}, "POST"); 
             });
        }
           });
         
});