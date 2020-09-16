$( document ).ready(function() {
    $.ajax({
        url:"PlanillaEditableBE.php", 
        type: "post", 
        success:function(content){
          $('.Planilla').html(content);
      }
    });
});