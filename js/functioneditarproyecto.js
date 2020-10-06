$( document ).ready(function() {
    $.ajax({
      url:"EditarProyectosBE.php", 
      type: "post",
      success:function(content){
        $('.EditarProyectoFrame').html(content);

       
        $(".botonPanel").click(function(){
          var proyectoid =document.getElementById("1").dataset.idp;
          $.redirect("../Proyectos/PlanillaEditable.php",{id : proyectoid}, "POST"); 
         });
    }
       });
     
});