$( document ).ready(function() {
        $.ajax({
          url:"ProyectosBE.php", 
          type: "post", 
          success:function(content){
            $('.gridProyectos').html(content);
        }
           });
         
});

function mandarID(id){
  sessionStorage.setItem("id", id);
  $.redirect("../Proyectos/Planilla.html"); 
};
