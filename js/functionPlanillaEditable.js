$( document ).ready(function() {
  $.ajax({
    url:"PlanillaEditable.php",
    type: "post",
    success:function(content){
      var idp = $("#user").data("idp");
      TraigoFoto(idp,1);// cargo la imagen principal
      TraigoFoto(idp,2);// cargo el banner
      TraigoFoto(idp,3);// cargo todas las fotos secundarias
      
      }
  });
  
});
function borramos(url){
  var idp = $("#user").data("idp");
  $.ajax({
    type: 'POST',
    url: 'deleteIMG.php',
    data: {url: url, idp: idp},
    success:function(msg) {
      $('#fsecundarias').html("");
     
      TraigoFoto(idp,3);
      
        
    }
});
   
 
}
function borramosprincipal(url){
  var idp = $("#user").data("idp");
  $.ajax({
    type: 'POST',
    url: 'deleteIMGprincipal.php',
    data: {url: url, idp: idp},
    success:function(msg) {
      
     
      TraigoFoto(idp,1);
      
        
    }
});
}
function borramosbanner(url){
  var idp = $("#user").data("idp");
  $.ajax({
    type: 'POST',
    url: 'deleteIMGbanner.php',
    data: {url: url, idp: idp},
    success:function(msg) {
      
     
      TraigoFoto(idp,2);
      
        
    }
});
}
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
function desaprobar(id){
  $.ajax({
    url:"../Proyectos/desaprobar.php",
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
      modal.style.display = "block";
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
    if(tipo==1 || tipo==2){
      fileobj = e.dataTransfer.files[0];
      ajax_file_upload(fileobj,tipo);
    }else{
      e.preventDefault();

      if (e.dataTransfer.items) {
        // Use DataTransferItemList interface to access the file(s)
        for (var i = 0; i < e.dataTransfer.items.length; i++) {
          // If dropped items aren't files, reject them
          if (e.dataTransfer.items[i].kind === 'file') {
            var file = e.dataTransfer.items[i].getAsFile();
            ajax_file_upload(file,tipo);
          }
        }
      } else {
        // Uso DataTransfer a los archivos 
        for (var i = 0; i < e.dataTransfer.files.length; i++) {
          var file = e.dataTransfer.items[i].getAsFile();
            ajax_file_upload(file,tipo);
        }
      } 
      
    }

  
}
 
function file_explorer() {
    document.getElementById('selectfile1').click();
    document.getElementById('selectfile1').onchange = function() {
        fileobj = document.getElementById('selectfile1').files[0];
        ajax_file_upload(fileobj,1);
    };
    document.getElementById('selectfile2').click();
    document.getElementById('selectfile2').onchange = function() {
        fileobj = document.getElementById('selectfile2').files[0];
        ajax_file_upload(fileobj,2);
    };
    document.getElementById('selectfile3').click();
    document.getElementById('selectfile3').onchange = function() {
        fileobj = document.getElementById('selectfile3').files[0];
        ajax_file_upload(fileobj,3);
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
          if(tipo==3){
            $('#fsecundarias').html("");
            $('#fsecundarias').append(msg);
          }
            
        }
    });
}