$( document ).ready(function() {
  $.ajax({
    url:"PlanillaEditable.php",
    type: "post",
    success:function(content){
      var idp = $("#user").data("idp");
      TraigoFoto(idp,1);// cargo la imagen principal
      TraigoFoto(idp,2);// cargo el banner
      TraigoFoto(idp,3);// cargo todas las fotos secundarias
     cont=$("#misurls input:last-child").data("cont");
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
        location.reload();
    }
       });
};

function aprobarAdelanto(id){
  $.ajax({
    url:"../Proyectos/aprobarAdelanto.php",
    data: {idproyecto: id},
    type: "post", 
    success:function(content){
      alert(content);
      location.reload();
  }
     });
};

function desaprobar(id){
  $.ajax({
    url:"../Proyectos/desaprobar.php",
    data: {idproyecto: id},
    type: "post", 
    success:function(content){
      location.reload();
  }
     });
};

function desaprobarAdelanto(id){
  $.ajax({
    url:"../Proyectos/desaprobarAdelanto.php",
    data: {idproyecto: id},
    type: "post", 
    success:function(content){
      location.reload();
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

      $.ajax({
        url:"BorroVideos.php", 
        data: {idp: idp},
        type: "post",
        success:function(content){
                  var idp2=idp;
                  cont2 = 1;
                  while(cont2 <= cont){
                  var video = $("#video"+cont2).val();
                  if(video !== ""){
                  $.ajax({
                    url:"SuboVideos.php", 
                    data: {idp: idp2, video: video},
                    type: "post",
                    success:function(content){
                      
                       
                    }
                    });
                  }
                    cont2++;
                  } 
                   
          }
         });
         modal.style.display = "block";
      }
     });

     

    

}
var cont = 1;

function NuevoVideo(){
  cont++;
  var div = document.getElementById("misurls");
  var input = document.createElement("input");
  input.type = "text";
  input.className = "form-control";
  input.id = "video"+ cont;
  input.name = "nombre_proyecto";
  input.placeholder = "URL del Video [YouTube]";
  input.value = "";
  div.appendChild(input);
};

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
                if(msg=='2'){
                  alert('Error 2. Disculpa amigo!. ocurrió un error inesperado al intentar subir la imagen, comunícate con soporte.');
                }else if(msg=='3'){
                  alert('Error 3. Disculpa amigo!. No se pudo subir imagen, comunícate con soporte, gracias.');
                }else if(msg=='4'){
                  alert('Error 4. Disculpa amigo!. La imagen no se pudo guardar porque no está en formato 16:9, consulta el manual o pide ayuda al email de soporte (info@expoeduca.liceoiep.edu.uy).');
                }else if(msg=='5'){
                  alert('Error 5. Disculpa amigo!. La imagen del Banner no se pudo guardar porque no tiene las medidas de 1200 x 200, consulta el manual o pide ayuda a los administradores.');
                }else if(msg=='6'){
                  alert('Error 6. Disculpa amigo!. No se pudo subir imagen, comunícate con soporte, gracias.');
                }else if(msg=='7'){
                  alert('Error 7. Disculpa amigo!. No se pudo subir imagen porque excede el tamaño en bytes (no más de 1.5mb), comunícate con soporte si tienes dudas, gracias.');
                }
                
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

var slideIndex = 0;
var slideIndexVid = 0;

function agrando(foto){
  var modal = document.getElementById('myModal');
  var img = document.getElementById('foto'+foto);
  var modalImg = document.getElementById('foto');
  img.onclick = function(){
    modal.style.display = 'block';
    modalImg.src = this.src;
  }
  var span = document.getElementsByClassName('close')[0];
}

function cerrarModal() { 
  document.getElementById('myModal').style.display = 'none';
}

function getVideo(url,id){
  var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  var match = url.match(regExp);
  if (match && match[2].length == 11) {
      document.getElementById('video'+id).src = 'https://www.youtube.com/embed/'+match[2];
  } else {
      document.getElementById('divideo').style.visibility = 'hidden';
  }
  
}
//Slides para las Imagenes
function slides(){
  carousel();
  showSlides(slideIndex);
}


function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  
}

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 8000); // Cambia la imagen cada 8 segundos
}

//Slides para los videos

function slidesVid(){
  showSlidesVid(slideIndexVid);
}


function plusSlidesVid(n) {
  showSlidesVid(slideIndexVid += n);
}

function currentSlideVid(n) {
  showSlidesVid(slideIndexVid = n);
}

function showSlidesVid(n) {
  var i;
  var slides = document.getElementsByClassName("VideoSlides");
  if (n > slides.length) {slideIndexVid = 1}
  if (n < 1) {slideIndexVid = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndexVid-1].style.display = "block";
  
}
