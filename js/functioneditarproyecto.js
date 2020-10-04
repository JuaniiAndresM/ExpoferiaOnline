$( document ).ready(function() {
    $.ajax({
      url:"EditarProyectosBE.php", 
      type: "post",
      success:function(content){
        $('.EditarProyectoFrame').html(content);
        var proyectoid =document.getElementById("1").dataset.idp;
        $(".botonPanel").click(function(){
         //debug  
          $.redirect("../Proyectos/PlanillaEditable.html",{proyectoid}, "POST"); 
         });
    }
       });
     
});