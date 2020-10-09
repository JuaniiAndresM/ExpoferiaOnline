$( document ).ready(function() {
  $.ajax({
    url:"PlanillaEditable.php", 
    type: "post", 
    success:function(content){
      var idp = $("#user").data("idp");
      TraigoFoto(idp,1);// cargo la imagen principal
      TraigoFoto(idp,2);// cargo el banner
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


  var fileobj;
function upload_file(e,tipo) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj,tipo);
}
 
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajax_file_upload(fileobj);
    };
}
 
function ajax_file_upload(file_obj,tipo) {
    if(file_obj != undefined) {
        var form_data = new FormData();   
        var idp = $("#user").data("idp");               
        form_data.append('file', file_obj);
        form_data.append('id',idp);
        form_data.append('tipo',tipo);//tipo 1 es imagen principal, se graba en datosProyecto la url
        $.ajax({
            type: 'POST',
            url: 'uploadIMG.php',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(msg) {
                
                $('#selectfile').val('');
               
                TraigoFoto(idp,tipo);
              
                
               
                
            }
        });
    }
}
function TraigoFoto(idp, tipo){
 
    $.ajax({
        type: 'POST',
        url: 'downloadIMG.php',
        data: {idp: idp, tipo: tipo},
        success:function(msg) {
          if(tipo==1){
            $('#fprincipal').html(msg);
          }
          if(tipo==2){
            $('#fbanner').html(msg);
          } 
            
        }
    });
}