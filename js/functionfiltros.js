$( document ).ready(function() {
 
  
    $.ajax({
      url:"MenuFiltros.php", 
      type: "post", 
      data: "numerolocal="+$_POST['BachilleratoSelect']+"& grado="+$_POST['GradoSelect'] + "& orientacion=" +$_POST['OrientacionSelect'], 
      success:function(content){
        $('.Selectores').html(content);
    }
       });
     $(".BotonProyecto").click(function(){
      $.redirect("../Planilla.php", {idpproyecto: $idp}, "POST"); 
     });
});