$( document ).ready(function() {
    $.ajax({
      url:"EditarProyectosBE.php", 
      type: "post",
      success:function(content){
        $('.EditarProyectoFrame').html(content);
    }
       });
     
}); 

function mandarID(id){
  window.location = 'PlanillaEditable.php?id=' + id;
};
