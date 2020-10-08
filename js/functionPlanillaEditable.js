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
  
  var nombreproyecto= $("#user").val();
  var dcorta= $("#descripcionCorta_Proyecto").val();
 
  
  var iframe = $('#descripcionLarga_Proyecto_ifr');
  var dlarga = $('#tinymce[data-id="descripcionLarga_Proyecto"]', iframe.contents()).html();
  var mlink= $("#link").val();
  
  var idp = $("#user").data("idp");

    $.ajax({
    url:"ActualizoPlanilla.php", 
    data: {idp: idp, nombre: nombreproyecto, dcorta: dcorta, dlarga: dlarga, mlink: mlink},
    type: "post",
    success:function(content){
        $("#msg").html(content);
      }
     });
    
}
function hfindex() {
  $("#header").load("../HeaderFooter/header.php");
  $("#footer").load("../HeaderFooter/footer.html");
}
var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
tinymce.init({
     
      
  selector: '#descripcionLarga_Proyecto',
  entity_encoding : "raw",
  height: 500,
  plugins: [
    'advlist autolink lists link charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste imagetools wordcount'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

  
  });
