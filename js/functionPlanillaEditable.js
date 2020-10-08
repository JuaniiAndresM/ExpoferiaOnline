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