$( document ).ready(function() {
  var local = "0";
  var grado = "0";
  var orientacion = "0";
  $.ajax({
    url:"MenuFiltros.php", 
    type: "post", 
    data: {local : local, grado : grado, orientacion : orientacion},
    success:function(content){
      $('.Tabla2').html(content);
  }
     });
});


function mandoDatos(){
  var local = document.getElementById('1').value;
  var grado = document.getElementById('2').value;
  var orientacion = document.getElementById('3').value;
 
  $.ajax({
    url:"MenuFiltros.php", 
    type: "post", 
    data: {local : local, grado : grado, orientacion : orientacion},
    success:function(content){
      $('.Tabla2').html(content);
  }
     });
  
}

  function mandarID(id){
  sessionStorage.setItem("id", id);
  $.redirect("../Proyectos/Planilla.html"); 
};

