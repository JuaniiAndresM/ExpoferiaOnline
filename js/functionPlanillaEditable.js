$( document ).ready(function() {
  $.ajax({
    url:"PlanillaEditable.php", 
    type: "post", 
    success:function(content){
      $(".button1").click(function(){
        var proyectoid =document.getElementById("1").dataset.idp
        $.redirect("/uploadIMG.php", {id : proyectoid}, "POST"); 
       });

       $(".button2").click(function(){
        var proyectoid =document.getElementById("2").dataset.idp
        $.redirect("/uploadIMGprincipal.php", {id : proyectoid}, "POST"); 
       });

       $(".button3").click(function(){
        var proyectoid =document.getElementById("3").dataset.idp
        $.redirect("/uploadBanner.php", {id : proyectoid}, "POST"); 
       });
  }
     });
   
});

function aprobar(id){
    $.ajax({
      url:"../Proyectos/aprobar.php",
      data: {idproyecto: id},
      type: "post", 
      success:function(content){
        window.location.href="../HeaderFooter/index.html";
    }
       });
     
};
function ActualizoPlanilla(){
  var nombreproyecto = document.getElementById('user');
  var dcorta = document.getElementById('descripcionCorta_Proyecto');
  var dlarga = document.getElementById('descripcionLarga_Proyecto');
  var mlink = document.getElementById('link');
  var idp = $("#user").data("idp");

    $.ajax({
    url:"ActualizoPlanilla.php", 
    type: "post", 
    data: {idp: idp, nombre: nombreproyecto, dcorta: dcorta, dlarga: dlarga, mlink: mlink},
    success:function(content){
        alert("el resultado es "+content);
      }
     });
    
}
function hfindex() {
  $("#header").load("../HeaderFooter/header.php");
  $("#footer").load("../HeaderFooter/footer.html");
}

